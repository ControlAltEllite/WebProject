import os
import json
import time
import requests
from flask import Flask, request, jsonify
from flask_cors import CORS
# Gemini API (gen-lang-client-0384012281)
app = Flask(__name__)
CORS(app)  # This is important for allowing cross-origin requests from your PHP server

# --- CRITICAL: You must provide your own Gemini API key here. ---
# 1. Go to https://aistudio.google.com/app/apikeyins
# 2. Click "Create API key in new project" or "Create API key".
# 3. Copy the key and paste it below, replacing "YOUR_GEMINI_API_KEY_HERE".
#
# Note: The Canvas environment automatically provides this for JS code,
# but for a local Flask server, you must provide it manually.
API_KEY = "AIzaSyDMfhD0nvGSo2rE4_7K2xZdl6XmSSgz-L8"
# ...existing code...
API_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" + API_KEY
# ...existing code...

def generate_quiz_with_retries(prompt, max_retries=5, initial_delay=1):
    """
    Calls the Gemini API with exponential backoff for retries.
    """
    if not API_KEY or API_KEY == "YOUR_GEMINI_API_KEY_HERE":
        print("CRITICAL ERROR: Gemini API key is not set or is the default placeholder. Please update app.py with a valid key.")
        return None

    print("Preparing to call Gemini API...")
    headers = {'Content-Type': 'application/json'}
    payload = {
        "contents": [
            {
                "role": "user",
                "parts": [
                    {
                        "text": prompt
                    }
                ]
            }
        ],
        "generationConfig": {
            "responseMimeType": "application/json",
            "responseSchema": {
                "type": "ARRAY",
                "items": {
                    "type": "OBJECT",
                    "properties": {
                        "question": { "type": "STRING" },
                        "options": {
                            "type": "ARRAY",
                            "items": { "type": "STRING" }
                        },
                        "answer": { "type": "STRING" }
                    },
                    "propertyOrdering": ["question", "options", "answer"]
                }
            }
        }
    }

    delay = initial_delay
    for i in range(max_retries):
        try:
            print(f"Attempt {i+1} to reach Gemini API...")
            response = requests.post(API_URL, headers=headers, data=json.dumps(payload), timeout=30)
            response.raise_for_status()  # Raises an HTTPError for bad responses (4xx or 5xx)
            
            print("Successfully received a response from Gemini API.")
            result = response.json()
            
            if result.get('candidates'):
                try:
                    generated_text = result['candidates'][0]['content']['parts'][0]['text']
                    return json.loads(generated_text)
                except (KeyError, IndexError, json.JSONDecodeError) as e:
                    print(f"Error parsing Gemini API response: {e}")
                    print(f"Raw response: {generated_text}")
                    return None
            else:
                print("Gemini API response did not contain 'candidates'.")
                return None
                
        except requests.exceptions.HTTPError as e:
            print(f"HTTP Error on attempt {i+1}/{max_retries}: {e.response.status_code} - {e.response.text}")
            if i < max_retries - 1:
                print(f"Retrying in {delay} seconds...")
                time.sleep(delay)
                delay *= 2
            else:
                return None
        except requests.exceptions.RequestException as e:
            print(f"Request Error on attempt {i+1}/{max_retries}: {e}")
            if i < max_retries - 1:
                print(f"Retrying in {delay} seconds...")
                time.sleep(delay)
                delay *= 2
            else:
                return None
        except Exception as e:
            print(f"An unexpected error occurred in generate_quiz_with_retries: {e}")
            return None
    return None

@app.route('/generate-quiz', methods=['POST'])
def generate_quiz():
    print("Received a request on /generate-quiz endpoint.")
    try:
        data = request.json
        topic = data.get('topic')
        num_questions = data.get('num_questions', 5)
        difficulty = data.get('difficulty', 'medium')

        if not topic:
            print("Error: Missing 'topic' in request body.")
            return jsonify({"error": "Missing 'topic' in request body"}), 400

        prompt = f"""
        Generate a multiple-choice quiz about {topic} with {num_questions} questions.
        The difficulty should be {difficulty}. Each question must have four options and a single correct answer.
        Format the output as a JSON array of objects. Each object should have the following properties:
        'question': The quiz question text.
        'options': An array of four strings representing the options.
        'answer': The string of the correct option.
        
        Example JSON format:
        [
          {{
            "question": "What is the capital of France?",
            "options": ["Berlin", "Madrid", "Paris", "Rome"],
            "answer": "Paris"
          }},
          {{
            "question": "Which planet is known as the Red Planet?",
            "options": ["Earth", "Mars", "Jupiter", "Venus"],
            "answer": "Mars"
          }}
        ]
        """
        print("Sending prompt to Gemini API...")
        quiz_data = generate_quiz_with_retries(prompt)

        if quiz_data:
            print("Quiz data successfully generated. Returning JSON.")
            return jsonify(quiz_data)
        else:
            print("Error: Failed to generate quiz from Gemini API.")
            return jsonify({"error": "Failed to generate quiz. Please try again later."}), 500
    except Exception as e:
        print(f"An unhandled error occurred in generate_quiz: {e}")
        return jsonify({"error": "An internal server error occurred."}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

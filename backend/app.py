from flask import Flask, request, jsonify
from flask_cors import CORS
import openai
import os

app = Flask(__name__)
CORS(app) # This enables CORS for all routes

# NOTE: For production, you should set this as an environment variable
# export OPENAI_API_KEY='your-api-key'
# Then access it with os.getenv('OPENAI_API_KEY')
# For local development, you can uncomment and set your key here
# openai.api_key = 'YOUR_API_KEY_HERE' 

@app.route('/generate-quiz', methods=['POST'])
def generate_quiz():
    data = request.get_json()
    topic = data.get('topic')
    num_questions = data.get('num_questions', 5) # Default to 5 questions
    difficulty = data.get('difficulty', 'medium') # Default to medium difficulty

    if not topic:
        return jsonify({'error': 'Missing quiz topic'}), 400

    prompt = (
        f"Generate a {difficulty} difficulty multiple-choice quiz with {num_questions} questions about the topic '{topic}'. "
        "Each question should have exactly four options (A, B, C, D). "
        "Provide the correct answer as the 'answer' field. "
        "The response should be a JSON list of dictionaries, where each dictionary contains 'question', 'options', and 'answer'."
        "Example format: "
        "["
        "  {"
        "    \"question\": \"What is the capital of France?\", "
        "    \"options\": [\"London\", \"Berlin\", \"Paris\", \"Madrid\"], "
        "    \"answer\": \"Paris\""
        "  }"
        "]"
    )

    try:
        completion = openai.chat.completions.create(
            model="gpt-3.5-turbo-1106",
            messages=[
                {"role": "system", "content": "You are a helpful assistant designed to output JSON."},
                {"role": "user", "content": prompt}
            ],
            response_format={"type": "json_object"}
        )
        quiz_json_string = completion.choices[0].message.content
        return jsonify(quiz_json_string), 200
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@app.route('/generate-essay', methods=['POST'])
def generate_essay():
    data = request.get_json()
    topic = data.get('topic')
    difficulty = data.get('difficulty', 'medium')

    if not topic:
        return jsonify({'error': 'Missing essay topic'}), 400

    prompt = (
        f"Generate a challenging essay question about the topic '{topic}' at a {difficulty} level. "
        "Provide the question as a short title and a detailed prompt for students to answer. "
        "The response should be a JSON object with 'title' and 'essay_question' fields."
        "Example format: "
        "{"
        "  \"title\": \"The Industrial Revolution's Global Impact\", "
        "  \"essay_question\": \"Discuss how the Industrial Revolution, originating in Britain, led to significant changes in global economic, social, and political structures. Use specific examples from at least three different continents to support your argument.\""
        "}"
    )

    try:
        completion = openai.chat.completions.create(
            model="gpt-3.5-turbo-1106",
            messages=[
                {"role": "system", "content": "You are a helpful assistant designed to output JSON."},
                {"role": "user", "content": prompt}
            ],
            response_format={"type": "json_object"}
        )
        essay_json_string = completion.choices[0].message.content
        return jsonify(essay_json_string), 200
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    # Add an API key from your OpenAI account
    # You can get a new one from https://platform.openai.com/account/api-keys
    # For security, do not commit your API key to a public repository
    # Instead, set it as an environment variable or store it in a .env file
    # For this example, you can uncomment the line below and replace with your key
    # openai.api_key = 'YOUR_API_KEY_HERE'
    app.run(debug=True)

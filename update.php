<?php
include_once 'database.php';
session_start();
$email=$_SESSION['email'];

// User deletion logic
if(isset($_SESSION['key']))
{
    if(@$_GET['demail'] && $_SESSION['key']=='admin')
    {
        $demail=@$_GET['demail'];
        $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
        $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
        $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
        header("location:dashboard.php?q=1");
        exit();
    }
}

// Quiz removal logic
if(isset($_SESSION['key']))
{
    if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='admin')
    {
        $eid=@$_GET['eid'];
        $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
        while($row = mysqli_fetch_array($result))
        {
            $qid = $row['qid'];
            $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
            $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
        }
        $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');
        header("location:dashboard.php?q=5");
        exit();
    }
}

// Manual quiz addition logic (Step 1)
if(isset($_SESSION['key']))
{
    if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='admin')
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $name= ucwords(strtolower($name));
        $total = mysqli_real_escape_string($con, $_POST['total']);
        $sahi = mysqli_real_escape_string($con, $_POST['sahi']);
        $wrong = mysqli_real_escape_string($con, $_POST['wrong']);
        $id=uniqid();
        $q3=mysqli_query($con,"INSERT INTO quiz VALUES ('$id','$name' , '$sahi' , '$wrong','$total', NOW())");
        header("location:dashboard.php?q=4&step=2&eid=$id&n=$total");
        exit();
    }
}

// Manual quiz addition logic (Step 2 - questions)
if(isset($_SESSION['key']))
{
    if(@$_GET['q']== 'addqns' && $_SESSION['key']=='admin')
    {
        $n=@$_GET['n'];
        $eid=@$_GET['eid'];
        $ch=@$_GET['ch'];
        for($i=1;$i<=$n;$i++)
        {
            $qid=uniqid();
            $qns=mysqli_real_escape_string($con, $_POST['qns'.$i]);
            $q3=mysqli_query($con,"INSERT INTO questions VALUES ('$eid','$qid','$qns' , '$ch' , '$i')");
            $oaid=uniqid();
            $obid=uniqid();
            $ocid=uniqid();
            $odid=uniqid();
            $a=mysqli_real_escape_string($con, $_POST[$i.'1']);
            $b=mysqli_real_escape_string($con, $_POST[$i.'2']);
            $c=mysqli_real_escape_string($con, $_POST[$i.'3']);
            $d=mysqli_real_escape_string($con, $_POST[$i.'4']);
            $qa=mysqli_query($con,"INSERT INTO options VALUES ('$qid','$a','$oaid')") or die('Error61');
            $qb=mysqli_query($con,"INSERT INTO options VALUES ('$qid','$b','$obid')") or die('Error62');
            $qc=mysqli_query($con,"INSERT INTO options VALUES ('$qid','$c','$ocid')") or die('Error63');
            $qd=mysqli_query($con,"INSERT INTO options VALUES ('$qid','$d','$odid')") or die('Error64');
            $e=mysqli_real_escape_string($con, $_POST['ans'.$i]);
            switch($e)
            {
                case 'a': $ansid=$oaid; break;
                case 'b': $ansid=$obid; break;
                case 'c': $ansid=$ocid; break;
                case 'd': $ansid=$odid; break;
                default: $ansid=$oaid; // Fallback
            }
            $qans=mysqli_query($con,"INSERT INTO answer VALUES ('$qid','$ansid')");
        }
        header("location:dashboard.php?q=0");
        exit();
    }
}

// Logic for handling user quiz attempts
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2)
{
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    $ans=mysqli_real_escape_string($con, $_POST['ans']);
    $qid=@$_GET['qid'];
    $q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
    while($row=mysqli_fetch_array($q) )
    {   $ansid=$row['ansid']; }
    if($ans == $ansid)
    {
        $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
        while($row=mysqli_fetch_array($q) )
        {
            $sahi=$row['sahi'];
        }
        if($sn == 1)
        {
            $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
        }
        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            $r=$row['sahi'];
        }
        $r++;
        $s=$s+$sahi;
        $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');
    }
    else
    {
        $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');
        while($row=mysqli_fetch_array($q) )
        {
            $wrong=$row['wrong'];
        }
        if($sn == 1)
        {
            $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
        }
        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            $w=$row['wrong'];
        }
        $w++;
        $s=$s-$wrong;
        $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
    }
    if($sn != $total)
    {
        $sn++;
        header("location:welcome.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
    }
    else if( $_SESSION['key']!='suryapinky')
    {
        $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
        }
        $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
        $rowcount=mysqli_num_rows($q);
        if($rowcount == 0)
        {
            $q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
        }
        else
        {
            while($row=mysqli_fetch_array($q) )
            {
                $sun=$row['score'];
            }
            $sun=$s+$sun;
            $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
        }
        header("location:welcome.php?q=result&eid=$eid");
    }
    else
    {
        header("location:welcome.php?q=result&eid=$eid");
    }
    exit();
}

// Logic for re-attempting a quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 )
{
    $eid=@$_GET['eid'];
    $n=@$_GET['n'];
    $t=@$_GET['t'];
    $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
        $s=$row['score'];
    }
    $q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
    $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
    while($row=mysqli_fetch_array($q) )
    {
        $sun=$row['score'];
    }
    $sun=$sun-$s;
    $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
    header("location:welcome.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
    exit();
}

// Logic for submitting an essay answer
if(@$_GET['q']=='submit_essay') {
    $essay_id = mysqli_real_escape_string($con, @$_GET['essay_id']);
    $answer = mysqli_real_escape_string($con, $_POST['answer']);
    $email = mysqli_real_escape_string($con, $_SESSION['email']);

    $query = "INSERT INTO essay_answers (essay_id, email, answer, date) VALUES ('$essay_id', '$email', '$answer', NOW())";
    $result = mysqli_query($con, $query) or die('Error submitting essay: ' . mysqli_error($con));

    header("location:welcome.php?q=4&message=success");
    exit();
}

// Logic for adding an essay question (admin)
if(isset($_SESSION['key'])) {
    if(@$_GET['q'] == 'addessay' && $_SESSION['key'] == 'admin') {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $question = mysqli_real_escape_string($con, $_POST['question']);

        $query = "INSERT INTO essay_questions (title, question, date) VALUES ('$title', '$question', NOW())";
        $result = mysqli_query($con, $query) or die('Error adding essay question: ' . mysqli_error($con));

        header("location:dashboard.php?q=6&message=added");
        exit();
    }
}

// Logic for removing an essay question (admin)
if(isset($_SESSION['key'])) {
    if(@$_GET['q'] == 'rmessay' && $_SESSION['key'] == 'admin') {
        $essay_id = mysqli_real_escape_string($con, @$_GET['essay_id']);

        $delete_answers_query = "DELETE FROM essay_answers WHERE essay_id='$essay_id'";
        mysqli_query($con, $delete_answers_query) or die('Error deleting essay answers: ' . mysqli_error($con));

        $delete_question_query = "DELETE FROM essay_questions WHERE essay_id='$essay_id'";
        mysqli_query($con, $delete_question_query) or die('Error deleting essay question: ' . mysqli_error($con));

        header("location:dashboard.php?q=7&message=removed");
        exit();
    }
}

// NEW SECTION: Logic for generating an AI quiz (admin)
if(isset($_SESSION['key']) && @$_GET['q'] == 'generate_ai_quiz' && $_SESSION['key'] == 'admin')
{
    // Validate required form fields
    if (empty($_POST['ai_topic']) || empty($_POST['ai_num_questions']) || empty($_POST['ai_difficulty'])) {
        header("location:dashboard.php?q=4&error=missing_fields");
        exit();
    }
    
    $ai_topic = mysqli_real_escape_string($con, $_POST['ai_topic']);
    $ai_num_questions = mysqli_real_escape_string($con, $_POST['ai_num_questions']);
    $ai_difficulty = mysqli_real_escape_string($con, $_POST['ai_difficulty']);
    $marks_right = mysqli_real_escape_string($con, $_POST['ai_marks_right']);
    $marks_wrong = mysqli_real_escape_string($con, $_POST['ai_marks_wrong']);

    // --- Step 1: Call the Python Flask AI API ---
    $url = 'http://127.0.0.1:5000/generate-quiz';
    $data = [
        'topic' => $ai_topic,
        'num_questions' => $ai_num_questions,
        'difficulty' => $ai_difficulty
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);

    if ($result === FALSE) {
        $error = error_get_last();
        error_log("Failed to connect to AI API or receive response: " . print_r($error, true));
        die("Error: Could not connect to the AI generation service. Please ensure the Python Flask app is running. Details: " . ($error['message'] ?? 'Unknown error'));
    }

    $quiz_questions = json_decode($result, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Failed to decode JSON from AI API: " . json_last_error_msg() . "\nRaw response: " . $result);
        die("Error: Failed to parse AI quiz data. Invalid JSON response from AI service. Raw response: " . htmlspecialchars($result));
    }
    
    // Check for an error message from the Flask app
    if (isset($quiz_questions['error'])) {
        die("AI Service Error: " . htmlspecialchars($quiz_questions['error']));
    }

    // Check if the returned data is not in the expected format (e.g., an empty array)
    if (empty($quiz_questions) || !is_array($quiz_questions)) {
        die("AI could not generate quiz questions. The AI service returned an empty or invalid response.");
    }

    // --- Step 2: Insert into MySQL Database ---
    $eid=uniqid();
    $title = mysqli_real_escape_string($con, $ai_topic);
    $total_questions = count($quiz_questions);

    $query_quiz = "INSERT INTO `quiz` VALUES ('$eid','$title','$marks_right','$marks_wrong','$total_questions', NOW())";
    $insert_quiz = mysqli_query($con,$query_quiz);

    if(!$insert_quiz){
        error_log("MySQL error inserting into quiz table: " . mysqli_error($con));
        die("Database error: Could not save quiz details.");
    }

    $sn = 1;
    foreach ($quiz_questions as $question_data) {
        $qid = uniqid();
        $qns = mysqli_real_escape_string($con, $question_data['question']);
        $choice = count($question_data['options']);

        $query_qns = "INSERT INTO `questions` VALUES ('$eid','$qid','$qns','$choice','$sn')";
        $insert_qns = mysqli_query($con,$query_qns);

        if(!$insert_qns){
            error_log("MySQL error inserting into questions table for QID $qid: " . mysqli_error($con));
            continue;
        }

        $correct_ans_option_id = '';
        foreach ($question_data['options'] as $opt_index => $option_text) {
            $optionid = uniqid();
            $option_text_escaped = mysqli_real_escape_string($con, $option_text);
            $query_opt = "INSERT INTO `options` VALUES ('$qid','$option_text_escaped','$optionid')";
            $insert_opt = mysqli_query($con,$query_opt);

            if(!$insert_opt){
                error_log("MySQL error inserting into options table for QID $qid, Option $option_text: " . mysqli_error($con));
            }

            if ($option_text == $question_data['answer']) {
                $correct_ans_option_id = $optionid;
            }
        }

        if ($correct_ans_option_id) {
            $query_ans = "INSERT INTO `answer` VALUES ('$qid','$correct_ans_option_id')";
            $insert_ans = mysqli_query($con,$query_ans);
            if(!$insert_ans){
                error_log("MySQL error inserting into answer table for QID $qid: " . mysqli_error($con));
            }
        } else {
            error_log("Warning: No correct answer found for question: " . $qns);
        }

        $sn++;
    }

    header("location:dashboard.php?q=5&message=Quiz generated and added successfully!");
    exit();
}
?>

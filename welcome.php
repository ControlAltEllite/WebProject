<?php
session_start();
include_once 'database.php'; // Assuming this connects to your database

// Redirect to index.php if the user is not logged in
if(!(isset($_SESSION['email'])))
{
    header("location:index.php");
    exit(); // Always exit after a header redirect
}
else
{
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    // The 'database.php' is already included at the top, so no need to include it again here.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Online Quiz System</title>
    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>     
    <!-- Custom CSS for welcome page and fonts -->
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #b9b9b9ff; /* Light grey background */
            color: #333;
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar.title1 {
            background-color: #ffffffff; /* White navbar background */
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 0; /* Remove default margin */
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: #337ab7 !important; /* Bootstrap primary blue */
        }
        .navbar-nav > li > a {
            color: #555 !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar-nav > li > a:hover,
        .navbar-nav > li.active > a {
            color: #337ab7 !important;
            background-color: transparent !important;
        }
        .navbar-nav > li.active > a .glyphicon {
            color: #337ab7 !important;
        }

        /* Main Container Styling */
        .container {
            padding-top: 20px;
        }

        /* Panel/Charm Styling (for home, quizzes, results, history, ranking) */
        .panel {
            background-color: #ffffffff; /* White panel background */
            border: none; /* Remove default border */
            border-radius: 12px; /* More rounded corners */
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Softer, larger shadow */
            padding: 30px; /* Adjust padding */
            margin-bottom: 30px; /* Spacing between panels */
        }
        .panel.text-center {
            padding: 50px; /* More padding for the main welcome panel */
            margin: 40px auto; /* Center the panel horizontally */
            max-width: 800px; /* Max width for better readability */
        }
        .panel .title1 {
            color: #f9f9faff; /* Consistent title color */
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Home Page Button Styling */
        .home-buttons .btn {
            padding: 15px 35px;
            font-size: 1.3em;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            margin: 10px; /* Add margin for spacing between buttons */
        }
        .home-buttons .btn-primary {
            background-color: #337ab7;
            border-color: #337ab7;
        }
        .home-buttons .btn-primary:hover {
            background-color: #286090;
            border-color: #204d74;
        }
        .home-buttons .btn-success {
            background-color: #5cb85c;
            border-color: #5cb85c;
        }
        .home-buttons .btn-success:hover {
            background-color: #449d44;
            border-color: #398439;
        }
        .home-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        /* Table Styling */
        .table.title1 {
            font-size: 1em;
            color: #555;
            border-collapse: separate; /* Allows border-radius on cells */
            border-spacing: 0 8px; /* Space between rows */
        }
        .table.title1 th, .table.title1 td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: none; /* Remove default table borders */
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9; /* Lighter stripe */
        }
        .table-striped > tbody > tr:nth-of-type(even) {
            background-color: #ffffff; /* White stripe */
        }
        .table.title1 tr {
            border-radius: 8px;
            overflow: hidden; /* Ensures border-radius applies */
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Subtle shadow for rows */
            transition: all 0.2s ease-in-out;
        }
        .table.title1 tr:hover {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .table.title1 td center b {
            font-weight: 600;
        }
        .table.title1 thead tr {
            background-color: #e9ecef; /* Header background */
            color: #333;
            font-weight: 700;
            box-shadow: none; /* No shadow on header row */
        }
        .table.title1 thead tr td {
            border-bottom: 2px solid #dee2e6;
        }

        /* Quiz Action Buttons in Table */
        .table .btn.sub1 {
            padding: 8px 15px;
            font-size: 0.9em;
            border-radius: 5px;
            font-weight: 600;
        }
        .table .btn.sub1[style*="background:#1de9b6"] { /* Start button */
            background-color: #1c8134ff !important; /* Green */
            border-color: #28a745 !important;
            border-color:  !important;
            color: white !important;
        }
        .table .btn.sub1[style*="background:#1de9b6"]:hover {
            background-color: #218838 !important;
            border-color: #1e7e34 !important;
               
        }
        .table .btn.sub1[style*="background:red"] { /* Restart button */
            background-color: #dc3545 !important; /* Red */
            border-color: #dc3545 !important;
            color: white !important;
        }
        .table .btn.sub1[style*="background:red"]:hover {
            background-color: #c82333 !important;
            border-color: #bd2130 !important;
        }

        /* Result Page Specific Styles */
        .panel center h1.title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #337ab7;
        }
        .table.title1[style*="font-size:20px"] td {
            font-weight: normal; /* Override bold for result table values */
        }
        .table.title1[style*="font-size:20px"] tr td:first-child {
            font-weight: 600; /* Make labels bold */
            color: #555;
        }
        .table.title1[style*="font-size:20px"] tr[style*="color:#66CCFF"] { color: #007bff !important; } /* Blue for total/score */
        .table.title1[style*="font-size:20px"] tr[style*="color:#99cc32"] { color: #28a745 !important; } /* Green for right */
        .table.title1[style*="font-size:20px"] tr[style*="color:red"] { color: #dc3545 !important; } /* Red for wrong */
        .table.title1[style*="font-size:20px"] tr[style*="color:#990000"] { color: #6c757d !important; } /* Grey for overall score */

        /* Question Panel */
        .panel[style*="margin:5%"] {
            padding: 40px;
        }
        .panel[style*="margin:5%"] b {
            font-size: 1.3em;
            color: #444;
            display: block;
            margin-bottom: 20px;
        }
        .panel[style*="margin:5%"] input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.2); /* Slightly larger radio buttons */
            vertical-align: middle;
        }
        .panel[style*="margin:5%"] form .btn-primary {
            background-color: #337ab7;
            border-color: #337ab7;
            padding: 10px 25px;
            font-size: 1.1em;
            border-radius: 8px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .panel[style*="margin:5%"] form .btn-primary:hover {
            background-color: #286090;
            border-color: #204d74;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Essay Questions Placeholder */
        .panel .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .panel .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Online Quiz System</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Home link, active when 'q' is 'home' or not set -->
                    <li <?php if(@$_GET['q']=='home' || !isset($_GET['q'])) echo'class="active"'; ?> >
                        <a href="welcome.php?q=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a>
                    </li>
                    <!-- Link to MCQ Quizzes -->
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> >
                        <a href="welcome.php?q=1"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;MCQ Quizzes</a>
                    </li>
                    <!-- Link to Essay Questions -->
                    <li <?php if(@$_GET['q']==4) echo'class="active"'; ?> >
                        <a href="welcome.php?q=4"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Essay Questions</a>
                    </li>
                    <!-- Link to History -->
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> 
                        <a href="welcome.php?q=2"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;History</a>
                    </li>
                    <!-- Link to Ranking -->
                    <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> 
                        <a href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Logout link -->
                    <li> 
                        <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                // Default landing page with MCQ and Essay Question buttons
                if(@$_GET['q']=='home' || !isset($_GET['q'])) 
                {
                    echo '
                    <div class="panel text-center home-buttons">
                        <h2 class="title1" style="color:#337ab7; margin-bottom: 25px;">Welcome to the Online Quiz System!</h2>
                        <p style="font-size: 1.2em; margin-bottom: 30px;">Please select the type of assessment you would like to take:</p>
                        <a href="welcome.php?q=1" class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Start MCQ Quiz
                        </a>
                        <a href="welcome.php?q=4" class="btn btn-success btn-lg">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> View Essay Questions
                        </a>
                    </div>
                    ';
                }
                ?>

                <?php 
                // Display list of MCQ quizzes
                if(@$_GET['q']==1) 
                {
                    $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error fetching quizzes: ' . mysqli_error($con));
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <thead>
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Action</b></center></td></tr>
                    </thead>
                    <tbody>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                        // Check if the user has already attempted this quiz
                        $q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error checking history: ' . mysqli_error($con));
                        $rowcount=mysqli_num_rows($q12);    
                        if($rowcount == 0){
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="welcome.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></center></td></tr>';
                        }
                        else
                        {
                            echo '<tr style="color:#99cc32"><td><center>'.$c++.'</center></td><td><center>'.$title.'&nbsp;<span title="This quiz is already solved by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="color:black;margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></center></td></tr>';
                        }
                    }
                    echo '</tbody></table></div></div>';
                }?>

                <?php
                    // Display quiz questions
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
                        $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " ) or die('Error fetching question: ' . mysqli_error($con));
                        echo '<div class="panel" style="margin:5%">';
                        while($row=mysqli_fetch_array($q) )
                        {
                            $qns=$row['qns']; // Question text
                            $qid=$row['qid']; // Question ID
                            echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
                        }
                        // Fetch options for the current question
                        $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " ) or die('Error fetching options: ' . mysqli_error($con));
                        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST" class="form-horizontal">
                        <br />';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $option=$row['option'];
                            $optionid=$row['optionid'];
                            echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                        }
                        echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                    }

                    // Display quiz result
                    if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error fetching result history: ' . mysqli_error($con));
                        echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level']; // Number of questions attempted
                            echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                <tr style="color:#99cc32"><td>Right Answers&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                <tr style="color:red"><td>Wrong Answers&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        // Fetch overall rank score
                        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error fetching rank: ' . mysqli_error($con));
                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        echo '</table></div>';
                    }
                ?>

                <?php
                    // Display user's quiz history
                    if(@$_GET['q']== 2) 
                    {
                        $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error fetching history: ' . mysqli_error($con));
                        echo  '<div class="panel title">
                        <table class="table table-striped title1" >
                        <thead>
                            <tr style="color:black;"><td><center><b>S.N.</b></center></td><td><center><b>Quiz</b></center></td><td><center><b>Questions Solved</b></center></td><td><center><b>Right</b></center></td><td><center><b>Wrong<b></center></td><td><center><b>Score</b></center></td></tr>
                        </thead>
                        <tbody>';
                        $c=0;
                        while($row=mysqli_fetch_array($q) )
                        {
                            $eid=$row['eid'];
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level'];
                            // Get quiz title from quiz table
                            $q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error fetching quiz title: ' . mysqli_error($con));

                            while($row_title=mysqli_fetch_array($q23) ) // Renamed $row to $row_title to avoid conflict
                            {  $title=$row_title['title'];  }
                            $c++;
                            echo '<tr><td><center>'.$c.'</center></td><td><center>'.$title.'</center></td><td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo'</tbody></table></div>';
                    }

                    // Display global ranking
                    if(@$_GET['q']== 3) 
                    {
                        $q=mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC " )or die('Error fetching rank: ' . mysqli_error($con));
                        echo  '<div class="panel title"><div class="table-responsive">
                        <table class="table table-striped title1" >
                        <thead>
                            <tr style="color:red"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Email</b></center></td><td><center><b>Score</b></center></td></tr>
                        </thead>
                        <tbody>';
                        $c=0;

                        while($row=mysqli_fetch_array($q) )
                        {
                            $e=$row['email'];
                            $s=$row['score'];
                            // Get user name from user table
                            $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error fetching user details: ' . mysqli_error($con));
                            while($row_user=mysqli_fetch_array($q12) ) // Renamed $row to $row_user
                            {
                                $name=$row_user['name'];
                            }
                            $c++;
                            echo '<tr><td style="color:black"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$e.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo '</tbody></table></div></div>';
                    }

                    // New section for Essay Questions (Placeholder)
                    if(@$_GET['q']== 4) 
                    {
                        echo '
                        <div class="panel text-center">
                            <h2 class="title1" style="color:#28a745; margin-bottom: 25px;">Essay Questions</h2>
                            <p style="font-size: 1.1em; margin-bottom: 30px;">This section is under development and will soon display various essay questions for you to answer.</p>
                            <p><i>(Content for essay questions will be loaded here in a future update.)</i></p>
                            <br>
                            <a href="welcome.php?q=home" class="btn btn-info">
                                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back to Home
                            </a>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

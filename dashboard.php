<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once 'database.php';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Online Quiz System</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

    <style>
        body {
            /* Set the background image and its properties */
            background-image: url('https://images.unsplash.com/photo-1549420556-b09b555776d6?q=80&...');
            background-size: cover; /* Cover the entire background */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-attachment: fixed; /* Fix the background relative to the viewport */
            background-position: center center; /* Center the image */
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
                <a class="navbar-brand" href="dashboard.php?q=0"><b>Dashboard</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dashboard.php?q=0">Home<span class="sr-only">(current)</span></a></li>
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dashboard.php?q=1">User</a></li>
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dashboard.php?q=2">Ranking</a></li>
                    <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5 || @$_GET['q']==8) echo'active"'; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz Management<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?q=4">Add Quiz</a></li>
                            <li><a href="dashboard.php?q=5">Remove Quiz</a></li>
                            <li><a href="dashboard.php?q=8">Generate AI Quiz</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if(@$_GET['q']==6 || @$_GET['q']==7) echo'active"'; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Essay Management<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?q=6">Add Essay Questions</a></li>
                            <li><a href="dashboard.php?q=7">View/Remove Essays</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if(@$_GET['q']==9 || @$_GET['q']==10) echo'active"'; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feedback<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="dashboard.php?q=9">Feedbacks</a></li>
                            <li><a href="dashboard.php?q=10">Suggestions</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if(@$_GET['q']==11) echo'class="active"'; ?>><a href="dashboard.php?q=11"></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $email; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php?q=dashboard.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Home Page Content (Ranking Overview)
                if(@$_GET['q']==0)
                {
                    // Existing code for displaying user count, quiz count, total questions etc.
                    $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td>
                        <td><center><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                    }
                    echo '</table></div></div>';
                }

                // User Management Page Content
                if(@$_GET['q']==1)
                {
                    // Existing code for displaying registered users
                    $result = mysqli_query($con,"SELECT * FROM user") or die('Error');
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>S.N.</b></center></td><td><center><b>Name</b></center></td><td><center><b>College</b></center></td><td><center><b>Email</b></center></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $college = $row['college'];
                        $email = $row['email'];
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$college.'</center></td><td><center>'.$email.'</center></td>
                        <td><center><a title="Delete User" href="update.php?demail='.$email.'" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></center></td></tr>';
                    }
                    echo '</table></div></div>';
                }

                // Ranking Page Content
                if(@$_GET['q']==2)
                {
                    // Existing code for displaying user rankings
                    $q = mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC") or die('Error');
                    echo  '<div class="panel title"><div class="table-responsive">
                    <table class="table table-striped title1" >
                    <tr><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>College</b></center></td><td><center><b>Score</b></center></td></tr>';
                    $c=0;
                    while($row = mysqli_fetch_array($q))
                    {
                        $e=$row['email'];
                        $s=$row['score'];
                        $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' ")or die('Error98');
                        while($row=mysqli_fetch_array($q12))
                        {
                            $name=$row['name'];
                            $college=$row['college'];
                        }
                        $c++;
                        echo '<tr><td style="color:#99cc32"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$college.'</center></td><td><center>'.$s.'</center></td></tr>';
                    }
                    echo '</table></div></div>';
                }

                // Add Quiz (Step 1 - Quiz Details)
                if(@$_GET['q']==4 && !isset($_GET['step']))
                {
                    echo '
                    <div class="row">
                        <span class="title1" style="margin-left:40%;font-size:30px;color:#000;"><b>Enter Quiz Details</b></span><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6">
                        <form class="form-horizontal title1" name="form" action="update.php?q=addquiz" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>
                                    <div class="col-md-12">
                                        <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="total"></label>
                                    <div class="col-md-12">
                                        <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number" min="1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="sahi"></label>
                                    <div class="col-md-12">
                                        <input id="sahi" name="sahi" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>
                                    <div class="col-md-12">
                                        <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12">
                                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                    </div>
                                </div>
                            </fieldset>
                        </form></div>
                    </div>';
                }

                // Add Quiz (Step 2 - Questions)
                if(@$_GET['q']==4 && (@$_GET['step'])==2 )
                {
                    echo '
                    <div class="row">
                    <span class="title1" style="margin-left:40%;font-size:30px;color:#000;"><b>Enter Question Details</b></span><br /><br />
                    <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
                    <fieldset>
                    ';

                    for($i=1;$i<=@$_GET['n'];$i++)
                    {
                        echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><div class="form-group">
                        <label class="col-md-12 control-label" for="qns'.$i.' "></label>
                        <div class="col-md-12"><textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..." required></textarea>  </div></div>
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="'.$i.'1"></label>
                        <div class="col-md-12"><input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text" required></div></div>
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="'.$i.'2"></label>
                        <div class="col-md-12"><input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text" required></div></div>
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="'.$i.'3"></label>
                        <div class="col-md-12"><input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text" required></div></div>
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="'.$i.'4"></label>
                        <div class="col-md-12"><input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text" required></div></div>
                        <br /><b>Correct answer for question number&nbsp;'.$i.'&nbsp;:</b><br />
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="ans'.$i.'"></label>
                        <div class="col-md-12"><select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" required>
                        <option value="a">Select answer for question '.$i.'</option>
                        <option value="a">option a</option>
                        <option value="b">option b</option>
                        <option value="c">option c</option>
                        <option value="d">option d</option> </select></div></div><br /><br />';
                    }

                    echo '<div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12">
                        <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                    </div></div>

                    </fieldset>
                    </form></div></div>';
                }
                ?>

                <?php
                    // NEW SECTION: AI Quiz Generation Form
                    if(@$_GET['q']==8)
                    {
                        echo '
                        <div class="row">
                            <span class="title1" style="margin-left:40%;font-size:30px;color:#000;"><b>Generate AI Quiz</b></span><br /><br />
                            <div class="col-md-3"></div><div class="col-md-6">
                            <form class="form-horizontal title1" name="ai_quiz_form" action="update.php?q=generate_ai_quiz" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="ai_topic"></label>
                                        <div class="col-md-12">
                                            <input id="ai_topic" name="ai_topic" placeholder="Enter quiz topic (e.g., \'World History\', \'Python Programming\')" class="form-control input-md" type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="ai_num_questions"></label>
                                        <div class="col-md-12">
                                            <select id="ai_num_questions" name="ai_num_questions" class="form-control input-md">
                                                <option value="5">5 Questions</option>
                                                <option value="10">10 Questions</option>
                                                <option value="15">15 Questions</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="ai_difficulty"></label>
                                        <div class="col-md-12">
                                            <select id="ai_difficulty" name="ai_difficulty" class="form-control input-md">
                                                <option value="easy">Easy</option>
                                                <option value="medium" selected>Medium</option>
                                                <option value="hard">Hard</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="ai_marks_right"></label>
                                        <div class="col-md-12">
                                            <input id="ai_marks_right" name="ai_marks_right" placeholder="Marks for a correct answer (e.g., 3)" class="form-control input-md" min="1" type="number" value="3" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="ai_marks_wrong"></label>
                                        <div class="col-md-12">
                                            <input id="ai_marks_wrong" name="ai_marks_wrong" placeholder="Minus marks for a wrong answer (e.g., 1)" class="form-control input-md" min="0" type="number" value="1" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for=""></label>
                                        <div class="col-md-12">
                                            <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Generate Quiz" class="btn btn-primary"/>
                                        </div>
                                    </div>

                                </fieldset>
                            </form></div>
                        </div>';
                    }
                ?>

                <?php
                // Remove Quiz Page Content
                if(@$_GET['q']==5)
                {
                    $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td>
                        <td><center><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                    }
                    echo '</table></div></div>';
                }
                ?>

                <?php
                // Add Essay Questions Page Content
                if(@$_GET['q']==6)
                {
                    echo '
                    <div class="row">
                    <span class="title1" style="margin-left:40%;font-size:30px;color:#000;"><b>Add Essay Question</b></span><br /><br />
                    <div class="col-md-3"></div><div class="col-md-6">
                    <form class="form-horizontal title1" name="essay_form" action="update.php?q=addessay" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="essay_title"></label>
                                <div class="col-md-12">
                                    <input id="essay_title" name="essay_title" placeholder="Enter Essay Topic" class="form-control input-md" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="essay_question"></label>
                                <div class="col-md-12">
                                    <textarea rows="5" cols="8" id="essay_question" name="essay_question" class="form-control" placeholder="Write essay question here..." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12">
                                    <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit Essay" />
                                </div>
                            </div>
                        </fieldset>
                    </form></div>
                    </div>';
                }
                ?>

                <?php
                // View/Remove Essays Page Content
                if(@$_GET['q']==7)
                {
                    $result = mysqli_query($con,"SELECT * FROM essay_questions ORDER BY date DESC") or die('Error fetching essays: ' . mysqli_error($con));
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Date</b></center></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $date = $row['date'];
                        $essay_id = $row['essay_id'];
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$date.'</center></td>
                        <td><center><b><a href="update.php?q=rmessay&essay_id='.$essay_id.'" class="pull-right btn sub1" style="margin:0px;background:red;color:black"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                    }
                    echo '</table></div></div>';
                }
                ?>

            </div>
        </div>
    </div>
</body>
</html>

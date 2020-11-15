<?php
    session_start();
    if(filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST')
    {
        if(isset($_POST['logoff'])) 
        {
            $_SESSION['loggedIn'] = "no";
        }
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == "no")
    {
        header("Location: login.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            #mainDiv {margin-left: 100px; margin-top: 100px;}
            .col1 {width: 500px; float: left;}
            .col2 {float: left;}
            .rowContainer {clear: left; height: 40px;}
            .error {margin-left: 100px; clear: left; height: 40px; color: red;}
        </style>
        <title>Schools Upload</title>
    </head>
    <body data-new-gr-c-s-check-loaded="14.983.0" id="w6LoginPage">
        <ul>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/otherWork.html">Other Work</a></li>
        </ul>
        <div id="mainDiv">
            <form method="post" action="logoff.php">
                <input type="submit" name="logoff" value="Logoff" class="btn btn-dark">
            </form>
        </div>
    </body>
</html>
<?php
    require "model/model_schools.php";
    session_start();
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST')
        if (checkLogin($_POST['username'],$_POST['password']))
            $_SESSION['loggedIn'] = "yes";
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == "yes") {
        deleteAllSchools();
        header("Location: upload.php");
    }
?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Schools Login</title>
</head>

<body data-new-gr-c-s-check-loaded="14.983.0" id="w6LoginPage">
    <ul>
        <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
    </ul>
    <form method="post" action="login.php">
        <div class="rowContainer">
            <h2><b class="schoolTitle">Please Login</b></h2>
        </div>
        <div class="rowContainer">
            <div class="col1"><b style='font-size:20px;font-family:itimFont;'>User Name:</b></div>
            <div class="col2"><input type="text" name="username" value="donald"></div>
        </div>
        <div class="rowContainer">
            <div class="col1"><b style='font-size:20px;font-family:itimFont;'>Password:</b></div>
            <div class="col2"><input type="password" name="password" value="duck"></div>
        </div>
        <div class="rowContainer">
            <div class="col1">&nbsp;</div>
            <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-dark" style='font-family:itimFont;'></div>
        </div>
    </form>
    <?php
        require "footer.php";
    ?>
</body>

</html>
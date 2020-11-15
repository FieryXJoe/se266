<?php
    require "model/model_schools.php";
    if(isset($_FILES['file1'])){
        $tmp_name = $_FILES['file1']['tmp_name'];
        $path = getcwd() . DIRECTORY_SEPARATOR . 'uploads';
        $new_name = $path.DIRECTORY_SEPARATOR.$_FILES['file1']['name'];
        move_uploaded_file($tmp_name,$new_name);
        deleteAllSchools();
        insertSchoolsFromFile($new_name);
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
            .col1 {width: 100px; float: left;}
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
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><input type="file" name="file1"></td>
                        <td><input type="submit" name="upload" value="Upload" style="font-weight:bolder"></td>
                    </tr>
                </table>
                <?php
                    if(isset($_FILES['file1']))
                        echo "File Uploaded!";
                ?>
            </form>
        </div>
    </body>
</html>
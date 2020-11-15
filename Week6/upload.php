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
        <title>Schools Upload</title>
    </head>
    <body data-new-gr-c-s-check-loaded="14.983.0" id="w6LoginPage">
        <?php
            require "header.php";
        ?>
        <div class="mainDiv">
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
<?php
    require "model/model_schools.php";
    if(isset($_FILES['file1'])){
        $tmp_name = $_FILES['file1']['tmp_name'];
        $path = getcwd() . DIRECTORY_SEPARATOR . 'uploads';
        $new_name = $path.DIRECTORY_SEPARATOR.$_FILES['file1']['name'];
        move_uploaded_file($tmp_name,$new_name);
        insertSchoolsFromFile($new_name);
        header("Location: search.php");
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
            <h2><b class="schoolTitle">Please Upload Schools.csv</b></h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><input type="file" name="file1" style='font-size:20px;font-family:itimFont;'></td>
                        <td><input type="submit" name="upload" value="Upload" style="font-weight:bolder; font-family:itimFont;"></td>
                    </tr>
                </table>
                <?php
                    if(isset($_FILES['file1']))
                        echo "<div id = 'font-family:itimFont;'>File Uploaded!</div>";
                ?>
            </form>
        </div>
        <?php
            require "footer.php";
        ?>
    </body>
</html>
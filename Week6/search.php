<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Schools Search</title>
    </head>
    <body data-new-gr-c-s-check-loaded="14.983.0" id="w6LoginPage">
        <?php
            require "header.php";
        ?>
        <div class="mainDiv">
            <form method="post" action="search.php">
                <div class="rowContainer">
                    <h2><b class="schoolTitle">Search Schools</b></h2>
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1" style='font-family:itimFont;'><b>School Name:</b></div>
                    <div class="col2"><input type="text" name="schoolName" style='font-family:itimFont;'></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1" style='font-family:itimFont;'><b>City:</b></div>
                    <div class="col2"><input type="text" name="city" style='font-family:itimFont;'></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1" style='font-family:itimFont;'><b>State:</b></div>
                    <div class="col2"><input type="text" name="state" style='font-family:itimFont;'></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1">&nbsp;</div>
                    <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-dark" style='font-family:itimFont;'></div> 
                </div>
            </form>
            <?php
                require "model/model_schools.php";
                if(filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST')
                {
                    if(isset($_POST['search']))
                    {
                        if(isset($_POST['schoolName']) || isset($_POST['city']) || isset($_POST['state']))
                        {
                            $schools = getSchools($_POST['schoolName'], $_POST['city'], $_POST['state']);
                            echo "<div style='font-family:itimFont;'>Found " . count($schools) . " Schools</div>";
                            echo "<table style='font-family:itimFont;'>";
                                echo "<tr>";
                                    echo "<th>Name</th>";
                                    echo "<th>City</th>";
                                    echo "<th>State</th>";
                                echo "</tr>";
                                for($index = 0; $index < count($schools); $index++)
                                {
                                    echo "<tr>";
                                        echo "<td>" . $schools[$index]['schoolName'] . "</td>";
                                        echo "<td>" . $schools[$index]['schoolCity'] . "</td>";
                                        echo "<td>" . $schools[$index]['schoolState'] . "</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";
                        }
                    }
                }
            ?>
        </div>
        <?php
            require "footer.php";
        ?>
    </body>
</html>
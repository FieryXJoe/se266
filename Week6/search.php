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
        <ul>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
            <li><a href="http://se266-sherry-j-2020.herokuapp.com/otherWork.html">Other Work</a></li>
        </ul>
        <div class="mainDiv">
            <form method="post" action="search.php">
                <div class="rowContainer">
                    <h2><b>Search Schools</b></h2>
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1"><b>School Name:</b></div>
                    <div class="col2"><input type="text" name="schoolName"></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1"><b>City:</b></div>
                    <div class="col2"><input type="text" name="city"></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1"><b>State:</b></div>
                    <div class="col2"><input type="text" name="state"></div> 
                </div>
                &nbsp;
                <div class="rowContainer">
                    <div class="col1">&nbsp;</div>
                    <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-dark"></div> 
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
                            echo "<table>";
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
    </body>
</html>
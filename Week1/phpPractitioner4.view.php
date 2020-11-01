<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body style="font-weight:bold;">
<ul>
        <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
        <li><a href="http://se266-sherry-j-2020.herokuapp.com/otherWork.html">Other Work</a></li>
</ul>
    <style>
        table{
            border:2px solid black;
            margin:auto;
        }
        td{
            border:1px solid black;
            text-align:center;
            padding:5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Age</td>
        
            <td>Allowed In?</td>
        </tr>
        <?php
            foreach($ages as $age)
                echo "<tr> <td>" . $age . "</td> <td>" . (aboveAgeLimit($age) ? "&#9989" : "&#10060") . "</td> </tr>";
        ?>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
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

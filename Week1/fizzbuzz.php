<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body style="font-weight:bold;">
<ul>
        <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
</ul>
<?php
    function fizzbuzz($num)
    {
        $result = "";
        $result .= ($num % 2 == 0) ? "Fizz" : "";
        $result .= ($num % 3 == 0) ? "Buzz" : "";
        if($result == "")
            $result = $num; 
        return $result;
    }
    for($i = 1; $i <= 100; $i++)
        echo fizzbuzz($i) . "<br>";
?> 

</body>
</html>

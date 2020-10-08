<!DOCTYPE html>
<html>
<body>

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

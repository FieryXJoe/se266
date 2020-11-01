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
<ul>
    <?php
        foreach($task as $key => $value)
            echo '<li style="margin:20px;"><strong>' . $key . "</strong> \t || \t" . $value . "</li>";
    ?> 
</ul>

</body>
</html>

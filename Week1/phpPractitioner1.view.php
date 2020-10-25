<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body style="font-weight:bold;">
<ul>
        <li><a href="http://se266-sherry-j-2020.herokuapp.com/">Home</a></li>
</ul>

<ul>
    <?php
        foreach($animals as $animal)
            echo '<li>' . $animal . "</li>";
    ?> 
</ul>

</body>
</html>

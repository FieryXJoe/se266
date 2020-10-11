<!DOCTYPE html>
<html>
<body>

<ul>
    <?php
        foreach($task as $key => $value)
            echo '<li><strong>' . $key . "</strong> \t || \t" . $value . "</li>";
    ?> 
</ul>

</body>
</html>

<!DOCTYPE html>
<html>
<body>

<h2>Task Info</h2>
<ul>
    <li><strong>Title</strong> || <?= $task["title"]; ?> </li> 
    <li><strong>Due</strong> || <?= $task["due"]; ?> </li> 
    <li><strong>Assigned To</strong> || <?= $task["assignedTo"]; ?> </li> 
    
    <li>
        <strong>Completed</strong> 
        <?= $task["completed"] ? "&#9989" : "&#10060" ?>
    </li> 
</ul>
<!--This was added to show true case was easy copy/past with 1 edit-->
<ul style="list-style-type: circle;">
    <li><strong>Title</strong> || <?= $task2["title"]; ?> </li> 
    <li><strong>Due</strong> || <?= $task2["due"]; ?> </li> 
    <li><strong>Assigned To</strong> || <?= $task2["assignedTo"]; ?> </li> 
    
    <li>
        <strong>Completed</strong> 
        <?= $task2["completed"] ? "&#9989" : "&#10060" ?>
    </li> 
</ul>

</body>
</html>

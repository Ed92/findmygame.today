<?php

 

require_once 'dbconnect.php';

 

if($_POST) {

    $groupname = $_POST['groupname'];

    $description = $_POST['description'];

    $scheduling = $_POST['scheduling'];

    $targetaudience = $_POST['targetaudience'];

    $groupsize = $_POST['groupsize'];

            
    $sql = "INSERT INTO groups (group_name, description, scheduling, target_audience, open_spots) VALUES ('$groupname', '$description', '$scheduling', '$targetaudience',  '$groupsize' )";

    if($conn->query($sql) === TRUE) {

        echo "<p>New Record Successfully Created</p>";

        echo "<a href='../create.php'><button type='button'>Back</button></a>";

        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {

        echo "Error " . $sql . ' ' . $conn->connect_error;

    }

 

    $conn->close();

}

 

?>
<?php
require_once 'dbconnect.php';
if($_POST) {

    $groupname = $_POST['groupname'];

    $description = $_POST['description'];

    $scheduling = $_POST['scheduling'];

    $targetaudience = $_POST['targetaudience'];

    $groupsize = $_POST['groupsize'];

 

    $id = $_POST['groups_id'];

 

    $sql = "UPDATE groups SET groupname = '$groupname', groupdescription = '$description', scheduling = '$scheduling', targetaudience = '$targetaudience', groupsize = '$groupsize', WHERE groups_id = {$id}";

    if($conn->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";

        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";

        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {

        echo "Error while updating record : ". $conn->error;

    }

 

    $conn->close();

 

}

 
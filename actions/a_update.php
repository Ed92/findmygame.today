<?php
require_once 'db_connect.php';

if($_POST) {

    $groupname = $_POST['groupname'];
    $description = $_POST['description'];
    $scheduling = $_POST['scheduling'];
    $targetaudience = $_POST['targetaudience'];
    $groupsize = $_POST['groupsize'];

    $id = $_POST['id'];

    $sql = "UPDATE groups SET group_name = '$groupname', description = '$description', scheduling = '$scheduling', target_audience = '$targetaudience', open_spots = '$groupsize' WHERE groups_id = '{$id}'";

    if($conn->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error while updating record : ". $conn->error;
    }

    $conn->close();
 

}

 
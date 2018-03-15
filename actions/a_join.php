<?php
require_once 'db_connect.php';

// if($_GET['id']) {
//     $id = $_GET['id'];
//     $sql = "SELECT * FROM groups WHERE groups_id = {$id}";
//     $result = $conn->query($sql);
//     $data = $result->fetch_assoc();
//     $conn->close();
// };
$id = $_GET['id'];

$sql= "UPDATE connector2 SET fk_user_id = $_SESSION['user'], fk_group_id = {$id}";
?>

<!-- <a href='action/a_join.php?id=".$row['groups_id']."'><button type='button'class='btn'>Join</button></a> -->

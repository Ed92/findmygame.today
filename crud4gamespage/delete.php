<?php
require_once 'actions/dbconnect.php';
if($_GET['groups_id']) {
    $id = $_GET['groups_id'];
    $sql = "SELECT * FROM groups WHERE groups_id = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
<h3>Do you really want to delete this user?</h3>
<form action="actions/a_delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['groups_id'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="index.php"><button type="button">No, go back!</button></a>
</form>
</body>
</html>
<?php
}
?>
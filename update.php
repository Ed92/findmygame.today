<?php
require_once 'actions/db_connect.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM groups WHERE groups_id = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Edit Group</title>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
        table tr th {
            padding-top: 20px;
        }
    </style>
</head>
<body>
<fieldset>
    <legend>Update Group</legend>
    <form action="actions/a_update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Group Name</th>
                <td><input type="text" name="groupname" placeholder="New group name" value="<?php echo $data['group_name'] ?>" /></td>
            </tr>     
            <tr>
                <th>Group Description</th>
                <td><input type="text" name="description" placeholder="description" value="<?php echo $data['description'] ?>" /></td>
            </tr>
            <tr>
                <th>Meet up Time</th>
                <td><input type="text" name="scheduling" placeholder="eg. every thursday at 4pm" value="<?php echo $data['scheduling'] ?>" /></td>
            </tr>
            <tr>
                <th>Target Audience</th>
                <td><input type="text" name="targetaudience" placeholder="Experience level or age" value="<?php echo $data['target_audience'] ?>" /></td>
            </tr>     
            <tr>
                <th>Group Size</th>
                <td><input type="text" name="groupsize" placeholder="min or max amount of people" value="<?php echo $data['open_spots'] ?>" /></td>
            </tr>     
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['groups_id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="home.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
</fieldset>
</body>
</html>
<?php
}
?>
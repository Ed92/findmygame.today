<?php
require_once 'actions/dbconnect.php';
if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM groups WHERE groups_id = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();
?>
<!DOCTYPE html>
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
                <td><input type="text" name="groupname" placeholder="New group name" value="<?php echo $data['groupname'] ?>" /></td>
            </tr>     
            <tr>
                <th>Group Description</th>
                <td><input type="text" name="groupdescription" placeholder="group description" value="<?php echo $data['groupdescription'] ?>" /></td>
            </tr>
            <tr>
                <th>Meet up Time</th>
                <td><input type="text" name="scheduling" placeholder="eg. every thursday at 4pm" value="<?php echo $data['scheduling'] ?>" /></td>
            </tr>
            <tr>
                <th>Target Audience</th>
                <td><input type="text" name="targetaudience" placeholder="Experience level or age" value="<?php echo $data['targetaudience'] ?>" /></td>
            </tr>     
            <tr>
                <th>Group Size</th>
                <td><input type="text" name="groupsize" placeholder="min or max amount of people" value="<?php echo $data['groupsize'] ?>" /></td>
            </tr>     
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['groups_id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
</fieldset>
</body>
</html>
<?php
}
?>
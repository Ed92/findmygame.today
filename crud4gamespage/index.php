<?php require_once 'actions/dbconnect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
    <style type="text/css">
        .manageUser {
            width: 50%;
            margin: auto;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="manageUser">
    <a href="create.php"><button type="button">Add New Group</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Group Description</th>
                <th>Meet up time</th>
                <th>Target Audience</th>
                 <th>Group Size</th>
            </tr>
        </thead>
        <tbody>
             <?php
            $sql = "SELECT * FROM groups ";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['group_name']."</td> 
                        <td> ".$row['description']."</td>

                        <td>".$row['scheduling']." </td> 
                        <td>".$row['target_audience']." </td>
                        <td> ".$row['open_spots']."</td>
                        <td>
                            <a href='update.php?id=".$row['groups_id']."'><button type='button'>Edit</button></a>
                            <a href='delete.php?id=".$row['groups_id']."'><button type='button'>Delete</button></a>
                        </td>
                    </tr>";
                }
            } else {
               echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
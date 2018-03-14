<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD  |  Add User</title>
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
    <legend>Add New Group</legend>

    <form action="actions/a_create.php" method="post">

        <table cellspacing="0" cellpadding="0">

            <tr>

                <th>Group Name</th>

                <td><input type="text" name="groupname" placeholder="SKTT1" /></td>

            </tr>     

            <tr>

                <th>Group Description</th>

                <td><input type="text" name="description" placeholder="Group Description" /></td>

            </tr>

            <tr>

                <th>Meet up time</th>

                <td><input type="text" name="scheduling" placeholder="eg. every thursday at 4pm" /></td>

            </tr>

             <tr>

                <th>Target Audience</th>

                <td><input type="text" name="targetaudience" placeholder="Experience level or age" /></td>

            </tr>

            <tr>

                <th>Group Size</th>

                <td><input type="text" name="groupsize" placeholder="min or max amount of people" /></td>

            </tr>

            <tr>

                <td><button type="submit">Submit Group</button></td>

                <td><a href="home.php"><button type="button">Back</button></a></td>

            </tr>

        </table>

    </form>

 

</fieldset>

 

</body>

</html>
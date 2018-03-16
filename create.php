<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD  |  Add User</title>
       <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Game Box  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
    body{
        background-color: black;
        height: 800px;
    }
</style>
</head>
<body>
<fieldset>
    <div class="update_tabel">
        <h1>Add New Group</h1>

    <form action="actions/a_create.php" method="post">

        <table cellspacing="0" cellpadding="0" class="table">

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

                <td><button type="submit" class="btn">Submit Group</button></td>

                <td><a href="home.php"><button type="button" class="btn">Back</button></a></td>

            </tr>

        </table>

    </form>

    </div>
    
 

</fieldset>

 

</body>

</html>
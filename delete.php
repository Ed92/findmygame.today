<?php
require_once 'actions/db_connect.php';
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
    <title>Delete User</title>
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
    html{
        background-color: black;
        height: 800px;
    }
    body{
        background-color: black;
        height: 800px;
    }
</style>

</head>
<body>
	<div class="update_tabel">
		<h3>Do you really want to delete this user?</h3>
		<form action="actions/a_delete.php" method="post">
		    <input type="hidden" name="id" value="<?php echo $data['groups_id'] ?>" />
		    <button type="submit" class="btn">Yes, delete it!</button>
		    <a href="home.php"><button type="button" class="btn">No, go back!</button></a>
		</form>
	</div>


</body>
</html>
<?php
}
?>
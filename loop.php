$sql = "SELECT user_id, lastname, firstname FROM Users";

$result = mysqli_query($conn, $sql);

// fetch a next row (as long as there are some) into $row

while($row = mysqli_fetch_assoc($result)) {

        printf("ID=%s %s (%s)<br>",

                  $row["user_id"], $row["lastname"],$row["firstname"]);

 }

echo "Fetched data successfully\n";

// Free result set

mysqli_free_result($result);

// Close connection

mysqli_close($conn);
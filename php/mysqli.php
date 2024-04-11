<?php
// Connect To DB
$hostname="localhost";
$database="mydbname";
$username="root";
$password="";

$conn = mysqli_connect($hostname, $username, $password, $database);
?>

<?php
$query = "SELECT ssfullname, ssemail FROM userss ORDER BY ssid";
$result = mysqli_query($conn, $query);
$num_results = mysqli_num_rows($result);
?>

<?php
/*Loop through each row and display records */
for($i=0; $i<$num_results; $i++) {
$row = mysqli_fetch_assoc($result);
?>

Name: <?php print $row['ssfullname']; ?>
<br />
Email: <?php print $row['ssemail']; ?>
<br /><br />

<?php 
// end loop
} 
?>
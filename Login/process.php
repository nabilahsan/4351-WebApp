<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'login');

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
else {
     echo 'connection successful<br>';
}


echo 'before query<br>';

$results = $conn->query("SELECT * FROM users");
echo 'after query<br>';

echo $results->num_rows;
echo 'after rows<br>';

$row = $results->fetch_object();
$records[] = $row;

$results->free();

if ($_POST['user'] == 'admin') {
     echo '<button>Delete</button>';
}




//  If user is entered, true.
if(!isset($_POST['user'])) {
     echo 'enter user<br>';
}
if(!isset($_POST['pass'])) {
     echo 'enter pass<br>';
}
 

echo "end of file";
?>
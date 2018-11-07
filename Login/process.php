<?php
// Johnny
//$conn = new mysqli('localhost', 'root', 'root', 'login');

// Nabil
$conn = mysqli_connect('localhost', 'user2', 'Hershey@2018', 'login');

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
else {
     echo 'connection successful<br>';
}


//  Get credentials
$username = $_POST['user'];
$password = $_POST['pass'];
//echo 'username is '.$username.'<br>';


//  Check login
$query = "SELECT * FROM users WHERE username = '$username'";



if ($result = $conn->query($query)) {
     //echo 'in the if<br>';
     $res = $result->fetch_assoc();
     if ($res['username']!=$username && $res['password']!=$password) {
          $errors = array();
          array_push($errors, "Username is required");
          header('Location:login.php');
          die();
          echo 'Welcome '.$username.'<br>';
           printf('%s',$res['username'].'<br>');
     }
     else {

          if (empty($username)) {
               $errors = array();
               array_push($errors, "Username is required");
               header('Location:login.php');
               die();
          }

          header('Location:login.php');
          die();
     }
}




//  Delete  a user.
// $query = "DELETE FROM users WHERE username='Jane'";
// if ($conn->query($query)) {
//      echo "Success deletion<br>";
// }else {
//      echo "did not delete<br>";
// }

// Add a user.
// $query = "INSERT INTO users (username, `password`) VALUES ('Jane', 'birds')";
// if ($result = $conn->query($query)) {
//      echo "New record created<br>";
// }else {
//      echo "error inserting<br>";
// }

// $results = $conn->query("SELECT * FROM users");
// echo 'number of rows: '.$results->num_rows.'<br>';
// $row = $results->fetch_object();
// $records[] = $row;
// $results->free();
//  Show users.
$query = "SELECT * FROM users";
if ($result = $conn->query($query)) {
     
     while ($row = $result->fetch_assoc()) {
          printf("%s %s %s %s", $row["id"], $row["username"], $row['password'], $row['AdminType']."<br>");
     }
}


//  Button for admin
if ($_POST['user'] == 'admin') {
     echo '<button>Delete</button><br>';
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
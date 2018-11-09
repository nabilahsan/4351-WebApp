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
//  Check login
$query = "SELECT * FROM users WHERE username = '$username'";


if ($result = $conn->query($query)) {

      
      $res = $result->fetch_assoc();



      if ($username == 'admin' && $password = $res['password']) {
            
            //  Button for admin
            $query = "SELECT * FROM users";
            if ($result = $conn->query($query)) {
                 
                  echo 'Welcome '.$username.'<br>';
                  while ($row = $result->fetch_assoc()) {
                        printf("%s %s %s %s", $row["id"], $row["username"], $row['password'], $row['AdminType']."<br>");
                  }
            }
            echo '<button>Delete</button> ';
            echo '<button>Edit</button> ';
            echo '<button>Add</button><br>';
            $result->free();
      }


      else if (empty($username) || empty($password)) {
            header('Location:login.php');
            die();
     }
     else if ($res['username']==$username && $res['password']==$password) {
           
           echo 'Welcome '.$username.'<br>';
           //printf('%s',$res['username'].'<br>');

           $type = $res['AdminType'];
           //echo 'type: '.$type.'<br>';


            $query2 = "SELECT * FROM links WHERE LinkType = $type";
            $results = $conn->query($query2);
            // if($results = $conn->query($query2)){
            //       echo "conn->query done<br>";
            // }
            while($res = $results->fetch_assoc()){

                  printf("%s", $res['address'].'<br>');
            }
            


           //  Check links
      //      $queryLinks = "SELECT 'address' FROM links WHERE LinkType = '3'";
      //      $results2 = $conn->query($queryLinks);
      //      echo 'links:<br>';
      //      $res2 = $results2->fetch_assoc();
      //      printf("%s", $res2["id"]);
      //      while ($row = $result2->fetch_assoc()) {
      //       printf("%s", $row['LinkType']."<br>");
      // }
     }
     else {

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


//  Show users.
// $query = "SELECT * FROM users";
// if ($result = $conn->query($query)) {
     
//      while ($row = $result->fetch_assoc()) {
//           printf("%s %s %s %s", $row["id"], $row["username"], $row['password'], $row['AdminType']."<br>");
//      }
// }




//echo "end of file";

// Initial Quesry Attempt
// $results = $conn->query("SELECT * FROM users");
// echo 'number of rows: '.$results->num_rows.'<br>';
// $row = $results->fetch_object();
// $records[] = $row;
// $results->free();
?>
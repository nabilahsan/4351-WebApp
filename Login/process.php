<?php
// Johnny
//$conn = new mysqli('localhost', 'root', 'root', 'login');

// Nabil
$conn = mysqli_connect('localhost', 'user2', 'Hershey@2018', 'login');


//  DB connection check.
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
else {
     echo 'connection successful<br>';
}


//  Get credentials
$username = $_POST['user'];
$password = $_POST['pass'];
//  Login SQL
$query = "SELECT * FROM users WHERE username = '$username'";


if ($result = $conn->query($query)) {

      $res = $result->fetch_assoc();

      //  If IT Admin logs in, Display all links and users.
      if ($username == 'admin' && $password = $res['password']) {
            
            //  Display all users
            $query = "SELECT * FROM users";

            if ($result = $conn->query($query)) {
                 
                  echo 'Welcome '.$username.'<br>';

                  while ($row = $result->fetch_assoc()) {
                        printf("%s %s %s %s", $row["id"], $row["username"], $row['password'], $row['AdminType'].'<br>');
                  }
            }


            //  Display all links.
            $query2 = "SELECT * FROM links";

            $results = $conn->query($query2);

            while($res = $results->fetch_assoc()) {

                  printf("%s %s %s", $res['id'], $res['address'], $res['LinkType'].'<br>');
            }

            //  Delete form and button
            $results = $conn->query($query2);
            ?>
            <form action="process.php">
            <select>
            <?php
                  while($res = $results->fetch_assoc()) {

                  ?>
                  <option value=" <?php $res['id'] ?> "> <?php echo $res['address'] ?> </option>
                  <?php
                        
                        // printf("%s %s %s", $res['id'], $res['address'], $res['LinkType'].'<br>');
                  }            
            ?>
            </select>
            </form>
            <?php
            
            // Html form? when clicked, do action, return to process.php
            //  Buttons, no function yet.
            echo '<button>Delete</button> ';
            echo '<button>Edit</button> ';
            echo '<button>Add</button><br>';
            $result->free();
      }

     //  If regular Admins check in, display only their links
     else if ($res['username']==$username && $res['password']==$password) {
           
           echo 'Welcome '.$username.'<br>';
           //printf('%s',$res['username'].'<br>');

           $type = $res['AdminType'];
           //echo 'type: '.$type.'<br>';

            //  Display Admin links
            $query2 = "SELECT * FROM links WHERE LinkType = $type";

            $results = $conn->query($query2);
            // if($results = $conn->query($query2)){
            //       echo "conn->query done<br>";
            // }
            while($res = $results->fetch_assoc()) {

                  printf("%s", $res['address'].'<br>');
            }
            

      //      Check links
      //      $queryLinks = "SELECT 'address' FROM links WHERE LinkType = '3'";
      //      $results2 = $conn->query($queryLinks);
      //      echo 'links:<br>';
      //      $res2 = $results2->fetch_assoc();
      //      printf("%s", $res2["id"]);
      //      while ($row = $result2->fetch_assoc()) {
      //       printf("%s", $row['LinkType']."<br>");
      // }
     }
      
     //  Empty input check.
      else if (empty($username) || empty($password)) {

            header('Location:login.php');
            die();
     }

     //  Incorrect input check.
     else {

          header('Location:login.php');
          die();
     }
}

//  Delete a user.
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
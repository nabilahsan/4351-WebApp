<?php
     $username = $_POST['username'];
     $password = $_POST['password'];

     $username = stripcslashes($username);
     $password = stripcslashes($password);

     echo "working";
     // $username = mysql_real_escape_string($username);
     // $password = mysql_real_escape_string($password);

     // mysql_connect("localhost", "root", "");
     // mysql_select_db("login");

     // $result = mysql_query("select * from users where username = '$username' and password = '$password'") or die("Failed to query".mysql_error());

     // $row = mysql_fetch_array($result);

?>
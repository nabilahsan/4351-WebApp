<?php
          $conn = new mysqli('localhost', 'root', 'root', 'login');

          if ($conn->connect_errno) {
               echo $conn->connect_error;
               die("unable to connect");
          }
     
?>
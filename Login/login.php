<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Login</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div id="frm">
       <?php include('errors.php'); ?>
       <form action="process.php" method="POST">
    		<p>
               <label>Username:</label>
               <input type="text" id="user" name="user"/>
            </p>
            <p>
               <label>Password:</label>
               <input type="password" id="pass" name="pass"/>
            </p>
            <p>
               <input type="submit" id="btn" value="Login"/>
            </p>
      </form>
   </div>
</body>
</html>


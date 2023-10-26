<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "menu";
   $tableNumber=$_POST['tableNumber'];
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection 
    
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   elseif(isset($_POST['tableNumber'])) 
    {
      $tableNumber=$_POST['tableNumber'];
      $sql = "DELETE FROM orders WHERE table_number=$tableNumber";
  
      if ($conn->query($sql) === TRUE) {
        $success=true;
        header( 'Location: http://localhost/tutor/admin.php?success='.$success);
      }
       else {
        $error='error';
        header( 'Location: http://localhost/tutor/admin.php?error='.$success);
      }
      
      }
  }
?>
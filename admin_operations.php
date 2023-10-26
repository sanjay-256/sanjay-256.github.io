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
 
    else if($_POST["tableNumber"]=="none"){
      echo "Select any operation";
    }

    elseif($_POST["tableNumber"]=="clear_table") 
    {
      $sql = "DELETE FROM orders";
  
      if ($conn->query($sql) === TRUE) {
        echo "Orders deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      }
  
    else
   { 
      
       $sql = "SELECT * FROM orders where table_number='$tableNumber'"; 
       $result = $conn->query($sql);

       
       if (!empty($result) && $result->num_rows > 0) 
        {
  // output data of each row
          echo <<<END
             <table>
             <tr>
              <th>Items</th>
              <th>Quantity</th>
              <th>amount</th>
             <tr>
             
          END;
          echo "Orders for Table Number : $tableNumber <br>";
          while($row = $result->fetch_assoc())
           {
            $item= $row["items"];
            $qty=$row["quantity"];
            $amt=$row["amount"];
            $totalAmount=$row["total_amount"];
            echo <<<END
            
            <tr>
             <td>$item</td>
             <td>$qty</td>
             <td>$amt</td>
            </tr>
            
         END;
            
          
           }
           echo <<<END
             
             <tr>
              <th colspan="2">Total Amount :</th>
              <td>$totalAmount</td>
             <tr>
             <tr>
                <th colspan="3">
                <form method="POST" action="delete.php">
                   <input type="hidden" name="tableNumber" value="$tableNumber">
                   <input type="submit" name="submit" value="Delete Order">
                </form>
                </th>
             </tr>
             </table>
            
          END;
           
        }  
       else 
       {
         echo "No Order in this table";
       }
  
  
   
    $conn->close();
}


}
if(isset($_GET['error']))
    {
        $msg="Can't delete the table";
        echo '<div style="color:red;">'.$msg.'</div>';

        }
        if(isset($_GET['success']))
        {
        $msg="table deleted successfully";
         echo '<div style="color:green;">'.$msg.'</div>';
    }
?> 


















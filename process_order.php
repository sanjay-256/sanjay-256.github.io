<?php
// process_order.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    // Retrieve the table number
    $tableNumber = $_POST["tableNumber"];
    
    // Retrieve the selected items (which were encoded as JSON in JavaScript)
   // $selectedItemsJson = $_POST["selectedItems"];
    //$selectedItems = json_decode($selectedItemsJson, true);

    // Retrieve the total amount
    $totalAmount = $_POST["totalAmount"];
   

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "menu";

    // Create a database connection   print_r($_POST);
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
    foreach ($_POST as $key => $value)
    { 
        if($key=="tableNumber")
        {
            
        }
        elseif($key=="totalAmount")
        {
            
        }
        else{
            $qty=sizeof($value);
            $amt=$value[0];
            $amt=$qty*$amt;
            $sql = "INSERT INTO orders (table_number, items,quantity,amount,total_amount) VALUES ('$tableNumber', '$key','$qty','$amt','$totalAmount')";
            //$stmt = $conn->prepare($sql);
            if (mysqli_query($conn, $sql)) {
               
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              
           
        }
        
    }
    echo "<script>alert('Your order has bee submited successfully total amount :$totalAmount');</script>";

    // Check if the connection was successful
   

    // Insert the order data into the database
    //$itemsJson = json_encode($selectedItems); // Convert selectedItems back to JSON for storage
   
   // $stmt = $conn->prepare($sql);
   // $stmt->bind_param("sss", $tableNumber, $itemsJson, $totalAmount);

    $conn->close();
}
?>

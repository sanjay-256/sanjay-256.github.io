<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator view</title>
    <style>
      *{
        padding: 0px;
        margin: 0px;
      }
      table, th, td
      {
        border:1px solid
      }
      table
      {
        text-align: center;
        margin-left:auto;
        margin-right: auto;
      }
    </style>
</head>
<body style="text-align: center;">

    <h1>Welcome to the Aamin Panel</h1>
    
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    
      <span>Choose table to display orders :</span>
      <select name="tableNumber" id="tableNumber">
          <option value="none">Select Option</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="clear_table">Clear All Table</option>
        </select><br>
      <input type="submit" value="Action">
</form>
<?php include 'admin_operations.php'?>
</body>
</html>
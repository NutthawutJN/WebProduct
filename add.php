<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="homeheader">
        <h2>Add product</h2>
    </div>

    <div class="homecontent">
     
    
        <div class="input-group">
            <?php
            $query = "SELECT * FROM product ORDER BY product_id asc";
            $result = mysqli_query($conn,$query);
            ?>
        <form action="confirm.php" method="get">
            <select name="product" class="drop">
                <option  value="">Choose</option>
                <?php foreach($result as $row){?>
                <option  value="<?php echo $row["product_name"];?>">
                    <?php echo $row["product_name"];?>
                </option>
               <?php } ?>
            </select>
             <div class="input-group">
                 <label for="quantity">quantity</label>
                 <input type="text" name="quantity">
            </div>
            <div class="input-group">
                 <label for="username">Username</label>
                 <input type="text" name="username">
            </div>
            <button type="submit" name="Confirm" class="btn">Add Confirm</button>
        </form>
        </div>
    
    </div>

</body>
</html>
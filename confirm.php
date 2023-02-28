
<?php 
    session_start();
    include('server.php'); 

    $product =$_REQUEST["product"];
    $quantity =$_REQUEST["quantity"];
    $username =$_REQUEST["username"];
    $sql = "SELECT price FROM product WHERE product_name = '$product'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ดึงข้อมูลและเปลี่ยนเป็นตัวเลข
        $row = mysqli_fetch_assoc($result);
        $price = $row["price"];
    } else {
        echo "0 results";
    }
    if ($quantity <= 5) {
        $total_price = $price * $quantity;
    } elseif ($quantity >= 6 && $quantity <= 10) {
        $total_price = $price * $quantity * 0.9;
    } else {
        $total_price = $price * $quantity * 0.8;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="homeheader">
        <h2>Confirm product</h2>
    </div>
    
    <div class="homecontent">
        <form action="confirm_db.php" method="post">

        <input type="hidden" name="product" value="<?php echo $product ?>">
        <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
        <input type="hidden" name="price" value="<?php echo $price ?>">
        <input type="hidden" name="total_price" value="<?php echo $total_price ?>">
        <input type="hidden" name="username" value="<?php echo $username ?>">

            <?php echo "Product category:". $product ?><br>
            <?php echo "Product quantity:" . $quantity?> <br>
            <?php echo "Product price:" .  number_format($price)?> <br>
            <?php echo "Total price:" .  number_format($total_price)?> <br>
            <?php echo "Username:" .$username ?><br>
            <button type="submit" name="Confirm" class="btn">Confirm</button>
        </form>
            
</body>
</html>

<?php
 session_start();
 include('server.php');

$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$total_price = $_POST['total_price'];
$username = $_POST['username'];


///echo $product."<br>";
//echo $quantity."<br>";
//echo $price."<br>";
//echo $total_price."<br>";
//echo $username."<br>";

    //สร้างคำสั่ง SQL เพื่อบันทึกข้อมูล
    $sql = "INSERT INTO orders (product, quantity, price, total_price, username)
            VALUES ('$product', '$quantity', '$price', '$total_price', '$username')";

// สั่งให้ฐานข้อมูลทำการบันทึกข้อมูล
if (mysqli_query($conn, $sql)) {
  echo "Record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>successfully</title>
</head>
<body>
    <form action="index.php">
    <button type="submit" name="submit" class="btn">Back to home page</button>
    </form>
</body>
</html>
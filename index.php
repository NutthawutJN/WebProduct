<?php 
    session_start();
    include('server.php');
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="homeheader">
        <h2>Home Page</h2>
    </div>

    <div class="homecontent">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
        <!-- order user-->
        <?php
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM orders WHERE username='$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table style='width: 50%; margin: auto; text-align: center;'><tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                </tr>";
               
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>"
                    .$row["product"]."</td><td>"
                    .$row["quantity"]."</td><td>"
                    .$row["price"]."</td><td>"
                    .$row["total_price"].
                    "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        <div class="input-group">
        <form class="btn2">
            <button type="button" class="btn" onclick="window.location.href='add.php';">add product</button>
            <button type="button"class="btn" onclick="window.location.href='edit_product.php'">edit product</button>
            <button type="button"class="btn" onclick="window.location.href='edit_product_cat.php'">edit product category</button>
        </form>
        </div>
    
    </div>

</body>
</html>
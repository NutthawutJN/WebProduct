<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['product_edit'])) {
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        if (empty($product)) {
            array_push($errors, "product is required");
            $_SESSION['error'] = "product is required";
        }
        if (empty($price)) {
            array_push($errors, "price is required");
            $_SESSION['error'] = "price is required";
        }
        
        $product_check_query = "SELECT * FROM product WHERE product_name = '$product' LIMIT 1";
        $query = mysqli_query($conn, $product_check_query,);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists

            if ($result['product'] === $product) {
                array_push($errors, "Product already exists");
            }
        }

        if (count($errors) == 0) {

            $sql = "INSERT INTO product (product_name, price) VALUES ('$product', '$price')";
           
            mysqli_query($conn, $sql);


            $_SESSION['product'] = $product;
            $_SESSION['success'] = "You product has edited";
            header('location: index.php');
        } else {
            header("location: edit_product.php");
        }
    }

?>
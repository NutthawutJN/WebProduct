<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['category_name'])) {
        $product_cat = mysqli_real_escape_string($conn, $_POST['product_cat']);

        if (empty($product_cat)) {
            array_push($errors, "product category is required");
            $_SESSION['error'] = "product category is required";
        }
        $product_check_query = "SELECT * FROM product_category WHERE category_name = '$product_cat' LIMIT 1";
        $query = mysqli_query($conn, $product_check_query,);
        $result = mysqli_fetch_assoc($query);

        if ($result) {

            if ($result['product_cat'] === $product_cat) {
                array_push($errors, "Product category already exists");
            }
        }

        if (count($errors) == 0) {

            $sql = "INSERT INTO product_category (category_name) VALUES ('$product_cat')";
           
            mysqli_query($conn, $sql);


            $_SESSION['product_cat'] = $product_cat;
            $_SESSION['success'] = "You product category has edited";
            header('location: index.php');
        } else {
            header("location: edit_product_cat.php");
        }
    }

?>
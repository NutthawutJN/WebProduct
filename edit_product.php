<?php 
    session_start();
    include('server.php'); 
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
        <h2>Edit product</h2>
    </div>

    <div class="homecontent">
        <form action="edit_product_db.php"  method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
             <div class="input-group">
                 <label for="product">Product</label>
                 <input type="text" name="product">
             </div>
             <div class="input-group">
                 <label for="pricec">Price</label>
                 <input type="text" name="price">
             </div>
            <button type="submit" name="product_edit" class="btn">Confirm</button>
        </form>
    </div>
    


</body>
</html>
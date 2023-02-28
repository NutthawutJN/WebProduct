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
        <form action="product_cat_db.php"  method="post">
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
                 <label for="product_cat">Product category</label>
                 <input type="text" name="product_cat">
             </div>
            <button type="submit" name="category_name" class="btn">Confirm</button>
        </form>
    </div>
    


</body>
</html>
<?php
require_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<body>
    <header>
        <h1>Blue E-Commerce</h1>
        <div class="cart">
            <i class="cart-icon fa fa-shopping-cart"></i>
            <span class="cart-count">0</span>
        </div>
    </header>
    <div class="container">
        <?php
            $sql = $connection -> query("SELECT * FROM  products ORDER BY product_id DESC LIMIT 4");
            while($row = $sql -> fetch_assoc()) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];
                
                echo '
                <div class="product">
                    <img src="images/Apple _CanonGadgets_163be83d11ee13.jpeg" alt="Product 1">
                    <h2>'.$product_title.'</h2>
                    <p>Price: $'.number_format($product_price, 0).'</p>
                    <button id="add_to_cart" data-id="'.$product_id.'">Add to Cart</button>
                </div>
                ';
            }
        ?>
       
    </div>
</body>
</html>
<script src="add_cart.js"></script>
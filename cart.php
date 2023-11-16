<?php
require_once "dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
    </header>
    <div class="container">
        <?php
            $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
            $products = array();
            $subtotal = 0.00;

            if($products_in_cart) {
                $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));

                $stmt = $pdo -> prepare('SELECT * FROM products WHERE product_id IN ('.$array_to_question_marks.')');
                $stmt -> execute(array_keys($products_in_cart));
                $products = $stmt -> fetchAll(PDO::FETCH_ASSOC);

                foreach($products as $product) {
                    $product_title = $product['product_title'];
                    $product_image = $product['product_image'];
                    $product_price = $product['product_price'];
                    $product_id = $product['product_id'];

                    $subtotal += (float)$product_price * (int)$products_in_cart[$product_id];

                    echo '
                    <div class="cart-item">
                        <img src="product1.jpg" alt="Product 1">
                        <h2>'.$product_title.'</h2>
                        <p>Price: $ '.$product_price.'</p>
                        <span class="remove-icon" onclick="removeItem(this)">&#10006;</span>
                    </div>
                    
                    ';
                }

            }
        ?>
     
        <div class="cart-total">
            <p>Total: $ <?= $subtotal ?></p>
        </div>
    </div>
    <script>
        function removeItem(element) {
            element.parentElement.remove();
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            animation: fadeIn 0.5s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        input[type="number"] {
            width: 50px;
            text-align: center;
            transition: border 0.3s;
        }

        input[type="number"]:hover,
        input[type="number"]:focus {
            border: 1px solid #007bff;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s, border-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-color: #0056b3;
        }

        input[type="submit"]:active {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            border-color: #007bff;
        }

      

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">

        <h2>Shopping Cart</h2>

        <?php
        session_start();

        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Handle add to cart action
        if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Check if the product is already in the cart
            if (isset($_SESSION['cart'][$productId])) {
                // If yes, increment the quantity
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                // If not, add the product to the cart with quantity 1
                $productName = "Product " . $productId;
                $productPrice = 10.00; // You can set the price here or fetch it from a database
                $_SESSION['cart'][$productId] = array(
                    'name' => $productName,
                    'price' => $productPrice,
                    'quantity' => 1
                );
            }
        }

        // Handle update quantity action
        if (isset($_POST['update'])) {
            foreach ($_POST['quantity'] as $productId => $quantity) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }
        }
        ?>

        <form method="post">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>

                <?php
                $totalAmount = 0;

                foreach ($_SESSION['cart'] as $productId => $product) {
                    $totalAmount += $product['price'] * $product['quantity'];
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo '$' . number_format($product['price'], 2); ?></td>
                    <td>
                        <input type="number" name="quantity[<?php echo $productId; ?>]" value="<?php echo $product['quantity']; ?>" min="1" onchange="updateTotal(this, <?php echo $product['price']; ?>, '<?php echo $productId; ?>')">
                    </td>
                    <td id="total_<?php echo $productId; ?>"><?php echo '$' . number_format($product['price'] * $product['quantity'], 2); ?></td>
                </tr>
                <?php
                }
                ?>

                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total"><?php echo '$' . number_format($totalAmount, 2); ?></td>
                </tr>
            </table>

            <input type="submit" name="update" value="Update Quantity">
        </form>

        <p><a href="index2.php">Back to Product List</a></p>

        <script>
            function updateTotal(input, price, productId) {
                var quantity = input.value;
                var total = price * quantity;
                document.getElementById('total_' + productId).innerText = '$' + total.toFixed(2);

                // Update grand total
                var grandTotal = 0;
                <?php
                foreach ($_SESSION['cart'] as $productId => $product) {
                    echo "grandTotal += " . $product['price'] . " * " . $product['quantity'] . ";\n";
                }
                ?>
                document.getElementById('grandTotal').innerText = '$' + grandTotal.toFixed(2);
            }
        </script>

    </div>

</body>
</html>
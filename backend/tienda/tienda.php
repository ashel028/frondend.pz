<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike en PHP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a; /* Fondo oscuro */
            margin: 0;
            padding: 0;
            text-align: center;
            color: #ffffff;
        }

        .product {
            display: inline-block;
            margin: 20px;
            padding: 20px;
            background-color: #333; /* Casillero oscuro */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-buy {
            background-color: #28a745;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "potrero";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$products = [
    ['id' => 1, 'name' => 'Camiseta Nike', 'price' => 25.00, 'image'=> 'nike-shirt.jpg'],
    ['id' => 2, 'name' => 'Pantalones Nike', 'price' => 40.00, 'image' => 'nike-pants.jpg'],
    ['id' => 3, 'name' => 'Zapatillas Nike', 'price' => 150.00, 'image' => 'nike-shoes.jpg'],
    ['id' => 4, 'name' => 'Sudadera Nike', 'price' => 80.00, 'image' => 'nike-sweatshirt.jpg'],
    ['id' => 5, 'name' => 'Calcetines Nike', 'price' => 5.00, 'image' => 'nike-socks.jpg'],
    ['id' => 6, 'name' => 'Chaqueta Nike', 'price' => 120.00, 'image' => 'nike-jacket.jpg'],
    // Puedes agregar más productos según sea necesario
];

foreach ($products as $product) {
    // Escapar variables para evitar inyección SQL (no recomendado para un entorno de producción real)
    $productId = $conn->real_escape_string($product['id']);
    $productName = $conn->real_escape_string($product['name']);
    $productPrice = $conn->real_escape_string($product['price']);

    echo "<div class='product'>";
    echo "<img src='images/{$product['image']}' alt='{$product['name']}'><br>";
    echo "<h3>{$product['name']}</h3>";
    echo "<p>Precio: $ {$product['price']}</p>";
    echo "<a href='#' class='btn' onclick='addToCart({$productId})'>Agregar al carrito</a>";
    echo "<a href='finalizar_compra.php?product_id={$productId}' class='btn btn-buy'>Comprar</a>";
    echo "</div>";
}
?>

<script>
    function addToCart(productId) {
        alert("Producto agregado al carrito: " + productId);
        // Aquí puedes agregar lógica para manejar la adición al carrito
    }
</script>

</body>
</html>

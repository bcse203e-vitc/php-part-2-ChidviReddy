<?php
$filename = "products.txt";

if (!file_exists($filename)) {
    die("File not found!");
}

$products = [];
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) == 2) {   
        $name = trim($parts[0]);
        $price = (float)trim($parts[1]);
        $products[] = ["name" => $name, "price" => $price];
    }
}

usort($products, function($a, $b) {
    return $a['price'] <=> $b['price'];
});

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align:center;'>";
echo "<tr><th>Product Name</th><th>Price</th></tr>"; 

foreach ($products as $product) {
    echo "<tr><td>{$product['name']}</td><td>{$product['price']}</td></tr>";
}

echo "</table>";
?>

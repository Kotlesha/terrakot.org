<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pawffeeDb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Соединение не удалось: " . $conn->connect_error);
}

$sql = "SELECT ProductName, ProductDescription, ProductPrice, ProductImagePath FROM Products"; // замените на название вашей таблицы
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<div class="image-hover">';
        echo '<img class="product-image" src='.$row["ProductImagePath"].'>';
        echo '</div>';
        echo '<a href="#"><h1 class="product-name">' . $row["ProductName"] .'</h1></a>';
        echo '<p class="product-description">' . $row["ProductDescription"] . '</p>';
        echo '<div class="product-information">';
        echo '<p class="price-value">' . $row["ProductPrice"] . ' Br</p>';
        echo '<div class="numeric-up-down">';
        echo '<div class="triangle-left" onclick="decreaseValue(event)"></div>';
        echo '<input class="number-input" type="number" min="1" max="10" value="1" step="1" readonly>';
        echo '<div class="triangle-right" onclick="increaseValue(event)"></div>';
        echo '</div>';
        echo '<img class="shopping-bag-icon" src="images/icons/shopping-bag-active-icon.png" onclick="showNotification(event)">';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="products-not-found">';
    echo '<img src="images/icons/products-not-found.png">';
    echo '<h1>Товары не найдены</h1>';
    echo '</div>';
}
$conn->close();



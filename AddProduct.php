<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/OperationWithProductStyles.css">
    <link rel="stylesheet" href="styles/HomeStyles.css">
</head>
<body>
<?php
    include('Header.php');
    include "config/Database.php";
    include "models/CategoryModel.php";
    include "models/ProductModel.php";
    $database = Database::getInstance();
    $dbConnection = $database->getConnection();
    $category = new CategoryModel($dbConnection);
?>
<section>
    <?php
    if ($_POST)
    {
        $product = new ProductModel($_POST["product_name"], $_POST["price"], $_POST["product_description"], $_POST["category_id"], $_FILES['image']['tmp_name'], $dbConnection);
        $message = $product->addProduct() ? "Товар успешно добавлен!" : "Невозможно создать товар";
        //echo '<div class="notification-panel" id="notificationPanel">' . $message . '</div>';
    }
    ?>
    <form class="add-form" action="<?= $_SERVER["PHP_SELF"] ?>"  method="post" enctype="multipart/form-data">
        <div class="add_product">
            <h2>Добавление товара</h2>
            <div class = "account-cat-picture">
                <img src="images/cat_account.png" alt="Описание изображения">
            </div>
            <div class="custom-field">
                <input class="custom-field__input" type="text" name="product_name" id="product_name" placeholder="Название продукта" required pattern=".*\S.*">
                <textarea class="custom-field__input" id = "description" name="product_description" placeholder="Описание продукта" required pattern=".*\S.*"></textarea>
                <?php
                    $stmt = $category->readCategoriesInformation();

                    echo "<select class='custom-field__input' name='category_id' required>";
                    echo "<option>Выбрать категорию...</option>";

                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row_category["CategoryId"]}'>{$row_category["CategoryName"]}</option>";
                    }

                    echo "</select>";
                ?>
                <input class="custom-field__input" type="number" name="price" id="price" placeholder="Цена" required min = 0.01 max = 999.99 step="0.01" pattern=".*\S.*">
                <input class="button coffe" type="file" id="image_input" name="image" accept="image/png, image/jpeg" style="display: none" required>
                <label for="image_input" id="image_input_label">Выберите изображение товара</label>
                <div id = "display_image"></div>
            </div>
            <div class="notification-panel" id="notificationPanel"></div>
            <input class="button coffe" type="submit" value="Добавить товар" onclick="showNotification()">
        </div>
    </form>
</section>
<script src="js/OperationWithProducts.js"></script>
<?php include('Footer.php') ?>
</body>
</html>
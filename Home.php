<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/HomeStyles.css" >
    <title>Главная</title>
</head>
<body>
    <?php include 'header.php'?>
    <section class="description-our-cafe">
        <div class="description-text">
            <!--<img src="images/background-image-cat-description-our-cafe.png" alt="Кот в лежанке">-->
            <h1>Переосмыслите идею кафе-зоомагазина</h1>
            <p>Побалуйте себя вкусными угощениями, общаясь со своими питомцами в Pawffee, лучшем зоомагазине с кафе в Беларуси.</p>
        </div>
    </section>
    <section class="our-advantages">
        <h1>Наши достоинства</h1>
        <ul>
            <li>
                <img src="images/advantage.png" alt="Значок звезда">
                <p>Возможность поиграть</br> со своим домашним </br>питомоцем</p>
            </li>
            <li>
                <img src="images/advantage.png" alt="Значок звезда">
                <p>Широкий ассортимент</br>товаров для домашних</br> животных</p>
            </li>
            <li>
                <img src="images/advantage.png" alt="Значок звезда">
                <p>Вкусный кофе</br> и ароматная выпечка</p>
            </li>
        </ul>
    </section>
    <section class="about-us">
        <h1>О нашем кафе</h1>
        <ul>
            <li>
                <p>Добро пожаловать в Pawffee, идеальное место для любителей домашних животных!
                Расположенный в городе Гродно Pawffee - это уникальный зоомагазин с уютным кафе, 
                который предлагает восхитительные впечатления как для людей, так и для их пушистых компаньонов.</br></br>
                В Pawffee мы понимаем особую связь между домашними животными и их владельцами и 
                стремимся обеспечить гостеприимную и комфортную обстановку для всех. В нашем зоомагазине, 
                где ваши пушистые друзья могут пообщаться и поиграть, вы найдете все необходимое для того, 
                чтобы ваши любимые питомцы были счастливы и здоровы. Так что приходите и присоединяйтесь к нам в Pawffee, 
                где домашние животные и люди могут приятно провести время вместе!
                </p>
            </li>
            <li class="dog-img"><img src="images/dog-about-as.png"></li>
        </ul>
    </section>
    <section class="photos-from-pawffee">
        <h1>Фотографии из нашего кафе</h1>
        <div class="photos-horizontal">
            <img src="images/photos-from-pawffee/photo1.jpg"> 
            <img src="images/photos-from-pawffee/photo2.jpg">
            <img src="images/photos-from-pawffee/photo3.jpg">
            <img src="images/photos-from-pawffee/photo4.jpg">
            <img src="images/photos-from-pawffee/photo5.jpg">
            <img src="images/photos-from-pawffee/photo6.jpg">
            <img src="images/photos-from-pawffee/photo7.jpg">
            <img src="images/photos-from-pawffee/photo8.jpg">
            <img src="images/photos-from-pawffee/photo9.jpg">
        </div>
    </section>
    <section class="our-value-propositions">
        <h1>Наши ценностные предложения</h1>
        <div class="photos-vertical">
            <div class="darkening-image-container">
                <img src="images/value-propositions-of-pawffee/photo1.jpg">
                <p class="darkening-image-text">Мы предлагаем широкий ассортимент 
                    товаров первой необходимости для домашних животных</p>
            </div>
            <div class="darkening-image-container">
                <img src="images/value-propositions-of-pawffee/photo2.png">
                <p class="darkening-image-text">Наш зоомагазин предлагает уникальное 
                    сочетание товаров для домашних животных и уютного кафе.
                </p>
            </div>
            <div class="darkening-image-container">
                <img src="images/value-propositions-of-pawffee/photo3.png">
                <p class="darkening-image-text">Насладитесь вкусной едой в нашем кафе, пока ваши питомцы 
                    отдыхают в специально отведенном для них уголке.</p>
            </div>
        </div>
    </section>
    <?php include 'footer.php'?>
    <div class="chat-toggle" id="chat-toggle" onclick="toggleChat()">Открыть</div>
    <div class="chat-container" id="chat-container" style="display: none;">
        <div class="chat-box" id="chat-box"></div>
        <input type="text" id="user-input" placeholder="Введите сообщение...">
        <button onclick="sendMessage()">Отправить</button>
    </div>
    <script src="js/HomeScripts.js"></script>
</body>
</html>
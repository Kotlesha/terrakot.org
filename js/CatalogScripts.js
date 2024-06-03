function selectDisplayMode(event) {
    let clickedIcon = event.target;
    let gridIcon = document.getElementById('gridIcon');
    let rowIcon = document.getElementById('rowIcon');
    let grid = document.querySelector('.product-cards');
    let rows = document.querySelector('.row-cards');
    let search = document.querySelector('.search');

    if (clickedIcon.id === 'gridIcon') {
        setIconState(gridIcon, 'active');
        setIconState(rowIcon, 'inactive');
        grid.style.display = 'grid';
        rows.style.display = 'none';
    } else {
        setIconState(rowIcon, 'active');
        setIconState(gridIcon, 'inactive');
        grid.style.display = 'none';
        rows.style.display = 'flex';
    }

    searchProducts(search);
}

function setIconState(icon, state) {
    let iconName = icon.id.replace('Icon', '');
    icon.setAttribute('src', `images/icons/${iconName}_icon_${state}.png`);
}

function isActiveIcon(icon){
    let iconName = icon.id.replace('Icon', '');
    return icon.getAttribute('src') === `images/icons/${iconName}_icon_active.png`;
}
/*
function showError(message) {
    document.getElementById('error-text').textContent = message;
    document.querySelector('.background-error-model').style.display = 'block';
    document.querySelector('.error-model').style.display = 'block';
}*/

function errorPricesInput(element) {
    let minValue = document.getElementById('min-number');
    let maxValue = document.getElementById('max-number');

    if (minValue.value === "" && maxValue.value === "") {
        element.innerText = 'В поля максимальное и минимальное значение внесена пустая строка!';
    }

    if (minValue.value === "") {
        element.innerText = 'В поле минимальное значение внесена пустая строка!';
    }  

    if (maxValue.value === "") {
        element.innerText = 'В поле максимальное значение внесена пустая строка!';
    } 

    if (parseFloat(minValue.value) > parseFloat(maxValue.value)) {
        element.innerText = 'Минимальное значение больше максимального!';
    }
}
/*
function acceptError()
{
    let backgroundErrorModel = document.querySelector('.background-error-model');
    let errorModel = document.querySelector('.error-model');
    backgroundErrorModel.style.display = 'none';
    errorModel.style.display = 'none';
}*/

function increaseValue(event){
    let inputNumber = event.target.parentNode.querySelector('.number-input');
    let maxValue = parseInt(inputNumber.getAttribute('max'));
    let priceElement = event.target.parentNode.parentNode.querySelector('.price-value');

    if (parseInt(inputNumber.value) < maxValue)
    {
        inputNumber.value = parseInt(inputNumber.value) + 1;
        let result = parseInt(priceElement.textContent) * parseInt(inputNumber.value);
        priceElement.textContent = result.toFixed(2) + ' Br';
    }
}

function decreaseValue(event){
    let inputNumber = event.target.parentNode.querySelector('.number-input');
    let minValue = parseInt(inputNumber.getAttribute('min'));
    let priceElement = event.target.parentNode.parentNode.querySelector('.price-value');

    if (parseInt(inputNumber.value) > minValue)
    {
        let result = parseInt(priceElement.textContent) / parseInt(inputNumber.value);
        inputNumber.value = parseInt(inputNumber.value) - 1;
        priceElement.textContent = result.toFixed(2) + ' Br';
    }
}

function getShoppingBagPath(state){
    return `images/icons/shopping-bag-${state}-icon.png`;
}

function setIcon(shoppingBagIcon, productNameText)
{
    if (shoppingBagIcon.getAttribute('src') === getShoppingBagPath('active'))
    {
        shoppingBagIcon.setAttribute('src', getShoppingBagPath('inactive'));
        return `Товар ${productNameText} был успешно добавлен в корзину!`;
    }

    shoppingBagIcon.setAttribute('src', getShoppingBagPath('active'));
    return `Товар ${productNameText} был успешно удалён из корзины!`;
}

function showNotification(event) {
    const notificationPanel = document.getElementById('notificationPanel');
    const displayMode = document.getElementById('gridIcon');
    const productCardSelectorName = isActiveIcon(displayMode) ? '.product-card' : '.row-card';
    const productCard = event.target.closest(productCardSelectorName);
    const shoppingBagIcon = productCard.querySelector('.shopping-bag-icon');
    const productName = productCard.querySelector('.product-name');
    const message = setIcon(shoppingBagIcon, productName.textContent);
    notificationPanel.textContent = message;
    notificationPanel.classList.add('notification-show');
    setTimeout(() => {
        notificationPanel.classList.remove('notification-show');
    }, 1000);
}

function showError()
{
    const notificationPanel = document.getElementById('show-error');
    notificationPanel.style.backgroundColor = 'red';
    errorPricesInput(notificationPanel);
    notificationPanel.classList.add('notification-show');
    setTimeout(() => {
        notificationPanel.classList.remove('notification-show');
    }, 1500);
}

function searchProducts(input) {
    const gridIcon = document.getElementById('gridIcon');
    const cardsNameSelector = isActiveIcon(gridIcon) ? '.product-card' : '.row-card';
    const query = input.value.trim().toLowerCase();
    const productCards = document.querySelectorAll(`${cardsNameSelector}`);
    const navigation = document.querySelector('.navigation-pages');
    navigation.style.display = 'flex';

    productCards.forEach(productCard => {
        productCard.style.display = 'flex';
    })

    var productsNotFound = document.querySelector('.products-not-found');
    productsNotFound.style.display = 'none';
    var productFound = false;

    for (var i = 0; i < productCards.length; i++) {
        var productName = productCards[i].querySelector('.product-name').textContent.toLowerCase();
        if (query === '' || productName.includes(query)) {
            productCards[i].style.display = '';
            productFound = true; 
        } else {
            productCards[i].style.display = 'none';
        }
    }

    if (!productFound) {
        productsNotFound.style.display = 'flex';
        
        productCards.forEach(productCard => {
            productCard.style.display = 'none';
        })

        navigation.style.display = 'none';
    }
}

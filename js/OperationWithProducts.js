const image_input = document.querySelector("#image_input");
var unpload_image = "";

image_input.addEventListener("change", function(){
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        unpload_image = reader.result;
        document.querySelector("#display_image").style.backgroundImage = `url(${unpload_image})`
    });
    reader.readAsDataURL(this.files[0]);
})

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
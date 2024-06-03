const chatBox = document.getElementById('chat-box');
const userInput = document.getElementById('user-input');
const chatContainer = document.getElementById('chat-container');
const chatToggle = document.getElementById('chat-toggle');

function toggleChat() {
    if (chatContainer.style.display === 'none') {
        chatContainer.style.display = 'block';
        chatToggle.textContent = 'Скрыть чат';
    } else {
        chatContainer.style.display = 'none';
        chatToggle.textContent = 'Открыть чат';
    }
}

function sendMessage() {
    const userMessage = userInput.value.trim();
    if (userMessage !== '') {
        appendMessage('Вы: ' + userMessage);
        respondToMessage(userMessage.toLowerCase());
        userInput.value = '';
    }
}

function appendMessage(message) {
    const messageElement = document.createElement('div');
    messageElement.textContent = message;
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight;
}

const keywords = [
    { word: 'привет', response: 'Привет! Как я могу помочь вам сегодня?' },
    { word: 'дела', response: 'У меня все отлично, спасибо! А у вас?' },
    { word: 'пока', response: 'До свидания! Если у вас возникнут еще вопросы, обращайтесь.' },
    { word: 'заказать', response: 'Вы можете заказать вкусную пищу и различные товары для животных'},
    { word: 'товары' , response: 'Наш онлайн-магазин предоставляет различные товары для животных и людей'},
];

function respondToMessage(message) {
    let foundKeyword = keywords.find(keyword => message.toLowerCase().includes(keyword.word));

    if (foundKeyword) {
        appendMessage('Чатбот: ' + foundKeyword.response);
    } else {
        appendMessage('Чатбот: Извините, я не понимаю. Можете задать другой вопрос?');
    }
}

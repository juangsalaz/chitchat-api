import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: process.env.MIX_PUSHER_APP_KEY,
  wsHost: window.location.hostname,
  wsPort: 6001,
  wssPort: 6001,
  forceTLS: false,
  encrypted: false,
  disableStats: true,
  enabledTransports: ['ws', 'wss'],
});

function listenToChatroom(chatroomId) {
  window.Echo.private(`chatroom.${chatroomId}`)
    .listen('.message.sent', (e) => {
      console.log('New message received:', e.message);
      // Handle the message, e.g., add to chat UI
      const messageList = document.getElementById('message-list');
      const newMessage = document.createElement('div');
      newMessage.classList.add('message-item');
      newMessage.innerText = `${e.message.user.name}: ${e.message.content}`;
      messageList.appendChild(newMessage);
    });
}

// Example usage:
const activeChatroomId = 1; // Replace this with dynamic chatroom ID based on user’s choice
listenToChatroom(activeChatroomId);

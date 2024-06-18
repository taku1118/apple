$(document).ready(function() {
    var currentChatRoomId = null;
    var currentUser = '0000001'; // 現在のユーザー。セッションなどで管理することを推奨

    function fetchChatRooms() {
        $.ajax({
            url: '../PHP/fetch_chat_rooms.php',
            method: 'GET',
            success: function(data) {
                $('#chat-room-list').empty();
                data.forEach(function(chatRoom) {
                    $('#chat-room-list').append('<li class="list-group-item list-group-item-action chat-room" data-id="' + chatRoom.chat_room_id + '" style="border-radius: 0;height:4rem;">' + chatRoom.chat_room_title + '</li>');
                });

                $('.chat-room').click(function() {
                    currentChatRoomId = $(this).data('id');
                    fetchMessages();
                });
            }
        });
    }

    function fetchMessages() {
        if (currentChatRoomId !== null) {
            $.ajax({
                url: '../PHP/fetch_messages.php',
                method: 'GET',
                data: { chat_room_id: currentChatRoomId },
                success: function(data) {
                    $('#messages').empty();
                    data.forEach(function(message) {
                        var messageClass = (message.send_by === currentUser) ? 'message-sent' : 'message-received';
                        $('#messages').append('<div class="message ' + messageClass + '"><strong>' + message.send_by + ':</strong> ' + message.message + '</div>');
                    });
                }
            });
        }
    }

    $('#message-form').submit(function(event) {
        event.preventDefault();
        var message = $('#message').val();
        if (message.trim() !== '' && currentChatRoomId !== null) {
            $.ajax({
                url: '../PHP/chat.php',
                method: 'POST',
                data: { message: message, chat_room_id: currentChatRoomId },
                success: function() {
                    $('#message').val('');
                    fetchMessages();
                }
            });
        }
    });

    fetchChatRooms();
    setInterval(fetchMessages, 5000);  // 5秒ごとにメッセージを更新
});
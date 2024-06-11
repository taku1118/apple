$(document).ready(function() {
    var currentChatRoomId = null;

    function fetchChatRooms() {
        $.ajax({
            url: 'fetch_chat_rooms.php',
            method: 'GET',
            success: function(data) {
                $('#chat-room-list').empty();
                data.forEach(function(chatRoom) {
                    $('#chat-room-list').append('<li class="list-group-item chat-room" data-id="' + chatRoom.chat_room_id + '">' + chatRoom.chat_room_title + '</li>');
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
                url: 'fetch_messages.php',
                method: 'GET',
                data: { chat_room_id: currentChatRoomId },
                success: function(data) {
                    $('#messages').empty();
                    data.forEach(function(message) {
                        $('#messages').append('<div class="message"><strong>' + message.send_by + ':</strong> ' + message.message + '</div>');
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
                url: 'chat.php',
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
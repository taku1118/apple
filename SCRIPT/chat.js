$(document).ready(function() {
    var currentChatRoomId = null;
    var autoScroll = true;  // 自動スクロールフラグ

    // メッセージを最下部にスクロールする関数
    function scrollToBottom() {
        var messagesContainer = $('#messages');
        messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
    }

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

    function fetchMessages(autoScrollEnabled = true) {
        if (currentChatRoomId !== null) {
            $.ajax({
                url: '../PHP/fetch_messages.php',
                method: 'GET',
                data: { chat_room_id: currentChatRoomId },
                success: function(data) {
                    $('#messages').empty();
                    data.forEach(function(message) {
                        var messageClass = (message.send_by === currentUser) ? 'message-sent' : 'message-received';
                        var profileImage = message.profile_img ? '../IMAGE/PROFILE/' + message.profile_img : '../IMAGE/no_image.jpg'; // デフォルト画像を指定
                        $('#messages').append('<div class="d-flex ' + (message.send_by === currentUser ? 'justify-content-end' : '') + '"><img src="' + profileImage + '" alt="" width="32" height="32" class="rounded-circle me-2 ' + (message.send_by === currentUser ? 'd-none' : '') + '"><div class="message ' + messageClass + '">' + message.message + '</div></div>');
                    });
                    if (autoScrollEnabled) {
                        scrollToBottom();  // メッセージをフェッチした後にスクロール
                    }
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
                    scrollToBottom();  // メッセージ送信後にスクロール
                }
            });
        }
    });

    // メッセージコンテナのスクロールイベントを監視
    $('#messages').on('scroll', function() {
        var messagesContainer = $(this);
        // スクロール位置が最下部かどうかを確認
        autoScroll = (messagesContainer.scrollTop() + messagesContainer.innerHeight() >= messagesContainer[0].scrollHeight);
    });

    fetchChatRooms();
    setInterval(function() {
        fetchMessages(autoScroll);  // 5秒ごとにメッセージを更新（自動スクロールが有効な場合）
    }, 5000);
});

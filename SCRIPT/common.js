// テーブル行遷移 
$(function(){
    $('tr[data-href]').on('click', function(){
        location.href = $(this).data('href');
    });
});

function logout(){
    var result = window.confirm('ログアウトしますか？');
    if( result ) {
        alert("ログアウトしました");
        location.href = "login.php";
    }
    else {
    }
  }
$(function(){
    $("#change_confirm").click(function(){
        if ($("#formGroupExampleInput").val() != $("#formGroupExampleInput2").val()) {
            alert("パスワードが一致しません。もう一度入力してください。");
        }else{
            let password = $("#formGroupExampleInput2").val();
            alert(password);
            $.ajax({
            type: 'POST',
            url: 'change-password.php',
            data: {pass: password}
            }).done(function(data){
                let result = JSON.parse(data);
                alert(result.request[0]);
                location.href="my_page_screen.php";
            }).fail(function(){
                alert("fail");
            });
            
        }
    });
})
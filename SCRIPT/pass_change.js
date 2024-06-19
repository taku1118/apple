// eyeIconのclickクリックイベント
$("#eyeIcon").on("click", () => {
    // eyeIconのclass切り替え
    $("#eyeIcon").toggleClass("bi-eye-slash bi-eye");

    // inputのtype切り替え
    if($("#formGroupExampleInput").attr("type") == "password"){
        $("#formGroupExampleInput").attr("type", "text");
    }else {
      $("#formGroupExampleInput").attr("type", "password");
    }
});
$("#eyeIcon2").on("click", () => {
    // eyeIconのclass切り替え
    $("#eyeIcon2").toggleClass("bi-eye-slash bi-eye");

    // inputのtype切り替え
    if ($("#formGroupExampleInput2").attr("type") == "password") {
        $("#formGroupExampleInput2").attr("type", "text");
    } else {
        $("#formGroupExampleInput2").attr("type", "password");
    }
});
$(function(){
    $("#change_confirm").click(function(){
        if($("#formGroupExampleInput").val() == '' || $("#formGroupExampleInput2").val() == ''){
            alert("値が入っていません。");
        }else{ 
            if ($("#formGroupExampleInput").val() != $("#formGroupExampleInput2").val()) {
                alert("パスワードが一致しません。もう一度入力してください。");
            }else{
                let password = $("#formGroupExampleInput2").val();
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
        }
    });
})
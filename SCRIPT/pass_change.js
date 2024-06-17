function pushHideButton() {
    var txtPass = document.getElementById("formGroupExampleInput");
    var btnEye = document.getElementById("buttonEye");
    var btnEye2 = document.getElementById("buttonEye2");
    if (txtPass.type === "text") {
      txtPass.type = "password";
      btnEye.className = "fa fa-eye";
      btnEye2.className = "fa fa-eye";
    } else {
      txtPass.type = "text";
      btnEye.className = "fa fa-eye-slash";
      btnEye2.className = "fa fa-eye-slash";
    }
}
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
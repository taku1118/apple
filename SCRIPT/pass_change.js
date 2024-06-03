$(function(){
    $("#change_confirm").click(function(){
        let password = $("#formGroupExampleInput2").val();
        $.ajax({
            type: 'POST',
            url: 'change-password.php',
            data: {pass: password}
        }).done(function(data){
            let result = JSON.parse(data);
            alert(result.request[0]);
        }).fail(function(){
            alert("fail");
        })
    });
})
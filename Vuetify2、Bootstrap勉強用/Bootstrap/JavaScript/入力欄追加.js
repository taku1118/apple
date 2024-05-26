$(function(){
    $("#add_input").click(function(){
        const input = $("#input_area").clone(true);
        input.find("button").prop("class","remove_input btn btn-outline-dark");
        $("#card_area").append(input);
    });
    $(document).click(function(e){
        if($(e.target).prop("id")=="remove_input"){
            $(e.target).parents("#input_area").remove();
        }
    });
});

$(function(){
    $(document).click(function(e){
        const input = $(e.target).parents("#select_ways").clone(true);
        $(e.target).parents("#select_ways").find("#toggle_icon").prop("class","");
        $("#sheet_content").append(input);
    });
    // $(document).click(function(e){
    //     if($(e.target).prop("id")=="remove_input"){
    //         $(e.target).parents("#input_area").remove();
    //     }
    // });
});

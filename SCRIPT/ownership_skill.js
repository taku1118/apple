$(function(){
    $("#add_input").click(function(){
        const input = `
        <div class="row g-0 my-1 input_area">
            <div class="col-11 px-3">
                <input type="text" name="skills[]" class="form-control" required>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <button type="button" class="remove_input btn btn-outline-dark">✕</button>
            </div>
        </div>`;
        $("#card_area").append(input);
    });
    $(document).on('click', '.remove_input', function(){
        $(this).closest(".input_area").remove();
    });
});
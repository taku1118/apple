function edit_sheet(target){
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    edit_div.className = "card-body";
    target.className = "btn btn-primary d-none";
    let save_btn = document.getElementById("save_btn"+target.id.substring(8));
    save_btn.className = "btn btn-primary";
}

function open_sheet(target){
    let modal_num =  document.querySelector("#modal_num"+target.id.substring(12)+" #modal_dialog #modal_content #card #edit_area"+target.id.substring(12));
    modal_num.className = "card-body pe-none";
}

function save_sheet(target){
    const formData = new FormData();
    const ways = document.querySelectorAll("input[id^=step_"+target.id.substring(8)+"]");
    let values = Array.from(ways).map((way) => way.value);
    values.forEach((element)=>{
        formData.append("ways[]",element);
    });
    console.log(values);
    
    formData.append("adopt_id",target.id.substring(8));
    fetch("update_select_state.php",{
        method: "POST",
        body: formData
    }).then(response => response.json())
    .then(data => {
        console.log("Success:", data["data"]);
    }).catch(error => {
        console.log("Error:", error);
    });
    target.className = "btn btn-primary d-none";
    let edit_btn = document.getElementById("edit_btn"+target.id.substring(8));
    edit_btn.className = "btn btn-primary";
    
}
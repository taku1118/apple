let insert_count = 0;

// シートの編集ボタンを押したときの動作
function edit_sheet(target){
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    let icon_btn = document.getElementById("add_input"+target.id.substring(8));
    edit_div.className = "card-body";
    target.className = "btn btn-primary d-none";
    let save_btn = document.getElementById("save_btn"+target.id.substring(8));
    save_btn.className = "btn btn-primary";
    icon_btn.className = "btn";
}

// シートをクリックして開いた時の動作
function open_sheet(target){
    let modal_num = document.querySelector("#modal_num"+target.id.substring(12)+" #modal_dialog #modal_content #card #edit_area"+target.id.substring(12));
    modal_num.className = "card-body pe-none";
}

// シートの保存ボタンを押したときの動作
function save_sheet(target){
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    const formData = new FormData();
    const ways = document.querySelectorAll("input[id^=step_"+target.id.substring(8)+"]");
    let update_values = Array.from(ways).map((way) => way.value);
    update_values.forEach((element)=>{
        formData.append("ways[]",element);
    });
    
    // トップの選考IDをDB側に伝えるためにFormDataに追加
    formData.append("adopt_id",target.id.substring(8));
    formData.append("inserts",insert_count);
    // DB通信開始
    fetch("save_state.php",{
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
    let icon_btn = document.getElementById("add_input"+target.id.substring(8));
    edit_btn.className = "btn btn-primary";
    edit_div.className = "card-body pe-none";
    icon_btn.className = "btn d-none";
    // 保存し終えたのインサート回数のリセット
    insert_count = 0;
}

// インサートの仕様
// その1
// まずインサートを実行する、その後アップデートが走る
// このとき値はnullではなく、ちゃんと保存ボタンを押したときのinputの値を取得してインサートする（たとえNULLであっても）
// この方法だとその後のアップデートではまったく同じ値を再度アップデートするためあまりよいといえないのでは？

// その2
// インサートで値がnullの状態で追加
// その後のアップデートでnull値を実際のinputの値に変更


// どちらにせよ追加した要素の個数把握が必須となる
// また、必要な情報として「その1」の方はadopt_way、adopt_dateが必要となるが、「その2」は2つのデータ（adopt_way、adopt_date）がいらない（Updateでまとめて一気に更新するから）


// シートのinput追加ボタンを押したとき
function add_input(target){
    let input_num = target.id.substring(9);
    let card_body = document.getElementById("edit_area"+input_num+"");
    let input_part = document.querySelectorAll("input[id^=step_"+input_num+"]");
    let count_input = input_part.length+1;
    // インサートされたことをDBに伝えるための準備
    insert_count++;
    const input_html = `<div class="text-center">
                            <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                        </div>
                        <div class="card-text" id="input_${count_input}">
                            <input type="text" class="form-control form-control-lg" id="step_${input_num}_${count_input}" value="">
                        </div>`;
    card_body.insertAdjacentHTML("beforeend",input_html);
}
// インサートした回数
let insert_count = 0;
// インサートしたinputの番号
let insert_num = [];
// 削除するinputのIDを入れる配列
let delete_input_num = [];
// シートの編集ボタンを押したときの動作
function edit_sheet(target){
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    let add_btn = document.getElementById("add_input"+target.id.substring(8));
    let note_id = document.getElementById("note_"+target.id.substring(8));
    edit_div.className = "card-body";
    target.className = "btn btn-primary d-none";
    let save_btn = document.getElementById("save_btn"+target.id.substring(8));
    save_btn.className = "btn btn-primary";
    add_btn.className = "btn";
    note_id.className = "mb-3";
}

// シートをクリックして開いた時の動作
function open_sheet(target){
    let modal_num = document.querySelector("#modal_num"+target.id.substring(12)+" #modal_dialog #modal_content #card #edit_area"+target.id.substring(12));
    modal_num.className = "card-body pe-none";
    let note_id = document.getElementById("note_"+target.id.substring(12));
    note_id.className = "mb-3 pe-none";
    let add_btn = document.getElementById("add_input"+target.id.substring(12));
    add_btn.className = "btn d-none";
    let edit_btn = document.querySelector("button[id^=edit_btn"+target.id.substring(12)+"]");
    edit_btn.className = "btn btn-primary";
    let save_btn = document.querySelector("button[id^=save_btn"+target.id.substring(12)+"]");
    save_btn.className = "btn btn-primary d-none";
}

// シートの保存ボタンを押したときの動き
function save_sheet(target){
    
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    const formData = new FormData();
    // 複数のinput要素を取得
    const ways = document.querySelectorAll("input[id^=step_"+target.id.substring(8)+"]");
    // inputのValueを配列に格納
    let update_values = Array.from(ways).map((way) => way.value);
    // inputのIDを配列に格納
    let update_ids = Array.from(ways).map((way) => way.id);
    // adopt_wayをセット
    update_values.forEach((element)=>{
        formData.append("ways[]",element);
    });
    // adopt_step_idをセット
    update_ids.forEach((element)=>{
        formData.append("adopt_step_ids[]",element.substring(7));
    });
    
    for(var delete_target of delete_input_num){
        // deleteしたいinputのidをセット
        formData.append("delete_input[]", delete_target);
    }
    for(var insert_target of insert_num){
        // insertしたいinputのidをセット
        formData.append("insert_input[]", insert_target);
    }
    // adopt_idをセット
    formData.append("adopt_id",target.id.substring(8));
    
    // INSERTする回数をinsertsにセット
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
    let add_btn = document.getElementById("add_input"+target.id.substring(8));
    edit_btn.className = "btn btn-primary";
    edit_div.className = "card-body pe-none";
    add_btn.className = "btn d-none";
    // 保存し終えたのインサート回数のリセット
    insert_count = 0;
    delete_input_num = [];
    insert_num = [];
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
    // シートの番号
    let adopt_id = target.id.substring(9);
    let card_body = document.getElementById("edit_area"+adopt_id+"");
    let input_part = document.querySelectorAll("input[id^=step_"+adopt_id+"]");
    // inputのIDに割り当てる連番、どのみちここが正しく振れていないことが課題である
    let count_input = (input_part.length+1)+(delete_input_num.length);
    insert_count++;
    // 新しいinputフィールドを作成
    const adopt_area_div = document.createElement("div");
        adopt_area_div.id = "adopt_area"+count_input;
    const icon_div = document.createElement("div");
        icon_div.className = "text-center";
    const icon_tag = document.createElement("i");
        icon_tag.className = "bi bi-caret-down-fill";
        icon_tag.style.fontSize = "3rem";
    icon_div.appendChild(icon_tag);
    const input_button_div = document.createElement("div");
    input_button_div.className = "card-text position-relative";
    input_button_div.id = "input_"+count_input;
    const create_input = document.createElement("input");
        create_input.type = "text";
        create_input.className = "form-control form-control-lg";
        create_input.id = "step_"+adopt_id+"_"+count_input;
        create_input.value = "";
    const remove_btn = document.createElement("button");
        remove_btn.id = "delete_step_id"+count_input;
        remove_btn.className = "btn btn-danger position-absolute top-0 start-100 translate-middle btn-sm rounded-5";
        remove_btn.textContent = "✕";
    input_button_div.appendChild(create_input);
    // remove_btnにイベント(クリックした時)を付与
    // こっちは追加した分のinputを削除するときの処理
    remove_btn.addEventListener('click',()=>{
        delete_input_num.push(count_input);
        adopt_area_div.remove();
        const index = insert_num.indexOf(count_input);
        insert_num.splice(index,1);
        console.log(insert_num);
    })
    input_button_div.appendChild(remove_btn);
    adopt_area_div.appendChild(icon_div);
    adopt_area_div.appendChild(input_button_div);
    card_body.appendChild(adopt_area_div);
    insert_num.push(count_input);
    
}

// 削除したらいちいち連番を振り直す処理を行わなければいけないがそっちの方が確実なためそっちを採用する

// 既存の（データベースから取得してきた）分の削除処理
function delete_input(target){
    let target_id = target.id.substring(14);
    let adopt_area = document.getElementById("adopt_area"+target_id);
    delete_input_num.push(target_id);
    adopt_area.remove();
}
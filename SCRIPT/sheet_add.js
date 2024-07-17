// 仕様について
// 1.テンプレートのバックアップを取っておく
// 2.テンプレートを編集する
// 3.編集したテンプレートをappendする（この時点でDOMに反映）
// 4.編集したテンプレートを初期化するためにバックアップを使う

// let create_sheet = false;
let sheet_num = "";
// バックアップ用のモーダル
let back_up_modal = $(".template_modal").clone(true);;
$(function () {
    $("#newsheet").click(function () {
        new_open_sheet();
        
        let remodal = document.getElementById("sheet_number adopt_id");
        var modal = new bootstrap.Modal(remodal);
    });
});

// モーダルを閉じたときの処理
$(function(){
    $('#modal_num').on('hidden.bs.modal', function (e) {
        // ここに閉じた後の処理を記述
            // 現時点の編集した状態のモーダルを取得
            let template_modal = $(".template_modal");
            // バックアップ用の初期モーダルで編集したモーダルを初期化（上書き）
            template_modal.replaceWith(back_up_modal);

            // テンプレートの初期化に合わせてinput要素の状態も初期化
            All_Inputs_Array = [];
    });
})

// シートを新規作成（コピー）及びその他の設定
function sheetSetting(sheet_num) {
    const newsheet = $(".template_sheet").clone(true).find(".col").prop("class", "col");
    // open_sheet関数の振り直し（なぜか「attr」でしかonclickイベントに触れない）
    newsheet.find(".card").attr("onclick", "open_sheet(this)");
    newsheet.find(".card").prop("id", "sheet_number" + sheet_num);
    newsheet.find(".card").attr('data-bs-target', '#modal_num' + sheet_num);
    newsheet.find(".card-body").prop("id", "card_area" + sheet_num);

    $("#sheet_display_area").append(newsheet);
}


// モーダルを新規作成（コピー）及びその他の設定
function modalSetting(sheet_num){
    const newmodal = $(".template_modal").clone(true).find("#modal_num").prop("id","modal_num"+sheet_num);

    newmodal.find(".card-body").prop("id","edit_area"+sheet_num);
    newmodal.find("#adopt_area_1").prop("id","adopt_area"+sheet_num+"_1");
    newmodal.find(".card-text").prop("id","input_1");
    newmodal.find("#date_adopt_id_adopt_step_id").prop("id","date_"+sheet_num+"_1");
    newmodal.find("#step_adopt_id_adopt_step_id").prop("id","step_"+sheet_num+"_1");
    newmodal.find("#delete_adopt_id_1").prop("id","delete_"+sheet_num+"_1");
    // onclickの書き換えを先に行う、IDの変更がされる前に
    newmodal.find("#add_input_adopt_id").attr("onclick","add_input(this)");
    newmodal.find("#add_input_adopt_id").prop("id","add_input"+sheet_num);
    newmodal.find("#note_adopt_id").prop("id","note_"+sheet_num);
    // ここも同じく
    newmodal.find("#edit_btn_adopt_id").attr("onclick","edit_sheet(this)");
    newmodal.find("#edit_btn_adopt_id").prop("id","edit_btn"+sheet_num);
    // ここも同じく
    newmodal.find("#save_btn_adopt_id").attr("onclick","save_sheet(this)");
    newmodal.find("#save_btn_adopt_id").prop("id","save_btn"+sheet_num);

    // 状態をリセット
    newmodal.removeClass('show').css('display', 'none');
    // モーダルを閉じたときの処理を振り直す
    newmodal.find('#modal_num' + sheet_num).on('hidden.bs.modal', function() {
        $('#modal_num' + sheet_num).modal('hide');
    });
    $(".mt-4").append(newmodal);
}


function new_open_sheet() {
    // テンプレートのモーダルを編集
        // モーダル内の編集ができないようにする
        let modal_num = document.querySelector("#modal_num #modal_dialog #modal_content #card #edit_area");
        modal_num.className = "card-body pe-none";
        // メモ欄を編集できないようにする
        let note_id = document.getElementById("note_adopt_id");
        note_id.className = "mb-3 pe-none";
        // 追加ボタンを非表示にする
        let add_btn = document.getElementById("add_input_adopt_id");
        add_btn.className = "btn d-none";
        // 編集ボタンを表示する
        let edit_btn = document.querySelector("button[id=edit_btn_adopt_id]");
        edit_btn.className = "btn btn-primary";
        // 保存ボタンを非表示にする
        let save_btn = document.querySelector("button[id^=save_btn_adopt_id]");
        save_btn.className = "btn btn-primary d-none";
        // すべてのinputのIDを取得
        // All_Inputs = document.querySelectorAll("input[id^=step_"+sheet_num+"]");

        // そのinputのIDから数字部分だけを切り取って配列に格納
        All_Inputs_Array.push(1);
}

// シートの編集ボタンを押したときの動作
function new_edit_sheet(target) {
    // 編集ボタンを非表示
    target.className = "btn btn-primary d-none";
    // モーダル内の編集ができるようにする
    let edit_div = document.getElementById("edit_area");
    edit_div.className = "card-body";
    // 追加ボタンを表示
    let add_btn = document.getElementById("add_input_adopt_id");
    add_btn.className = "btn";
    // メモ欄を編集できるようにする
    let note_id = document.getElementById("note_adopt_id");
    note_id.className = "mb-3";
    // 保存ボタンを表示する
    let save_btn = document.getElementById("save_btn_adopt_id");
    save_btn.className = "btn btn-primary";
}


// 新しいInput要素を追加する
function new_add_input() {
    // シートの枚数を事前にカウント
    let sheet_num = document.querySelectorAll("div[id^=modal_num]").length;

    // モーダルの部分のcard_body
    let card_body = document.getElementById("edit_area");
    // 新しくinput要素を作成する
    let create_adopt_area_div = createElement(sheet_num);
    // 作成したinput要素をDOMに反映する
    card_body.appendChild(create_adopt_area_div);
}

function new_save_sheet(target) {
    // シートの枚数を事前にカウント
    let sheet_num = document.querySelectorAll("div[id^=modal_num]").length;
    delete_input_num = [];
    insert_num = [];
}


// この処理はシートを新規作成した時に初めて保存ボタンを押したときにしか実行されない
// 具体的な処理はシートとモーダルの新規作成分をDOMに反映する処理（appendする処理）
// この処理は追加処理を行うのは1回だけでその後の保存処理は変更処理になるから
$("#save_btn_adopt_id").one("click",function(){
    // シートの枚数を事前にカウント
    let All_Sheet = document.querySelectorAll("div[id^=modal_num]");
    All_Sheets_Array = Array.from(All_Sheet).map((sheet) => sheet.id.substring(9));
    sheet_num = Math.max(...All_Sheets_Array)+1;
    sheetSetting(sheet_num);
    modalSetting(sheet_num);
    alert("one only")
});

function new_delete_input(target){
    let target_id = target.id.substring(16);
    let adopt_area = document.getElementById("adopt_area"+target_id);
    delete_input_num.push(All_Sheets_Array.findIndex((value)=>{return Number(value) == target_id.substring(16)})+1);
    console.log(delete_input_num);
}
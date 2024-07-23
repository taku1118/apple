// 仕様について
// 1.テンプレートのバックアップを取っておく
// 2.テンプレートを編集する
// 3.編集したテンプレートをappendする（この時点でDOMに反映）
// 4.編集したテンプレートを初期化するためにバックアップを使う

// let create_sheet = false;
let sheet_num = "";
// 新規モーダルを初めて保存したかどうかを判別する
let isFirstSave = true;
// バックアップ用のモーダルを格納する変数
let back_up_modal = "";

createSheetflg = "";
$(function () {
    $("#newsheet").click(function () {
        new_open_sheet();
        let remodal = document.getElementById("sheet_number adopt_id");
        var modal = new bootstrap.Modal(remodal);
    });
});


// モーダルを閉じたときの処理
$(function () {
    $(document).on('hidden.bs.modal',"[id=insert_modal]", function (e) {
        // 現時点の編集した状態のモーダルを取得
        let template_modal = $(".template_modal");
        // バックアップ用の初期モーダルで編集したモーダルを初期化（上書き）
        template_modal.replaceWith(back_up_modal);
        // モーダルの初回保存判別変数を初期化
        isFirstSave = true;
        // テンプレートの初期化に合わせてinput要素の状態も初期化
        All_Inputs_Array = [];
        let DeleteEventGrant = document.querySelectorAll("button[id^=delete_"+sheet_num+"]");
        DeleteEventGrant.forEach((element)=>{
            console.log(DeleteEventGrant.length);
            element.setAttribute("onclick","delete_input(this)");
        })
    });
})

// シートを新規作成（コピー）及びその他の設定
function sheetSetting(sheet_num) {

    const newsheet = $(".template_sheet").clone(true, true).find(".col").prop("class", "col");
    // open_sheet関数の振り直し（なぜか「attr」でしかonclickイベントに触れない）
    newsheet.find(".card").attr("onclick", "open_sheet(this)");
    newsheet.find(".card").prop("id", "sheet_number" + sheet_num);
    newsheet.find(".card").attr('data-bs-target', '#modal_num' + sheet_num);
    newsheet.find(".card-body").prop("id", "card_area" + sheet_num);
    // newsheet.find(".onload_area1").prop("class", "onload_area" + sheet_num);
    return newsheet;
}


// モーダルを新規作成（コピー）及びその他の設定
function modalSetting(sheet_num) {

    const newmodal = $(".template_modal").clone(true,true).find("#insert_modal").prop("id", "modal_num" + sheet_num);

    newmodal.find(".card-body").prop("id", "edit_area" + sheet_num);
    newmodal.find(".onload_area1").prop("class", "onload_area" + sheet_num);
    newmodal.find("#adopt_area_1").prop("id", "adopt_area" + sheet_num + "_1");
    newmodal.find(".card-text").prop("id", "input_1");
    newmodal.find("#date_adopt_id_adopt_step_id").prop("id", "date_" + sheet_num + "_1");
    newmodal.find("#step_adopt_id_adopt_step_id").prop("id", "step_" + sheet_num + "_1");
    newmodal.find("#delete_adopt_id_1").prop("id", "delete_" + sheet_num + "_1");
    // onclickの書き換えを先に行う、IDの変更がされる前に
    newmodal.find("#add_input_adopt_id").attr("onclick", "add_input(this)");
    newmodal.find("#add_input_adopt_id").prop("id", "add_input" + sheet_num);
    newmodal.find("#note_adopt_id").prop("id", "note_" + sheet_num);
    // ここも同じく
    newmodal.find("#edit_btn_adopt_id").attr("onclick", "edit_sheet(this)");
    newmodal.find("#edit_btn_adopt_id").prop("id", "edit_btn" + sheet_num);
    // ここも同じく
    newmodal.find("#save_btn_adopt_id").attr("onclick", "save_sheet(this)");
    newmodal.find("#save_btn_adopt_id").prop("id", "save_btn" + sheet_num);

    // 状態をリセット
    newmodal.removeClass('show').css('display', 'none');
    // モーダルを閉じたときの処理を振り直す
    newmodal.find('#modal_num' + sheet_num).on('hidden.bs.modal', function () {
        $('#modal_num' + sheet_num).modal('hide');
    });
    return newmodal;
}


function new_open_sheet() {
    // モーダルを開いたタイミングでバックアップを取る
    back_up_modal = $(".template_modal").clone(true);
    // モーダル内の編集ができないようにする
    let modal_num = document.querySelector("#insert_modal #modal_dialog #modal_content #card #edit_area");
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
    // そのinputのIDから数字部分だけを切り取って配列に格納
    All_Inputs_Array.push(1);
    // シートの枚数を事前にカウント
    let All_Sheet = document.querySelectorAll("div[id^=modal_num]");
    All_Sheets_Array = Array.from(All_Sheet).map((sheet) => sheet.id.substring(9));
    sheet_num = Math.max(...All_Sheets_Array) + 1;

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
    // モーダルの部分のcard_body
    let card_body = document.getElementById("edit_area");
    // 新しくinput要素を作成する
    let create_adopt_area_div = createElement(sheet_num);
    // 作成したinput要素をDOMに反映する
    card_body.appendChild(create_adopt_area_div);
    // console.log("insertするやつ:"+insert_num);
}

// 保存は「if」を使い、「シートの新規追加」と「更新」で分けている
function new_save_sheet(target) {
    // シートの新規作成だった場合はsheet_numに1プラスしたものが入る
    // それ以外はsheet_numをそのまま格納
    let NewSheetNumFlg = sheet_num; 
    if (isFirstSave) {
        // この処理はシートを新規作成した時に初めて保存ボタンを押したときにしか実行されない
        // 具体的な処理はシートとモーダルの新規作成分をDOMに反映する処理（appendする処理）
        // この処理は追加処理を行うのは1回だけでその後の保存処理は変更処理になる
        // 新規シートをHTMLに追加
        let newsheet = sheetSetting(sheet_num);
        $("#sheet_display_area").append(newsheet);
        // 新規モーダルをHTMLに追加
        let newmodal = modalSetting(sheet_num);
        $(".mt-4").append(newmodal);
        isFirstSave = false;
        createSheetflg = true;
        alert("one only");
    } else {
        // 最新の更新中モーダル
        let current_modal = modalSetting(sheet_num);
        // 更新対象のモーダル
        // すでにHTMLに追加したシートのため「sheet_num」に1を足す必要なし
        let update_area = $("#modal_num" + sheet_num);
        // HTMLに追加した更新する
        update_area.replaceWith(current_modal);
        createSheetflg = false;
        alert("sequence");
    }
    console.log("シートの番号:"+sheet_num);
    All_Inputs = document.querySelectorAll("#edit_area"+sheet_num+" input[id^=step_" + NewSheetNumFlg + "]");
    All_Inputs_Array = Array.from(All_Inputs).map((Input) => Number(Input.id.substring(7)));
    let note_num = document.getElementById("note_adopt_id");
    // PHPに送るデータをセット
    const formData = setFormData(NewSheetNumFlg, note_num);
    // シートを新規作成する場合のPHPに送るデータをセット
    if(createSheetflg){
        let card_title = document.getElementById("template_title");
        // シートの新規作成の有無のデータをセット
        formData.append("CreateSheet",createSheetflg);
        // adopt_stateテーブルのInsertに必要なデータ
        formData.append("company_name",card_title.innerHTML);
        formData.append("NewNote",note_num.lastElementChild.value);
        let InputWay = document.getElementById("step_adopt_id_adopt_step_id");
        let InputDate = document.getElementById("date_adopt_id_adopt_step_id");
        // adopt_state_detailテーブルのInsertに必要なデータ
        formData.append("AdoptWay",InputWay.value);
        formData.append("AdoptDate",InputDate.value);
    }
    // DBに接続する
    DBConnect(formData);

    // console.log("全てのinputの情報:"+All_Inputs_Array);
    // すべてのinputのIDを取得
    // All_Inputs = document.querySelectorAll("input[id^=step_" + NewSheetNumFlg + "]");
    // console.log(All_Inputs);
    // All_Inputs_Array = Array.from(All_Inputs).map((Input) => Number(Input.id.substring(7)));
    console.log("削除後の全てのinputの情報:"+All_Inputs_Array);

    delete_input_num = [];
    insert_num = [];
}

// このdelete関数はテンプレートの1番目のinputしか消さない（あまり良くないと思われるがこれしか思いつかなかった）
function new_delete_input(target) {
    if(JudegeDelete(sheet_num)){
        delete_input_num.push(1);
        let delete_adopt_id_1 = document.getElementById("delete_adopt_id_1");
        delete_adopt_id_1.remove();
    }
}
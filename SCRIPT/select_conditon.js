// インサートした回数
let insert_count = 0;
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

// シートの保存ボタンを押したときの動作
function save_sheet(target){
    let edit_div = document.getElementById("edit_area"+target.id.substring(8));
    const formData = new FormData();
    const ways = document.querySelectorAll("input[id^=step_"+target.id.substring(8)+"]");
    let update_values = Array.from(ways).map((way) => way.value);
    let update_ids = Array.from(ways).map((way) => way.id);
    update_values.forEach((element)=>{
        formData.append("ways[]",element);
    });

    update_ids.forEach((element)=>{
        formData.append("ids[]",element.substring(7));
    });
    
    // トップの選考IDをDB側に伝えるためにFormDataに追加
    formData.append("adopt_id",target.id.substring(8));
    formData.append("inserts",insert_count);
    // DB通信開始
    // fetch("save_state.php",{
    //     method: "POST",
    //     body: formData
    // }).then(response => response.json())
    // .then(data => {
    //     console.log("Success:", data["data"]);
    // }).catch(error => {
    //     console.log("Error:", error);
    // });
    target.className = "btn btn-primary d-none";
    let edit_btn = document.getElementById("edit_btn"+target.id.substring(8));
    let add_btn = document.getElementById("add_input"+target.id.substring(8));
    edit_btn.className = "btn btn-primary";
    edit_div.className = "card-body pe-none";
    add_btn.className = "btn d-none";
    // console.log(insert_count,update_values.length);
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
    insert_count++;
    const input_html = `<div id="adopt_area">
                            <div class="text-center">
                                <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                            </div>
                            <div class="card-text position-relative" id="input_${count_input}">
                                <input type="text" class="form-control form-control-lg" id="step_${input_num}_${count_input}" value="">
                                <button class="btn btn-danger position-absolute top-0 start-100 translate-middle btn-sm rounded-5">✕</button>
                            </div>
                        </div>`;
    card_body.insertAdjacentHTML("beforeend",input_html);
}


// 削除の仕様
// 今まで作成したUPDATEやINSERTだと実装できない可能性がある
// その理由として連番が問題になっている
// 変数「insert_count」にインサートした回数、「count_input」にシート内のinputの総数を管理している
// count_inputはinputに連番を振るためにある
// しかしcount_inputは追加ボタンを押したときのinputの総数からとってきている
// もしもともと連番を振っていたinputが4つ「1，2，3、4」と並んでいた場合...
// 2番目を削除する
// すると連番は「1，3，4」となる
// こうなるとcount_inputの値は3であるが次に振られるべき番号は5となる
// ここで矛盾が発生する

// これを解決するには...
// とその前に
// このcount_inputがどんな役割をしているのか考えてみよう
// count_inputはinputに連番を振るため
// なぜ連番を振る必要があるの？
// そもそもID属性には一意の連番を振ることが必要であるという記事を見たことがあるから振っているだけでその連番自体を何かに使う（例えば：直接データベースの値になるとか）わけではないのでは？
// おそらく、一意のIDが振られたinputをメインに使うところがデータベースにFETCH APIで接続するタイミング
// 話を戻すと
// そもそも別にIDを一意に振る必要はないのでは？
// データベースに格納するのは「選考ID（シートに持たせる）、選考ステップID（DBの状態から自動で生成）、選考内容（inputのvalue）、日付（自動生成）」4つ

// 次はDB側の話
// DB側ではAUTO_INCREMENTは使用していない
// 理由は単純な連番ではなく、選考IDごとの連番だから
// 今の連番の振り方は選考IDごとの選考ステップIDの総数を数えて、それに1プラスすることで連番を振っている
// これだと削除した場合、連番の振り直しが必須となる
// なぜならば例えば選考ステップID「1，2，3，4」があったとする
// そのうちの2番目が削除されると「1，3，4」となる
// 次にインサートされるときは「3」となり、重複エラーが出てしまう
// これはDBなのでHTMLのように無視はできない

// 解決するには....
// 連番を振り直すのがいいのか？
// この場合、削除したらいちいち連番を振り直す処理を行わなければいけないがそっちの方が確実なためそっちを採用する


function delete_input(target){
    let target_id = target.id.substring(14);
    let adopt_area = document.getElementById("adopt_area"+target_id+"");
    delete_input_num.push(target_id);
    adopt_area.remove();
}
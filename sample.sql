-- 学校テーブル
INSERT INTO Schools
VALUES
('01','麻生情報ビジネス専門学校 福岡校'),
('02','麻生外語観光＆ブライダル専門学校'),
('03','麻生医療福祉＆保育専門学校 福岡校'),
('04','麻生建築＆デザイン専門学校'),
('05','麻生公務員専門学校 福岡校'),
('06','麻生美容専門学校 福岡校'),
('07','麻生情報ビジネス専門学校 北九州校'),
('08','麻生公務員専門学校 北九州校'),
('09','麻生工科自動車大学校'),
('10','麻生リハビリテーション大学校'),
('11','麻生看護大学校'),
('12','ASOポップカルチャー専門学校'),
('13','ASO高等部');

-- 学科テーブル
INSERT INTO Courses
VALUES
('01-01','情報工学科',1),
('01-02','情報システム専攻科',1),
('01-03','情報システム科',1),
('01-04','IT経営科',1),
('01-05','ビジネスエキスパート科',1),
('01-06','情報ビジネス科',1),
('01-07','経理科',1),
('01-08','国際ビジネス科',1),
('01-09','国際ITエンジニア科',1),
('02-01','エアライン科',2),
('02-02','ブライダル・ウエディング科',2),
('02-03','ホテル・リゾート科',2),
('02-04','グローバルコミュニケーション科',2),
('02-05','国際おもてなし科',2),
('03-01','医療秘書・事務科',3),
('03-02','診療情報管理士専攻科',3),
('03-03','AI＆診療情報管理士科',3),
('03-04','こども保育科',3),
('03-05','こども未来学科',3),
('03-06','社会福祉科',3),
('03-07','福祉心理学科',3),
('03-08','介護福祉科',3),
('03-09','国際介護福祉科',3),
('03-10','社会福祉士 通信課程',3),
('03-11','精神保健福祉士 通信課程',3),
('04-01','建築工学科',4),
('04-02','建築学科',4),
('04-03','建築CAD科',4),
('04-04','インテリアデザイン科',4),
('04-05','クリエイティブデザイン学科',4),
('04-06','建築学科《夜間》',4),
('04-07','建築士専攻科',4),
('05-01','公務員専攻科',5),
('05-02','公務員総合科',5),
('05-03','高校生対象コース',5),
('05-04','公務員中上級専攻科',5),
('05-05','公務員中上級教養科',5),
('06-01','美容科',6),
('07-01','システムエンジニア科',7),
('07-02','コンピュータシステム科',7),
('07-03','ゲームクリエータ科',7),
('07-04','オフィスビジネス科',7),
('07-05','CGデザイン科',7),
('08-01','公務員専攻科',8),
('08-02','公務員総合科',8),
('09-01','１級自動車整備科',9),
('09-02','２級自動車整備科',9),
('09-03','自動車工学・機械設計科',9),
('09-04','国際自動車整備科',9),
('10-01','理学療法学科',10),
('10-02','作業療法学科',10),
('10-03','言語聴覚学科',10),
('11-01','看護科',11),
('12-01','ゲーム専攻科',12),
('12-02','CG専攻科',12),
('12-03','ゲーム学科',12),
('12-04','CG学科',12),
('12-05','アニメ学科',12),
('12-06','マンガ学科',12),
('12-07','イラスト学科',12),
('12-08','コミックイラスト科',12),
('12-09','コミックイラスト研究科',12),
('13-01','ポップカルチャー総合学科',13),
('13-02','ゲームナレッジコース',13),
('13-03','イラストナレッジコース',13),
('13-04','システムナレッジコース',13);

-- 地方テーブル
INSERT INTO Region
VALUES
('01','北海道・東北地方'),
('02','関東地方'),
('03','甲信越・北陸地方'),
('04','東海地方'),
('05','関西地方'),
('06','中国・四国地方'),
('07','九州・沖縄地方');

-- 都道府県テーブル
INSERT INTO Prefecture(prefecture_name,region_id)
VALUES
('北海道',1),
('宮城県',1),
('福島県',1),
('青森県',1),
('岩手県',1),
('山形県',1),
('秋田県',1),
('東京都',2),
('神奈川県',2),
('埼玉県',2),
('千葉県',2),
('茨城県',2),
('群馬県',2),
('栃木県',2),
('新潟県',3),
('長野県',3),
('石川県',3),
('富山県',3),
('山梨県',3),
('福井県',3),
('愛知県',4),
('静岡県',4),
('岐阜県',4),
('三重県',4),
('大阪府',5),
('兵庫県',5),
('京都府',5),
('滋賀県',5),
('奈良県',5),
('和歌山県',5),
('広島県',6),
('岡山県',6),
('山口県',6),
('愛媛県',6),
('香川県',6),
('徳島県',6),
('高知県',6),
('島根県',6),
('鳥取県',6),
('福岡県',7),
('熊本県',7),
('鹿児島県',7),
('長崎県',7),
('沖縄県',7),
('大分県',7),
('宮崎県',7),
('佐賀県',7);

-- 業界テーブル
INSERT INTO Industry(industry_name)
VALUES
('銀行（都市・信託・政府系）、信金'),
('証券会社、投資ファンド、投資関連'),
('生命保険、損害保険'),
('投信投資顧問'),
('クレジット、信販、リース'),
('商品取引'),
('消費者金融、事業者金融'),
('その他金融関連'),
('コンサルティング、シンクタンク'),
('監査法人、税理士法人、法律事務所'),
('SIer、ソフト開発、システム運用'),
('インターネット'),
('通信、ISP、データセンター'),
('制御システム、組込みソフトウェア'),
('その他ＩＴ・通信関連'),
('電力、ガス、エネルギー'),
('航空、鉄道、運輸、倉庫'),
('不動産関連、住宅'),
('建築、土木、設備工事'),
('総合商社'),
('総合電機、家電、AV機器'),
('自動車、自動車部品、輸送機器'),
('コンピュータ、通信機器、OA機器関連'),
('半導体、電子、精密機器'),
('重電、産業用電気機器、プラント関連'),
('鉄鋼、非鉄金属'),
('機械関連'),
('化学、石油、ガラス、セラミック'),
('食品、飲料'),
('日用品、化粧品'),
('ファッション、アパレル、繊維'),
('インテリア、雑貨、文具、スポーツ'),
('印刷、紙・パルプ、書籍、パネル'),
('住宅設備、建材、エクステリア'),
('ゲーム関連、玩具'),
('その他メーカー・商社'),
('医薬品、医療機器'),
('治験、臨床試験、医薬営業受託'),
('調剤薬局'),
('バイオ関連'),
('病院、医療機関'),
('その他医療・医薬サービス'),
('放送、出版、新聞、映像、音響'),
('広告代理店、PR、SP、デザイン'),
('その他マスコミ関連'),
('小売（百貨店・専門・CVS・量販店）'),
('通信販売'),
('物品レンタル'),
('フードサービス、飲食'),
('旅行、ホテル、旅館、レジャー'),
('冠婚葬祭'),
('人材サービス'),
('コールセンター、業務請負'),
('情報サービス、リサーチ'),
('教育、研修サービス'),
('警備、メンテナンス'),
('介護、福祉関連サービス'),
('美容、エステ、リラクゼーション'),
('環境サービス'),
('受託製造（設計・開発・加工）'),
('その他小売、外食、レジャー、サービス'),
('官公庁'),
('独立行政、社団、財団、学校法人'),
('非政府組織(NGO)、非営利団体(NPO)'),
('農業、林業、水産、畜産'),
('鉱業');

-- 職種テーブル
INSERT INTO JobType(job_name)
VALUES
('総合職（事務職）'),
('総合職（技術職）'),
('営業'),
('事務'),
('経営・事業企画'),
('ITエンジニア'),
('システムエンジニア'),
('インフラエンジニア'),
('ネットワークエンジニア'),
('運用エンジニア'),
('セキュリティエンジニア'),
('機械・電気・電子・半導体（技術職）'),
('化学・繊維・食品（技術職）'),
('建築・土木・設備（技術職）'),
('メディカル（専門職）'),
('不動産（専門職）'),
('クリエイティブ・デザイン'),
('金融（専門職）'),
('調理'),
('販売'),
('設備管理職'),
('施工管理職'),
('警備'),
('清掃'),
('イベント・レジャー・娯楽'),
('教育・カルチャー・スポーツ'),
('理・美容（専門職）'),
('ドライバー・配達'),
('製造・工場・倉庫'),
('その他専門職');

-- ユーザーテーブル
INSERT INTO Users(student_number,school_id,course_id,user_name,password)
VALUES
(0000000,1,1,"Admin","20240514");

-- 企業テーブル
INSERT INTO Company
VALUES
(
    "学校法人麻生塾【麻生専門学校グループ】",
    "がっこうほうじんあそうじゅく【あそうせんもんがっこうぐるーぷ】",
    "https://recruit.asojuku.ac.jp/newgraduate/",
    "福岡県飯塚市芳雄町3-83",
    "麻生 健",
    "専門学校12校の運営",
    "弊社規定により非公開",
    "弊社規定により売上高は非公開",
    514,
    "1939年",
    ""
);

-- 求人職種テーブル
INSERT INTO Company_JobType
VALUES
();

CREATE TABLE (
    company_id CHAR(5),
    job_id CHAR(5),
    PRIMARY KEY(company_id,job_id),
    FOREIGN KEY(company_id) REFERENCES Company(company_id),
    FOREIGN KEY(job_id) REFERENCES JobType(job_id)
);

-- 求人地域テーブル
CREATE TABLE Company_Prefecture(
    company_id CHAR(5),
    prefecture_id INT,
    PRIMARY KEY(company_id,prefecture_id),
    FOREIGN KEY(company_id) REFERENCES Company(company_id),
    FOREIGN KEY(prefecture_id) REFERENCES Prefecture(prefecture_id)
);

-- 所属業界テーブル
CREATE TABLE Company_Industry(
    company_id CHAR(5),
    industry_id CHAR(5),
    PRIMARY KEY(company_id,industry_id),
    FOREIGN KEY(company_id) REFERENCES Company(company_id),
    FOREIGN KEY(industry_id) REFERENCES Industry(industry_id)
);

-- 選考状況テーブル
CREATE TABLE Adopt_State(
    adopt_id INT,
    student_number CHAR(7) NOT NULL,
    company_name_txt VARCHAR(70) NOT NULL,
    note VARCHAR(300),
    PRIMARY KEY(adopt_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- 戦況状況詳細テーブル
CREATE TABLE Adopt_State_Details(
    adopt_id INT,
    adopt_step_id INT,
    adopt_way VARCHAR(30) NOT NULL,
    adopt_date DATE,
    PRIMARY KEY(adopt_id,adopt_step_id),
    FOREIGN KEY(adopt_id) REFERENCES Adopt_State(adopt_id)
);

-- 資格管理テーブル
CREATE TABLE Licences(
    licence_id INT,
    licence_name VARCHAR(50),
    PRIMARY KEY(licence_id)
);

-- 資格管理テーブル
CREATE TABLE Licence_Manage(
    student_number CHAR(7),
    licence_id INT,
    PRIMARY KEY(student_number,licence_id),
    FOREIGN KEY(licence_id) REFERENCES Licences(licence_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- 受験報告書テーブル
CREATE TABLE Exam_Reports(
    report_id INT,
    company_id CHAR(5) NOT NULL,
    student_number CHAR(7) NOT NULL,
    exam_date DATE NOT NULL,
    apply_way VARCHAR(10) NOT NULL,
    exam_way VARCHAR(30) NOT NULL,
    question VARCHAR(400),
    opinion VARCHAR(400),
    other VARCHAR(400),
    PRIMARY KEY(report_id),
    FOREIGN KEY(company_id) REFERENCES Company(company_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- チャットルームテーブル
CREATE TABLE Chat_Rooms(
    chat_room_id INT,
    company_id CHAR(5),
    FOREIGN KEY(company_id) REFERENCES Company(company_id),
    PRIMARY KEY(chat_room_id)
);

-- チャットルーム参加者テーブル
CREATE TABLE Chat_Room_Participants(
    chat_room_id INT,
    student_number CHAR(7) NOT NULL,
    participation_date DATE NOT NULL,
    PRIMARY KEY(chat_room_id,student_number),
    FOREIGN KEY(student_number) REFERENCES Users(student_number),
    FOREIGN KEY(chat_room_id) REFERENCES Chat_Rooms(chat_room_id)
);

-- チャットメッセージテーブル
CREATE TABLE Chat_Room_Messages(
    message_id BIGINT,
    chat_room_id INT NOT NULL,
    send_by CHAR(7) NOT NULL,
    message VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    create_date DATE NOT NULL,
    delete_frag BOOLEAN NOT NULL DEFAULT 0,
    violation_count INT DEFAULT 0,
    PRIMARY KEY(message_id),
    FOREIGN KEY(send_by) REFERENCES Users(student_number),
    FOREIGN KEY(chat_room_id) REFERENCES Chat_Rooms(chat_room_id)
);
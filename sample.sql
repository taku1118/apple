-- 学校テーブル
INSERT INTO Schools (school_id, school_name) 
VALUES 
('01', '麻生情報ビジネス専門学校 福岡校'),
('02', '麻生外語観光＆ブライダル専門学校'),
('03', '麻生医療福祉＆保育専門学校 福岡校'),
('04', '麻生建築＆デザイン専門学校'),
('05', '麻生公務員専門学校 福岡校'),
('06', '麻生美容専門学校 福岡校'),
('07', '麻生情報ビジネス専門学校 北九州校'),
('08', '麻生公務員専門学校 北九州校'),
('09', '麻生工科自動車大学校'),
('10', '麻生リハビリテーション大学校'),
('11', '麻生看護大学校'),
('12', 'ASOポップカルチャー専門学校'),
('13', 'ASO高等部');

-- 学科テーブル
INSERT INTO Courses (course_id, course_name, school_id)
VALUES
('01-01','情報工学科','01'),
('01-02','情報システム専攻科','01'),
('01-03','情報システム科','01'),
('01-04','IT経営科','01'),
('01-05','ビジネスエキスパート科','01'),
('01-06','情報ビジネス科','01'),
('01-07','経理科','01'),
('01-08','国際ビジネス科','01'),
('01-09','国際ITエンジニア科','01'),
('02-01','エアライン科','02'),
('02-02','ブライダル・ウエディング科','02'),
('02-03','ホテル・リゾート科','02'),
('02-04','グローバルコミュニケーション科','02'),
('02-05','国際おもてなし科','02'),
('03-01','医療秘書・事務科','03'),
('03-02','診療情報管理士専攻科','03'),
('03-03','AI＆診療情報管理士科','03'),
('03-04','こども保育科','03'),
('03-05','こども未来学科','03'),
('03-06','社会福祉科','03'),
('03-07','福祉心理学科','03'),
('03-08','介護福祉科','03'),
('03-09','国際介護福祉科','03'),
('03-10','社会福祉士 通信課程','03'),
('03-11','精神保健福祉士 通信課程','03'),
('04-01','建築工学科','04'),
('04-02','建築学科','04'),
('04-03','建築CAD科','04'),
('04-04','インテリアデザイン科','04'),
('04-05','クリエイティブデザイン学科','04'),
('04-06','建築学科《夜間》','04'),
('04-07','建築士専攻科','04'),
('05-01','公務員専攻科','05'),
('05-02','公務員総合科','05'),
('05-03','高校生対象コース','05'),
('05-04','公務員中上級専攻科','05'),
('05-05','公務員中上級教養科','05'),
('06-01','美容科','06'),
('07-01','システムエンジニア科','07'),
('07-02','コンピュータシステム科','07'),
('07-03','ゲームクリエータ科','07'),
('07-04','オフィスビジネス科','07'),
('07-05','CGデザイン科','07'),
('08-01','公務員専攻科','08'),
('08-02','公務員総合科','08'),
('09-01','１級自動車整備科','09'),
('09-02','２級自動車整備科','09'),
('09-03','自動車工学・機械設計科','09'),
('09-04','国際自動車整備科','09'),
('10-01','理学療法学科','10'),
('10-02','作業療法学科','10'),
('10-03','言語聴覚学科','10'),
('11-01','看護科','11'),
('12-01','ゲーム専攻科','12'),
('12-02','CG専攻科','12'),
('12-03','ゲーム学科','12'),
('12-04','CG学科','12'),
('12-05','アニメ学科','12'),
('12-06','マンガ学科','12'),
('12-07','イラスト学科','12'),
('12-08','コミックイラスト科','12'),
('12-09','コミックイラスト研究科','12'),
('13-01','ポップカルチャー総合学科','13'),
('13-02','ゲームナレッジコース','13'),
('13-03','イラストナレッジコース','13'),
('13-04','システムナレッジコース','13');

-- 地方テーブル
INSERT INTO Regions (region_id, region_name)
VALUES
('01','北海道・東北地方'),
('02','関東地方'),
('03','甲信越・北陸地方'),
('04','東海地方'),
('05','関西地方'),
('06','中国・四国地方'),
('07','九州・沖縄地方');

-- 都道府県テーブル
INSERT INTO  Prefectures (prefecture_id, prefecture_name, region_id)
VALUES
('01', '北海道', '01'),
('02', '宮城県', '01'),
('03', '福島県', '01'),
('04', '青森県', '01'),
('05', '岩手県', '01'),
('06', '山形県', '01'),
('07', '秋田県', '01'),
('08', '東京都', '02'),
('09', '神奈川県', '02'),
('10', '埼玉県', '02'),
('11', '千葉県', '02'),
('12', '茨城県', '02'),
('13', '群馬県', '02'),
('14', '栃木県', '02'),
('15', '新潟県', '03'),
('16', '長野県', '03'),
('17', '石川県', '03'),
('18', '富山県', '03'),
('19', '山梨県', '03'),
('20', '福井県', '03'),
('21', '愛知県', '04'),
('22', '静岡県', '04'),
('23', '岐阜県', '04'),
('24', '三重県', '04'),
('25', '大阪府', '05'),
('26', '兵庫県', '05'),
('27', '京都府', '05'),
('28', '滋賀県', '05'),
('29', '奈良県', '05'),
('30', '和歌山県', '05'),
('31', '広島県', '06'),
('32', '岡山県', '06'),
('33', '山口県', '06'),
('34', '愛媛県', '06'),
('35', '香川県', '06'),
('36', '徳島県', '06'),
('37', '高知県', '06'),
('38', '島根県', '06'),
('39', '鳥取県', '06'),
('40', '福岡県', '07'),
('41', '熊本県', '07'),
('42', '鹿児島県', '07'),
('43', '長崎県', '07'),
('44', '沖縄県', '07'),
('45', '大分県', '07'),
('46', '宮崎県', '07'),
('47', '佐賀県', '07');

-- 業界テーブル
INSERT INTO Industries (industry_id, industry_name)
VALUES
('01', '銀行（都市・信託・政府系）、信金'),
('02', '証券会社、投資ファンド、投資関連'),
('03', '生命保険、損害保険'),
('04', '投信投資顧問'),
('05', 'クレジット、信販、リース'),
('06', '商品取引'),
('07', '消費者金融、事業者金融'),
('08', 'その他金融関連'),
('09', 'コンサルティング、シンクタンク'),
('10', '監査法人、税理士法人、法律事務所'),
('11', 'SIer、ソフト開発、システム運用'),
('12', 'インターネット'),
('13', '通信、ISP、データセンター'),
('14', '制御システム、組込みソフトウェア'),
('15', 'その他ＩＴ・通信関連'),
('16', '電力、ガス、エネルギー'),
('17', '航空、鉄道、運輸、倉庫'),
('18', '不動産関連、住宅'),
('19', '建築、土木、設備工事'),
('20', '総合商社'),
('21', '総合電機、家電、AV機器'),
('22', '自動車、自動車部品、輸送機器'),
('23', 'コンピュータ、通信機器、OA機器関連'),
('24', '半導体、電子、精密機器'),
('25', '重電、産業用電気機器、プラント関連'),
('26', '鉄鋼、非鉄金属'),
('27', '機械関連'),
('28', '化学、石油、ガラス、セラミック'),
('29', '食品、飲料'),
('30', '日用品、化粧品'),
('31', 'ファッション、アパレル、繊維'),
('32', 'インテリア、雑貨、文具、スポーツ'),
('33', '印刷、紙・パルプ、書籍、パネル'),
('34', '住宅設備、建材、エクステリア'),
('35', 'ゲーム関連、玩具'),
('36', 'その他メーカー・商社'),
('37', '医薬品、医療機器'),
('38', '治験、臨床試験、医薬営業受託'),
('39', '調剤薬局'),
('40', 'バイオ関連'),
('41', '病院、医療機関'),
('42', 'その他医療・医薬サービス'),
('43', '放送、出版、新聞、映像、音響'),
('44', '広告代理店、PR、SP、デザイン'),
('45', 'その他マスコミ関連'),
('46', '小売（百貨店・専門・CVS・量販店）'),
('47', '通信販売'),
('48', '物品レンタル'),
('49', 'フードサービス、飲食'),
('50', '旅行、ホテル、旅館、レジャー'),
('51', '冠婚葬祭'),
('52', '人材サービス'),
('53', 'コールセンター、業務請負'),
('54', '情報サービス、リサーチ'),
('55', '教育、研修サービス'),
('56', '警備、メンテナンス'),
('57', '介護、福祉関連サービス'),
('58', '美容、エステ、リラクゼーション'),
('59', '環境サービス'),
('60', '受託製造（設計・開発・加工）'),
('61', 'その他小売、外食、レジャー、サービス'),
('62', '官公庁'),
('63', '独立行政、社団、財団、学校法人'),
('64', '非政府組織(NGO)、非営利団体(NPO)'),
('65', '農業、林業、水産、畜産'),
('66', '鉱業');

-- 職種テーブル
INSERT INTO JobTypes (job_id, job_name)
VALUES
('01', '総合職（事務職）'),
('02', '総合職（技術職）'),
('03', '営業'),
('04', '事務'),
('05', '経営・事業企画'),
('06', 'ITエンジニア'),
('07', 'システムエンジニア'),
('08', 'インフラエンジニア'),
('09', 'ネットワークエンジニア'),
('10', '運用エンジニア'),
('11', 'セキュリティエンジニア'),
('12', '機械・電気・電子・半導体（技術職）'),
('13', '化学・繊維・食品（技術職）'),
('14', '建築・土木・設備（技術職）'),
('15', 'メディカル（専門職）'),
('16', '不動産（専門職）'),
('17', 'クリエイティブ・デザイン'),
('18', '金融（専門職）'),
('19', '調理'),
('20', '販売'),
('21', '設備管理職'),
('22', '施工管理職'),
('23', '警備'),
('24', '清掃'),
('25', 'イベント・レジャー・娯楽'),
('26', '教育・カルチャー・スポーツ'),
('27', '理・美容（専門職）'),
('28', 'ドライバー・配達'),
('29', '製造・工場・倉庫'),
('30', 'その他専門職');

-- ユーザーテーブル
INSERT INTO Users (student_number, school_id, course_id, user_name, password)
VALUES 
('0000000', '01', '01-01', 'Admin', '00000000');

-- 企業テーブル
INSERT INTO Companies (company_id, company_name, company_name_ruby, company_url, company_location, president_name, job_detail, build_date, capital, employee_number, revenue, logo_image)
VALUES 
(
    NULL,
    '学校法人麻生塾【麻生専門学校グループ】',
    'あそうじゅく',
    'https://recruit.asojuku.ac.jp/newgraduate/',
    '福岡県飯塚市芳雄町3-83',
    '麻生 健',
    '専門学校12校の運営',
    '1939年',
    '弊社規定により非公開',
    514,
    '弊社規定により売上高は非公開',
    'aso.png'
),
(
    NULL,
    '株式会社アウトソーシングテクノロジー',
    'あうとそーしんぐてくのろじー',
    'https://www.ostechnology.co.jp/',
    '東京都千代田区丸の内1-8-3
    丸の内トラストタワー本館16・17F（受付：17F）',
    '笠井 嘉明',
    'IT・機械・電子・電気・ソフトウェアの技術者派遣及び開発請負
※次世代自動車・デジタル家電・ロボティクス・医療機器の研究開発、生産、技術開発など
職業紹介業務（専門職の職業紹介）
例：カーオーディオチューナー製造・販売　電子部品、完成品の受託生産（テレビ基板、PC光学ドライブ、無線オーディオ、カメラ、無線監視装置）
企業向けネットワーク、コンピュータ及び情報通信システム関連のハードウェア・ソフトウェア・サービスの輸出入、販売、設計・構築、保守・その他技術サービスなど',
    '2004年12月',
    '4億8,365万4千円',
    24713,
    '1,496億500万円',
    'ostechnology.png'
),
(
    NULL,
    '株式会社フルアウト',
    'ふるあうと',
    'https://fullout.jp/',
    '東京都渋谷区渋谷 1-3-9 ヒューリック渋谷一丁目ビル 7 階 CROSSCOOP 内',
    '金田 和也',
    '・インターネット広告・スマートフォン広告代理事業・インターネットメディア事業・アプリ事業',
    '2013年10月',
    '300万円',
    37,
    '1億円',
    'fullout.png'
),
(
    NULL,
    '株式会社フリークアウト・ホールディングス',
    'ふりーくあうと・ほーるでぃんぐす',
    'https://www.fout.co.jp/',
    '東京都港区六本木 6-3-1
六本木ヒルズクロスポイント 3F（総合受付）',
    '本田 謙',
    'グループ会社株式保有によるグループ経営戦略の策定・管理',
    '2010年10月',
    '3,552(百万円) ',
    495,
    '74.2億',
    'fout.png'
),
(
    NULL,
    '株式会社スペースアウト',
    'すぺーすあうと',
    'https://www.spaceout.jp/',
    '東京都武蔵野市境2丁目14番1号スイングビル7階',
    '髙見 富夫',
    'スマートフォン向けソーシャルゲームを企画・制作・運営',
    '平成14年11月12日',
    '6,800万円',
    15,
    '-',
    'spaceout.gif'
);



-- 求人職種テーブル
INSERT INTO Company_JobType (company_id, job_id)
VALUES 
(1, '26'),
(2, '02'),
(2, '17'),
(2, '01'),
(2, '12'),
(2, '13'),
(2, '06'),
(2, '07'),
(2, '08'),
(2, '09'),
(2, '10'),
(2, '11'),
(2, '03'),
(2, '04'),
(2, '05'),
(3, '01'),
(3, '02'),
(3, '04'),
(3, '05'),
(3, '06'),
(3, '17'),
(3, '25'),
(4, '01'),
(4, '02'),
(4, '03'),
(4, '05'),
(4, '06'),
(4, '17'),
(4, '25'),
(5, '06'),
(5, '17');

-- 求人地域テーブル
INSERT INTO Company_Prefecture (company_id, prefecture_id)
VALUES 
(1, '40'),
(2, '08'),
(2, '01'),
(2, '46'),
(2, '06'),
(2, '12'),
(2, '14'),
(2, '03'),
(2, '16'),
(2, '10'),
(2, '11'),
(2, '09'),
(2, '22'),
(2, '18'),
(2, '21'),
(2, '24'),
(2, '28'),
(2, '27'),
(2, '25'),
(2, '26'),
(2, '32'),
(2, '17'),
(2, '31'),
(2, '40'),
(2, '41'),
(2, '43'),
(3, '08'),
(4, '08'),
(5, '08');

-- 所属業界テーブル
INSERT INTO Company_Industry (company_id, industry_id)
VALUES 
(1, '55'),
(2, '52'),
(2, '54'),
(2, '60'),
(2, '27'),
(2, '28'),
(2, '22'),
(2, '21'),
(2, '16'),
(2, '15'),
(2, '14'),
(2, '13'),
(2, '12'),
(2, '11'),
(3, '12'),
(3, '13'),
(3, '15'),
(3, '33'),
(3, '43'),
(3, '44'),
(3, '54'),
(4, '09'),
(4, '11'),
(4, '12'),
(4, '21'),
(4, '23'),
(4, '44'),
(4, '54'),
(4, '59'),
(5, '35');

-- 選考状況テーブル
INSERT INTO Adopt_State (adopt_id, student_number, company_name_txt, note)
VALUES 
(
    NULL,
    '0000000',
    '学校法人麻生塾',
    '学校経由で申込、一次試験が明日ある'
);

-- 戦況状況詳細テーブル
INSERT INTO Adopt_State_Details (adopt_id, adopt_step_id, adopt_way, adopt_date)
VALUES 
(
    1,
    1,
    '一次面接',
    '2024-05-16'
);

-- 資格管理テーブル
INSERT INTO Licences (licence_id, licence_name)
VALUES 
('0001','ITパスポート'),
('0002','基本情報技術者'),
('0003','応用情報技術者'),
('0004','ITサービスマネージャ'),
('0005','ITストラテジスト'),
('0006','システム監査技術者'),
('0007','プロジェクトマネージャ'),
('0008','ネットワークスペシャリスト'),
('0009','情報セキュリティスペシャリスト'),
('0010','エンベデッドシステムスペシャリスト'),
('0011','データベーススペシャリスト'),
('0012','システムアーキテクト'),
('0013','ファイナンシャルプランナー(FP)'),
('0014','宅地建物取引士'),
('0015','保育士'),
('0016','行政書士'),
('0017','社会保険労務士'),
('0018','社会福祉士'),
('0019','危険物取扱者'),
('0020','電気工事士'),
('0021','衛生管理者'),
('0022','マンション管理士');

-- 資格管理テーブル
INSERT INTO Licence_Manage (student_number, licence_id)
VALUES 
('0000000', '0001');

-- 受験報告書テーブル
INSERT INTO Exam_Reports (report_id, company_id, student_number, exam_date, apply_way, exam_way, question, opinion, other)
VALUES 
(
    NULL,
    1,
    '0000000',
    '2024-05-16',
    '学校求人',
    '一次面接',
    '経歴・履歴書の内容について聞かれた。',
    '緊張しすぎてしどろもどろになってしまった。',
    '面接官がかわいかった'
), 
(
    NULL,
    2,
    '0000000',
    '2024-05-16',
    '学校求人',
    '一次面接',
    '経歴・履歴書の内容について聞かれた。',
    '完璧だった',
    'オンライン面接'
),
(
    NULL,
    2,
    '0000000',
    '2024-05-22',
    '学校求人',
    '二次面接',
    '志望動機について勤務地の社員から聞かれた',
    '厳しそうな人だった',
    '特になし'
);

-- チャットルームテーブル
INSERT INTO Chat_Rooms (chat_room_title)
VALUES 
('トム＆ジェリー');

-- チャットルーム参加者テーブル
INSERT INTO Chat_Room_Participants (chat_room_id, student_number)
VALUES 
(1, '0000000');

-- チャットメッセージテーブル
INSERT INTO Chat_Room_Messages (chat_room_id, send_by, message)
VALUES 
(1, '0000000', 'ヒャッハー！');

-- スレッドテーブル
INSERT INTO Thread VALUES 
(null, 1, "学校法人麻生塾【麻生専門学校グループ】", CURRENT_DATE(), true),
(null, 2, "株式会社アウトソーシングテクノロジー", CURRENT_DATE(), true),
(null, 3, "株式会社フルアウト", CURRENT_DATE(), true),
(null, 4, "株式会社フリークアウト・ホールディングス", CURRENT_DATE(), true),
(null, 5, "株式会社スペースアウト", CURRENT_DATE(), true);

-- 掲示板テーブル
INSERT INTO Post VALUES 
(null, 1, "0000000", CURRENT_DATE(), "学校法人麻生塾【麻生専門学校グループ】投稿内容を格納する"),
(null, 1, "0000000", CURRENT_DATE(), "学校法人麻生塾【麻生専門学校グループ】投稿内容を格納する"),
(null, 1, "0000000", CURRENT_DATE(), "学校法人麻生塾【麻生専門学校グループ】投稿内容を格納する"),
(null, 2, "0000000", CURRENT_DATE(), "株式会社アウトソーシングテクノロジー 投稿内容を格納する"),
(null, 2, "0000000", CURRENT_DATE(), "株式会社アウトソーシングテクノロジー 投稿内容を格納する"),
(null, 2, "0000000", CURRENT_DATE(), "株式会社アウトソーシングテクノロジー 投稿内容を格納する"),
(null, 3, "0000000", CURRENT_DATE(), "株式会社フルアウト 投稿内容を格納する"),
(null, 3, "0000000", CURRENT_DATE(), "株式会社フルアウト 投稿内容を格納する"),
(null, 3, "0000000", CURRENT_DATE(), "株式会社フルアウト 投稿内容を格納する"),
(null, 4, "0000000", CURRENT_DATE(), "株式会社フリークアウト・ホールディングス 投稿内容を格納する"),
(null, 4, "0000000", CURRENT_DATE(), "株式会社フリークアウト・ホールディングス 投稿内容を格納する"),
(null, 4, "0000000", CURRENT_DATE(), "株式会社フリークアウト・ホールディングス 投稿内容を格納する"),
(null, 5, "0000000", CURRENT_DATE(), "株式会社スペースアウト 投稿内容を格納する"),
(null, 5, "0000000", CURRENT_DATE(), "株式会社スペースアウト 投稿内容を格納する"),
(null, 5, "0000000", CURRENT_DATE(), "株式会社スペースアウト 投稿内容を格納する");
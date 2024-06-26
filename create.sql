-- 学校テーブル
CREATE TABLE Schools(
    school_id CHAR(2),
    school_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(school_id)
);

-- 学科テーブル
CREATE TABLE Courses(
    course_id CHAR(5),
    course_name VARCHAR(30) NOT NULL,
    school_id CHAR(2) NOT NULL,
    PRIMARY KEY(course_id),
    FOREIGN KEY(school_id) REFERENCES Schools(school_id)
);

-- 地方テーブル
CREATE TABLE Regions(
    region_id CHAR(2),
    region_name VARCHAR(8) NOT NULL,
    PRIMARY KEY(region_id)
);

-- 都道府県テーブル
CREATE TABLE Prefectures(
    prefecture_id CHAR(2),
    prefecture_name VARCHAR(4) NOT NULL,
    region_id CHAR(2) NOT NULL,
    PRIMARY KEY(prefecture_id),
    FOREIGN KEY(region_id) REFERENCES Regions(region_id)
);

-- 業界テーブル
CREATE TABLE Industries(
    industry_id CHAR(2),
    industry_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(industry_id)
);

-- 職種テーブル
CREATE TABLE JobTypes(
    job_id CHAR(2),
    job_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(job_id)
);

-- ユーザーテーブル
CREATE TABLE Users(
    student_number CHAR(7),
    school_id CHAR(2) NOT NULL,
    course_id CHAR(5) NOT NULL,
    user_name VARCHAR(60) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender CHAR(1),
    address CHAR(5),
    birthday DATE,
    graduate_date DATE,
    job_hunt BOOLEAN,
    job_offer BOOLEAN,
    nickname VARCHAR(30),
    profile_img VARCHAR(100),
    my_comment VARCHAR(500),
    desire_state_prefecture CHAR(2),
    desire_state_industry CHAR(2),
    desire_state_jobtype CHAR(2),
    PRIMARY KEY(student_number),
    FOREIGN KEY(school_id) REFERENCES Schools(school_id),
    FOREIGN KEY(course_id) REFERENCES Courses(course_id),
    FOREIGN KEY(address) REFERENCES Prefectures(prefecture_id),
    FOREIGN KEY(desire_state_prefecture) REFERENCES Prefectures(prefecture_id),
    FOREIGN KEY(desire_state_industry) REFERENCES Industries(industry_id),
    FOREIGN KEY(desire_state_jobtype) REFERENCES JobTypes(job_id)
);

-- 企業テーブル
CREATE TABLE Companies(
    company_id INT auto_increment,
    company_name VARCHAR(70) NOT NULL,
    company_name_ruby VARCHAR(70) NOT NULL,
    company_url VARCHAR(300) NOT NULL,
    company_location VARCHAR(70) NOT NULL,
    president_name VARCHAR(50) NOT NULL,
    job_detail VARCHAR(300) NOT NULL,
    build_date VARCHAR(12) NOT NULL,
    capital VARCHAR(20) NOT NULL,
    employee_number INT NOT NULL,
    revenue VARCHAR(20) NOT NULL,
    -- list_division VARCHAR(3) NOT NULL,
    logo_image VARCHAR(300),
    PRIMARY KEY(company_id)
);

-- 企業募集職種テーブル
CREATE TABLE Company_JobType(
    company_id INT,
    job_id CHAR(2),
    PRIMARY KEY(company_id,job_id),
    FOREIGN KEY(company_id) REFERENCES Companies(company_id),
    FOREIGN KEY(job_id) REFERENCES JobTypes(job_id)
);

-- 勤務地テーブル
CREATE TABLE Company_Prefecture(
    company_id INT,
    prefecture_id CHAR(2),
    PRIMARY KEY(company_id,prefecture_id),
    FOREIGN KEY(company_id) REFERENCES Companies(company_id),
    FOREIGN KEY(prefecture_id) REFERENCES Prefectures(prefecture_id)
);

-- 企業所属業界テーブル
CREATE TABLE Company_Industry(
    company_id INT,
    industry_id CHAR(2),
    PRIMARY KEY(company_id,industry_id),
    FOREIGN KEY(company_id) REFERENCES Companies(company_id),
    FOREIGN KEY(industry_id) REFERENCES Industries(industry_id)
);

-- 選考状況テーブル
CREATE TABLE Adopt_State(
    adopt_id INT auto_increment,
    student_number CHAR(7) NOT NULL,
    company_name_txt VARCHAR(70) NOT NULL,
    note VARCHAR(300),
    PRIMARY KEY(adopt_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- 戦況状況詳細テーブル
CREATE TABLE Adopt_State_Details(
    adopt_step_id INT auto_increment,
    adopt_id INT,
    adopt_way VARCHAR(30) NOT NULL,
    adopt_date DATE,
    PRIMARY KEY(adopt_step_id,adopt_id),
    FOREIGN KEY(adopt_id) REFERENCES Adopt_State(adopt_id)
);

-- 資格管理テーブル
CREATE TABLE Licences(
    licence_id CHAR(4),
    licence_name VARCHAR(50),
    PRIMARY KEY(licence_id)
);

-- 資格管理テーブル
CREATE TABLE Licence_Manage(
    student_number CHAR(7),
    licence_id CHAR(4),
    PRIMARY KEY(student_number,licence_id),
    FOREIGN KEY(licence_id) REFERENCES Licences(licence_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- 受験報告書テーブル
CREATE TABLE Exam_Reports(
    report_id INT auto_increment,
    company_id INT NOT NULL,
    company_name VARCHAR(70) NOT NULL,
    company_location VARCHAR(70) NOT NULL,
    student_number CHAR(7) NOT NULL,
    school_name VARCHAR(30) NOT NULL,
    course_name VARCHAR(30) NOT NULL,
    exam_date DATE NOT NULL,
    application_method VARCHAR(30) NOT NULL,
    exam_type VARCHAR(30) NOT NULL,
    exam_step VARCHAR(30) NOT NULL,
    exam_content VARCHAR(400),
    impression VARCHAR(400),
    remarks VARCHAR(400),
    PRIMARY KEY(report_id),
    FOREIGN KEY(company_id) REFERENCES Companies(company_id),
    FOREIGN KEY(student_number) REFERENCES Users(student_number)
);

-- チャットルームテーブル
CREATE TABLE Chat_Rooms(
    chat_room_id INT auto_increment,
    chat_room_title VARCHAR(30),
    room_created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(chat_room_id)
);

-- チャットルーム参加者テーブル
CREATE TABLE Chat_Room_Participants(
    chat_room_id INT,
    student_number CHAR(7) NOT NULL,
    participation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(chat_room_id,student_number),
    FOREIGN KEY(student_number) REFERENCES Users(student_number),
    FOREIGN KEY(chat_room_id) REFERENCES Chat_Rooms(chat_room_id)
);

-- チャットメッセージテーブル
CREATE TABLE Chat_Room_Messages(
    message_id BIGINT auto_increment,
    chat_room_id INT NOT NULL,
    send_by CHAR(7) NOT NULL,
    message VARCHAR(255) NOT NULL,
    -- image VARCHAR(255),画像アップロード
    message_created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    -- message_updated_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,更新日時
    -- delete_frag BOOLEAN NOT NULL DEFAULT 0,削除フラグ
    -- read_flag BOOLEAN NOT NULL DEFAULT 0,既読フラグ
    -- violation_count INT DEFAULT 0,違反報告
    PRIMARY KEY(message_id),
    FOREIGN KEY(send_by) REFERENCES Users(student_number),
    FOREIGN KEY(chat_room_id) REFERENCES Chat_Rooms(chat_room_id)
);
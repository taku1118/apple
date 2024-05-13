-- 学校テーブル
CREATE TABLE School(
    school_id CHAR(2),
    school_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(school_id)
);

-- 学科テーブル
CREATE TABLE Course(
    course_id CHAR(2),
    course_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(course_id)
);

-- 地方テーブル
CREATE TABLE Region(
    region_id INT,
    region_name VARCHAR(6) NOT NULL,
    PRIMARY KEY(region_id)
);

-- 都道府県テーブル
CREATE TABLE Prefecture(
    prefecture_id INT,
    prefecture_name VARCHAR(3) NOT NULL,
    region_id INT NOT NULL,,
    PRIMARY KEY(prefecture_id),
    FOREIGN KEY(region_id) REFERENCE Region(region_id)
);

-- 業界テーブル
CREATE TABLE Industry(
    industry_id CHAR(5),
    industry_name VARCHAR(30) NOT NULL,
    PRIMARY KEY(industry_id)
);

-- 職種テーブル
CREATE TABLE JobType(
    job_id CHAR(5),
    job_name VARCHAR(30) NOT NULL,
    industry_id CHAR(5),
    PRIMARY KEY(job_id),
    FOREIGN KEY(industry_id) REFERENCE Industry(industry_id)
);

-- ユーザーテーブル
CREATE TABLE User(
    student_number CHAR(7),
    school_id CHAR(2) NOT NULL,
    course_id CHAR(4) NOT NULL,
    user_name VARCHAR(60) NOT NULL,
    password VARCHAR(12) NOT NULL,
    gender CHAR(1),
    address INT,
    birthday DATE,
    graduate_date DATE,
    job_hunt BOOLEAN,
    job_offer BOOLEAN,
    desire_state_prefecture INT,
    desire_state_industry CHAR,
    desire_state_jobtype CHAR,
    profile_img VARCHAR(100),
    PRIMARY KEY(student_number),
    FOREIGN KEY(school_id) REFERENCES School(school_id),
    FOREIGN KEY(course_id) REFERENCES Course(course_id),
    FOREIGN KEY(address) REFERENCES Prefecture(prefecture_id),
    FOREIGN KEY(desire_state_prefecture) REFERENCES Prefecture(prefecture_id),
    FOREIGN KEY(desire_state_industry) REFERENCES Industry(industry_id),
    FOREIGN KEY(desire_state_job) REFERENCE JobType(job_id),
);

-- 企業テーブル
CREATE TABLE Company(
    company_id CHAR(5),
    company_name VARCHAR(70) NOT NULL,
    company_name_ruby VARCHAR(70) NOT NULL,
    company_url VARCHAR(300) NOT NULL,
    company_location VARCHAR(70) NOT NULL,
    president_name VARCHAR(50) NOT NULL,
    job_detail VARCHAR(300) NOT NULL,
    capital INT NOT NULL,
    employee_number INT NOT NULL,
    build_date DATE NOT NULL,
    list_division VARCHAR(3) NOT NULL,
    logo_image VARCHAR(300) NOT NULL,
    PRIMARY KEY(company_id)
);

-- 求人職種テーブル
CREATE TABLE Company_JobType(
    company_id CHAR(5),
    job_id CHAR(5),
    PRIMARY KEY(company_id,job_id),
    FOREIGN KEY(company_id) REFERENCE Company(company_id),
    FOREIGN KEY(job_id) REFERENCE JobType(job_id)
);

-- 所属業界テーブル
CREATE TABLE Company_Industry(
    company_id CHAR(5),
    industry_id CHAR(5),
    PRIMARY KEY(company_id,industry_id),
    FOREIGN KEY(company_id) REFERENCE Company(company_id),
    FOREIGN KEY(industry_id) REFERENCE Industry(industry_id)
);

-- 選考状況テーブル
CREATE TABLE Adopt_State(
    adopt_id INT,
    student_number CHAR(7) NOT NULL,
    company_name_txt VARCHAR(70) NOT NULL,
    note VARCHAR(300),
    PRIMARY KEY(adopt_id),
    FOREIGN KEY(student_number) REFERENCE User(student_number)
);

-- 戦況状況詳細テーブル
CREATE TABLE Adopt_State_Detail(
    adopt_id INT,
    adopt_step_id INT,
    adopt_way VARCHAR(30) NOT NULL,
    adopt_date DATE,
    PRIMARY KEY(adopt_id,adopt_step_id),
    FOREIGN KEY(adopt_id) REFERENCE (adopt_id)
);

-- 資格管理テーブル
CREATE TABLE Licence(
    licence_id INT,
    licence_name VARCHAR(50),
    PRIMARY KEY(licence_id)
);

-- 資格管理テーブル
CREATE TABLE Licence_Manage(
    student_number CHAR(7),
    licence_id INT,
    PRIMARY KEY(student_number,licence_id)
);

-- 受験報告書テーブル
CREATE TABLE Exam_Report(
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
    FOREIGN KEY(company_id) REFERENCE Company(company_id),
    FOREIGN KEY(student_number) REFERENCE User(student_number)
);


-- ルームテーブル
-- ルーム参加者テーブル
-- 掲示板
-- スレッド
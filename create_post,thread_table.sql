-- スレッドテーブル
CREATE TABLE Thread(
    thread_id INT auto_increment,
    company_id CHAR NOT NULL,
    thread_name VARCHAR(50) NOT NULL,
    thread_date DATE NOT NULL,
    is_active BOOLEAN NOT NULL,
    PRIMARY KEY (thread_id),
    FOREIGN KEY (thread_id) REFERENCES Companies(company_id) 
);

-- 掲示板テーブル
CREATE TABLE Post(
    post_id INT auto_increment,
    thread_id INT NOT NULL,
    student_number CHAR(7) NOT NULL,
    post_date DATE NOT NULL,
    post_content VARCHAR(300),
    PRIMARY KEY (post_id),
    FOREIGN KEY (thread_id) REFERENCES Thread(thread_id),
    FOREIGN KEY (student_number) REFERENCES Users(student_number)
);
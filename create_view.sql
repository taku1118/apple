-- マイページ用
    -- CREATE VIEW Personal_Inform AS SELECT student_number, user_name, CASE gender WHEN 0 THEN "男性" WHEN 1 THEN "女性" END AS 'gender', prefecture_name, birthday, graduate_date, school_name, course_name, CASE job_hunt WHEN 0 THEN "就活中" WHEN 1 THEN "就活終了" END AS 'job_hunt', CASE job_offer WHEN 0 THEN "内定なし" WHEN 1 THEN "内定なし" END AS 'job_offer', profile_img FROM Users JOIN Courses USING (course_id) JOIN Schools ON Courses.school_id = Schools.school_id JOIN Prefectures ON prefecture_id = address;
    -- CREATE VIEW Desire_Inform AS SELECT Users.student_number, prefecture_name, industry_name, job_name FROM Users JOIN Prefectures ON Users.desire_state_prefecture = Prefectures.prefecture_id JOIN Industries ON Users.desire_state_industry = Industries.industry_id JOIN JobTypes ON Users.desire_state_jobtype = JobTypes.job_id;
    CREATE VIEW Licence_Inform AS SELECT Users.student_number, licence_name FROM Users JOIN Licence_Manage USING (student_number) JOIN Licences USING (licence_id);
-- 

-- 受験報告書用
    CREATE VIEW Report_Inform AS SELECT report_id, company_id, student_number, Courses.school_id, course_id, school_name, course_name, graduate_date, company_name, company_location, exam_date, apply_way, exam_way, question, opinion, other FROM Exam_Reports JOIN Companies USING (company_id) JOIN Users USING (student_number) JOIN Courses USING (course_id) JOIN Schools ON schools.school_id = courses.school_id;
-- 

-- 掲示板用
    CREATE VIEW Post_Content AS SELECT post_id, student_number, thread_id, thread_name, thread_date, is_active, post_date, post_content FROM Thread JOIN Post USING (thread_id) JOIN Users USING (student_number);
-- 
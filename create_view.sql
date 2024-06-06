-- マイページ用
    -- CREATE VIEW Personal_Inform AS SELECT student_number, user_name, gender, address, birthday, graduate_date, school_name, course_name, job_hunt, job_offer, profile_img FROM Users JOIN Courses USING (course_id) JOIN Schools ON Courses.school_id = Schools.school_id;
    -- CREATE VIEW Desire_Inform AS SELECT Users.student_number, prefecture_name, industry_name, job_name FROM Users JOIN Prefectures ON Users.desire_state_prefecture = Prefectures.prefecture_id JOIN Industries ON Users.desire_state_industry = Industries.industry_id JOIN JobTypes ON Users.desire_state_jobtype = JobTypes.job_id;
    CREATE VIEW Licence_Inform AS SELECT Users.student_number, licence_name FROM Users JOIN Licence_Manage USING (student_number) JOIN Licences USING (licence_id);
-- 

-- 受験報告書用
    CREATE VIEW Report_Inform AS SELECT report_id, company_id, student_number, Courses.school_id, course_id, school_name, course_name, graduate_date, company_name, company_location, exam_date, apply_way, exam_way, question, opinion, other FROM Exam_Reports JOIN Companies USING (company_id) JOIN Users USING (student_number) JOIN Courses USING (course_id) JOIN Schools ON schools.school_id = courses.school_id;
-- 

-- 選考状況用
    CREATE VIEW Select_Status AS SELECT adopt_id, adopt_step_id, student_number, company_name_txt, adopt_way, adopt_date, note FROM Users JOIN Adopt_State USING (student_number) JOIN Adopt_State_Details USING (adopt_id);
-- 

-- 掲示板用
    CREATE VIEW Post_Content AS SELECT post_id, student_number, thread_id, thread_name, thread_date, is_active, post_date, post_content FROM Thread JOIN Post USING (thread_id) JOIN Users USING (student_number);
-- 
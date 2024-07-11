-- マイページ用
    CREATE VIEW Personal_Inform AS SELECT student_number, user_name, COALESCE(prefecture_name,'----') as 'address', COALESCE(nickname,'----') as 'nickname', COALESCE(my_comment,'----') as 'my_comment', CASE gender WHEN 0 THEN "男性" WHEN 1 THEN "女性" ELSE "----" END AS 'gender', COALESCE(birthday,'----/--/--') as 'birthday', COALESCE(graduate_date,'----/--/--') as 'graduate_date', school_name, course_name, CASE job_hunt WHEN 0 THEN "就職活動中ではない" WHEN 1 THEN "就職活動中" ELSE "----" END AS 'job_hunt', CASE job_offer WHEN 0 THEN "内定なし" WHEN 1 THEN "内定あり" ELSE "----" END AS 'job_offer', profile_img FROM Users LEFT JOIN Courses ON Users.course_id = Courses.course_id LEFT JOIN Schools ON Users.school_id = Schools.school_id LEFT JOIN Prefectures ON Users.address = Prefectures.prefecture_id;
    CREATE VIEW Desire_Inform AS SELECT student_number, COALESCE(prefecture_name,'----') as prefecture_name, COALESCE(industry_name,'----') as industry_name, COALESCE(job_name,'----') as job_name FROM Users LEFT JOIN Prefectures ON Users.desire_state_prefecture = Prefectures.prefecture_id LEFT JOIN Industries ON Users.desire_state_industry = Industries.industry_id LEFT JOIN JobTypes ON Users.desire_state_jobtype = JobTypes.job_id;
-- 

-- 掲示板用
    CREATE VIEW Post_Content AS SELECT post_id, company_id, student_number, thread_id, thread_name, thread_date, is_active, post_date, post_content FROM Thread JOIN Post USING (thread_id) JOIN Users USING (student_number);
-- 
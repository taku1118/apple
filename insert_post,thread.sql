-- スレッドテーブル
INSERT INTO Thread VALUES 
(null, 1, "学校法人麻生塾【麻生専門学校グループ】", CURRENT_DATE(), true),
(null, 2, "株式会社アウトソーシングテクノロジー", CURRENT_DATE(), true),
(null, 3, "株式会社フルアウト", CURRENT_DATE(), true),
(null, 4, "株式会社フリークアウト・ホールディングス", CURRENT_DATE(), true),
(null, 5, "株式会社スペースアウト", CURRENT_DATE(), true);


-- 掲示板テーブル
INSERT INTO Post VALUES 
(1, (SELECT COALESCE(MAX(post_id)+1,1) FROM post AS fetch_post WHERE thread_id = 1), "0000000", CURRENT_DATE(), "学校法人麻生塾【麻生専門学校グループ】投稿内容を格納する"),
(2, (SELECT COALESCE(MAX(post_id)+1,1) FROM post AS fetch_post WHERE thread_id = 2), "0000000", CURRENT_DATE(), "株式会社アウトソーシングテクノロジー 投稿内容を格納する"),
(3, (SELECT COALESCE(MAX(post_id)+1,1) FROM post AS fetch_post WHERE thread_id = 3), "0000000", CURRENT_DATE(), "株式会社フルアウト 投稿内容を格納する"),
(4, (SELECT COALESCE(MAX(post_id)+1,1) FROM post AS fetch_post WHERE thread_id = 4), "0000000", CURRENT_DATE(), "株式会社フリークアウト・ホールディングス 投稿内容を格納する"),
(5, (SELECT COALESCE(MAX(post_id)+1,1) FROM post AS fetch_post WHERE thread_id = 5), "0000000", CURRENT_DATE(), "株式会社スペースアウト 投稿内容を格納する");

-- INSERT INTO Adopt_State_Details (adopt_id, adopt_step_id, adopt_way, adopt_date)
-- VALUES 
-- (
--     1,
--     (SELECT COALESCE(MAX(adopt_step_id)+1,1) FROM adopt_state_details AS details WHERE adopt_id=1),
--     '一次面接',
--     '2024-05-19'
-- );
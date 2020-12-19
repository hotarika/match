##############################
# パブリックメッセージ
##############################

# ①user_id = 1 が含まれているparent_idを取得

#古い
-- select c1.parent_id from child_public_messages as c1
-- where c1.user_id = 1 group by parent_id
#新しい
select c1.parent_id from parent_public_messages as p1
right join child_public_messages as c1 on p1.id = c1.parent_id
left join works as w on p1.work_id = w.id
where p1.user_id = 1 or w.user_id = 1 or c1.user_id = 1
group by c1.parent_id



# ②上記の結果のparent_idの子要素を全て取得
  select * from child_public_messages as c2
  where c2.parent_id in (select c1.parent_id from child_public_messages as c1
  where c1.user_id = 1 group by parent_id)

# ③最新日付をグループ化（この段階では日付のみしか取得できない）
  select max(c2.created_at) as max from child_public_messages as c2
  where c2.parent_id in (select c1.parent_id from child_public_messages as c1
  where c1.user_id = 1 group by parent_id)
  group by c2.parent_id

# ④上記の日付から、全てのカラムを取得
select * from child_public_messages as c3 where (c3.parent_id, c3.created_at) in (
select c2.parent_id, max(c2.created_at) as latest_date from child_public_messages as c2
where c2.parent_id in ( select c1.parent_id from child_public_messages as c1
where c1.user_id = 1
) group by c2.parent_id
)

  # ⑤上記と親を結合
    select * from parent_public_messages as p1 left join (
select * from child_public_messages as c3 where (c3.parent_id, c3.created_at) in (
select c2.parent_id, max(c2.created_at) as latest_date from child_public_messages as c2
where c2.parent_id in ( select c1.parent_id from child_public_messages as c1
where c1.user_id = 1
) group by c2.parent_id
)
  ) as c4 on p1.id = c4.parent_id

# ⑥whereで条件を指定
    select * from parent_public_messages as p1 left join (
select * from child_public_messages as c3 where (c3.parent_id, c3.created_at) in (
select c2.parent_id, max(c2.created_at) as latest_date from child_public_messages as c2
where c2.parent_id in ( select c1.parent_id from child_public_messages as c1
where c1.user_id = 1
) group by c2.parent_id
)
  ) as c4 on p1.id = c4.parent_id
  left join works as w on p1.work_id = w.id
where p1.user_id = 1 or w.user_id = 1 or c4.id is not null
#⑤で結合したときに自分が発言した掲示板を抽出して親要素と結合しており、それをLEFT JOINしているため、null値が入る。なぜleft joinかというと、親掲示板に自分の投稿したものをリストに含めたいので、inner joinだとそれが消えてしまう。そのためleftjoin

######################################################################
# 最新のメッセージを取得
select c.board_id, max(c.created_at) as latest_date from `direct_messages_contents` as c group by c.board_id

# 最新のメッセージの全てのデータを取得
select * from `direct_messages_contents` as c2 where (c2.board_id, c2.created_at) in (
select c.board_id, max(c.created_at) as latest_date from `direct_messages_contents` as c group by c.board_id
)

# ボードと結合
select * from `direct_messages_boards` as d left join (
select * from `direct_messages_contents` as c2 where (c2.board_id, c2.created_at) in (
select c.board_id, max(c.created_at) as latest_date from `direct_messages_contents` as c group by c.board_id
)
) as c3 on d.id = c3.board_id

# 上記＋カウントも含めたsql
select * from `direct_messages_boards` as d
left join (
	select * from `direct_messages_contents` as c2 where (c2.board_id, c2.created_at) in (
		select c.board_id, max(c.created_at) as latest_date from `direct_messages_contents` as c group by c.board_id
	)
) as c3 on d.id = c3.board_id
left join (
	select board_id, `user_id`, count(*) as count from `direct_messages_badges` as c group by board_id, user_id
) as cnt on c3.board_id = cnt.board_id

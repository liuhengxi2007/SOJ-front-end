<?php

Route::pattern('username', '[a-zA-Z0-9_]{1,20}');
Route::pattern('id', '[1-9][0-9]{0,9}');
Route::pattern('contest_id', '[1-9][0-9]{0,9}');
Route::pattern('tab', '\S{1,20}');
Route::pattern('rand_str_id', '[0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ]{20}');
Route::pattern('upgrade_name', '[a-zA-Z0-9_]{1,50}');
Route::pattern('dir', '(pictures|uploads|utility)');
Route::pattern('file', '[\/a-zA-Z0-9_\-\.%]{1,600}');

Route::group([
		'domain' => '('.UOJConfig::$data['web']['main']['host'].'|127.0.0.1'.')'
	], function() {
		Route::any('/', '/index.php');
		Route::any('/problems', '/problem_set.php');
		Route::any('/problems/template', '/problem_set.php?tab=template');
		Route::any('/problems/contested', '/problem_set.php?tab=contested');
		Route::any('/problem/{id}', '/problem.php');
		Route::any('/problem/{id}/statement.md', '/problem_statement_md.php');
		Route::any('/problem/{id}/statistics', '/problem_statistics.php');
		Route::any('/problem/{id}/manage/statement', '/problem_statement_manage.php');
		Route::any('/problem/{id}/manage/managers', '/problem_managers_manage.php');
		Route::any('/problem/{id}/manage/data', '/problem_data_manage.php');

		Route::any('/collection', '/collection.php');
		Route::any('/collection/propose', '/collection_propose.php');
		Route::any('/collection/manage', '/collection_manage.php');

		Route::any('/contests', '/contests.php');
		Route::any('/contest/new', '/add_contest.php');
		Route::any('/contest/{id}', '/contest_inside.php');
		Route::any('/contest/{id}/registrants', '/contest_members.php');
		Route::any('/contest/{id}/register', '/contest_registration.php');
		Route::any('/contest/{id}/manage', '/contest_manage.php');
		Route::any('/contest/{id}/submissions', '/contest_inside.php?tab=submissions');
		Route::any('/contest/{id}/standings', '/contest_inside.php?tab=standings');
		Route::any('/contest/{id}/ranklist', '/contest_public.php');
		Route::any('/contest/{id}/backstage', '/contest_inside.php?tab=backstage');
		Route::any('/contest/{contest_id}/problem/{id}', '/problem.php');
		Route::any('/contest/{contest_id}/problem/{id}/statistics', '/problem_statistics.php');

		Route::any('/submissions', '/submissions_list.php');
		Route::any('/submission/{id}', '/submission.php');
		Route::any('/submission-status-details', '/submission_status_details.php');

		Route::any('/hacks', '/hack_list.php');
		Route::any('/hack/{id}', '/hack.php');

		Route::any('/blogs', '/blogs.php');
		Route::any('/blog/{id}', '/blog_show.php');

		Route::any('/announcements', '/announcements.php');

		Route::any('/faq', '/faq.php');
		Route::any('/ranklist', '/ranklist.php?type=rating');
		Route::any('/ranklist/all', '/ranklist.php?type=rating&all=true');
		Route::any('/acranklist', '/ranklist.php?type=ac');
		Route::any('/acranklist/all', '/ranklist.php?type=ac&all=true');
		Route::any('/groups', '/ranklist.php?type=group');
		Route::any('/mygroups', '/ranklist.php?type=mygroup');

		Route::any('/login', '/login.php');
		Route::any('/logout', '/logout.php');
		Route::any('/register', '/register.php');
		Route::any('/forgot-password', '/forgot_pw.php');
		Route::any('/reset-password', '/reset_pw.php');
		Route::any('/user/profile/{username}', '/user_info.php');
		Route::any('/user/modify-profile', '/change_user_info.php');
		Route::any('/user/msg', '/user_msg.php');
		Route::any('/user/system-msg', '/user_system_msg.php');
		Route::any('/group/new', '/add_group.php');
		Route::any('/group/{username}', '/group_info.php');
		Route::any('/group/{username}/edit', '/group_edit.php');
		Route::any('/file-upload', '/file_upload.php');
		Route::any('/super-manage(?:/{tab})?', '/super_manage.php');

		Route::any('/download.php', '/download.php');

		Route::any('/click-zan', '/click_zan.php');
		
		Route::any('/{dir}/{file}', '/view_file.php');
	}
);

Route::post('/judge/submit', '/judge/submit.php');
Route::post('/judge/sync-judge-client', '/judge/sync_judge_client.php');

Route::post('/judge/download/submission/{id}/{rand_str_id}', '/judge/download.php?type=submission');
Route::post('/judge/download/tmp/{rand_str_id}', '/judge/download.php?type=tmp');
Route::post('/judge/download/problem/{id}', '/judge/download.php?type=problem');
Route::post('/judge/success/{id}', '/judge/success.php');

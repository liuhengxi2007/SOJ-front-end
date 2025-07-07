<?php
	requirePHPLib('form');
	requirePHPLib('judger');
	requirePHPLib('data');
	requirePHPLib('problem');

	if (!Auth::check()) {
		redirectToLogin();
	}

	if(!isBlogAllowedUser(Auth::user())) {
		become403Page();
	}
?>
<?php echoUOJPageHeader(UOJLocale::get('problem collection')) ?>
<?php echoUOJPageFooter() ?>

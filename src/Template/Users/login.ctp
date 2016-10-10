<h2><?= __x('title of login page','Login') ?></h2>
<?php
	echo $this->Form->create('Post');

	echo __('Username'), $this->Form->text('username');
	echo __('Password'), $this->Form->password('password');
	
	echo $this->Form->submit( __x('submit login form','Login') );
	echo $this->Form->end();
?>
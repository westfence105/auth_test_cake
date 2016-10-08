<h2><?= __x('title of register page','Register') ?></h2>
<?php
	echo $this->Form->create('Post');
	echo __('Username'),	$this->Form->text('username');
	echo __('Password'),	$this->Form->password('password');
	
	echo $this->Form->submit( __x('submit register form','Register') );
	echo $this->Form->end();
?>
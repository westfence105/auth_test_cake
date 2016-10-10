<h2><?= __x('title of register page','Register') ?></h2>
<?php
	echo $this->Form->create('Post');

	echo __('Username'), $this->Form->text('username');
	foreach( $errors['username'] as $cond => $err ){
		echo '<label for="username" class="error">'.$err.'</label>';
	}

	echo __('Password'), $this->Form->password('password');
	foreach( $errors['password'] as $cond => $err ){
		echo '<label for="password" class="error">'.$err.'</label>';
	}
	
	echo $this->Form->submit( __x('submit register form','Register') );
	echo $this->Form->end();
?>
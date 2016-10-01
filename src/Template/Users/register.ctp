<h2>登録</h2>
<?php
	echo $this->Form->create('Post');
	echo 'ユーザー名',	$this->Form->text('username');
	echo 'パスワード',	$this->Form->password('password');
	echo $this->Form->submit('登録');
	echo $this->Form->end();
?>
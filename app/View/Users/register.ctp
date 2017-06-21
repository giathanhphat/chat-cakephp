<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<?php
	echo $this->Form->create('User', array(
		'url' => array('controller' => 'Users',
						'action' => 'register')
		));
	echo $this->Form->input('username', array('type'=>'text', 'class'=>'username', 
											  'placeholder' =>'Username', 'label'=>''));
	echo $this->Form->input('password', array('type'=>'password', 'class'=>'password', 
											  'placeholder' =>'Password', 'label'=>''));
	echo $this->Form->end('Register'); 
	 ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <table>
	 	<tr>
	 		<th>STT</th>
	 		<th>Username</th>
	 		<th>Created</th>
	 	</tr>
	 	<?php 
	 	foreach ($users as $user) {
	 	?>
	 	<tr>
	 		<td><?php echo $user['User']['id'] ?></td>
	 		<td><?php echo $user['User']['username'] ?></td>
	 		<td><?php echo $user['User']['created'] ?></td>
	 	</tr>
	 	<?php
	 	}
	 	 ?>
	 </table>
	  <?php 
	 	echo $this->Paginator->prev('Back  | ');
	 	echo $this->Paginator->numbers();
	 	echo $this->Paginator->next('| Next');
	 	  ?>

		<?php
		echo $this->Html->Link('Logout', array(
         'controller' => 'Users',
         'action' => 'logout',
     )); ?> 
</body>
</html>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic.css');
		echo $this->Html->css('bootstrap.css');
		
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">
 		 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

		  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<!--Themed Layout-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php echo $this->Html->link( "Message Board", array('controller' => 'messages', 'action'=>'messages'), array('class' => 'navbar-brand') ); ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
	<?php
					if($this->Session->check('Auth.User')){
						echo $this->Html->link( AuthComponent::user('username'),   array('controller' => 'users', 'action'=>'profile'), array('class' => 'nav-link') );
						echo $this->Html->link( "Logout",   array('controller' => 'users', 'action'=>'logout'), array('class' => 'nav-link') );
					}else{
						echo $this->Html->link( "Register",  array('controller' => 'users', 'action'=>'register'), array('class' => 'nav-link') );
						echo $this->Html->link( "Login",   array('controller' => 'users', 'action'=>'login'), array('class' => 'nav-link') );
					}
				?>
    </ul>
  </div>
</nav>

      
    



<div id="container">
		<div id="header" class="menu">
			<div class="logo">
				<?php echo $this->Html->link( "Message Board", array('controller' => 'messages', 'action'=>'messagelist') ); ?>
			</div>
			<div class="login">
				<?php
					if($this->Session->check('Auth.User')){
						echo $this->Html->link( AuthComponent::user('username'),   array('controller' => 'users', 'action'=>'profile') );
						echo $this->Html->link( "Logout",   array('controller' => 'users', 'action'=>'logout') );
					}else{
						echo $this->Html->link( "Register",  array('controller' => 'users', 'action'=>'register') );
						echo $this->Html->link( "Login",   array('controller' => 'users', 'action'=>'login'), array('class' => 'login-user') );
					}
				?>
			</div>
		</div>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

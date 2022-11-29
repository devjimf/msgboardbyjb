<div class="users-form user-profile">
	<!-- Edit Profile Button -->
	<div class="edit-profile">
		<?php
			echo $this->Html->link(
				 $this->Html->tag('div', "Edit Profile", array('class' => '')),
				 array('action'=>'edit', $user['User']['id']),
				 array('escape' => false)
			);
            echo $this->Html->link( "Edit Credentials",   array('controller' => 'users', 'action'=>'account') );
		?>
	</div>

	<div class="pic-details">
		<div class="picture">
			<?php echo $this->Html->image($user['User']['profilepic'], array('height' => '250', 'width' => '250', 'fullBase' => true, 'plugin' => false)); ?>
		</div>

		<div class="user-details">
			<div class="full-name">
				<?php if($user['User']['lastname'] !== null) { ?>
					<?php echo $user['User']['lastname'].', '.$user['User']['firstname'].' '.$user['User']['age']; ?>
				<?php } else { ?>
					<p class="">Name: </p>
				<?php } ?>
			</div>

			<div class="user-info">
                <p class=""><span class=""> Gender: </span><?php echo $user['User']['gender'] ?></p>
				<p class=""><span class=""> Birthday: </span><?php echo $user['User']['birthday'] ?></p>
				<p class=""><span class=""> Joined: </span><?php echo $user['User']['date_created'] ?></p>
				<p class=""><span class=""> Last Login: </span><?php echo $user['User']['date_lastlog_in'] ?></p>
			</div>
		</div>
	</div>

	<div class="hobby">
		<?php echo $this->Html->tag('p', 'Hobby:', array('class' => 'user-hobby')); ?>
		<?php echo $this->Html->tag('p', $user['User']['hobby'], array('class' => 'user-hobby')); ?>
	</div>
</div>
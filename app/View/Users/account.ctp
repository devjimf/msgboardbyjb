<div class="users-form edit-profile">
<?php echo $this->Form->create('User'); ?>

	<div class="pic-details">

		<div class="details">
			<div class="user-info">
				<?php
					echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
					echo $this->Form->input('email', array('label' => 'Enter new Email *'));
					echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
					echo $this->Form->input('password_confirm', array('label' => 'Confirm New Password *', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
					echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
				?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>
<div class="edit-profile">

    <?php echo $this->Form->create('User', ['type' => 'file']); ?>

    <div class="image">

        <div>
            <?php echo $this->Html->image($this->data['User']['profilepic'], array('class' => 'profile-pic', 'id' => 'blah', 'height' => '250', 'width' => '250', 'fullBase' => true, 'plugin' => false));?>
        </div>
        
        <div>
            <?php echo $this->Form->input('Upload', ['type'=>'file', 'class' => 'file-upload'])?>
        </div>
        
    </div>




    <div class="user-datails">
        <div class="first-name">
			<?php echo $this->Form->input('firstname'); ?>
		</div>
		<div class="last-name">
			<?php echo $this->Form->input('lastname'); ?>
		</div>
		<div class="gender">
			<?php echo $this->Form->input('gender', array( 
						'options' => array('Male' => 'Male', 'Female' => 'Female'),
						'type' => 'select',
						'class' => 'form-control'
					)); ?>
		</div>
		<div class="birthday">
			<?php echo $this->Form->input('birthday', array('type' => 'text', 'id' => 'datepicker' ,'placeholder'=>'2000-12-25')); 
            ?>
		</div>
    </div>
    <div class="hubby">
			<?php echo $this->Html->tag('p', 'Hobby:', array('class' => 'user-hobby')); ?>
			<?php
				echo $this->Form->textarea('hobby');
			?>
		</div>

		<!-- Edit Profile Button -->
		<div class="submit-profile">
			<?php
				echo $this->Form->submit('Update', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
			?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var readURL = function(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.profile-pic').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(".file-upload").on('change', function(){
			readURL(this);
		});
	});


	$(document).ready(function() {
		$( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
	});

</script>

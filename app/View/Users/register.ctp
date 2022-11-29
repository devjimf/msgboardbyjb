<div class="container h-100" style="margin-top: 0px;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-12 col-lg-12 col-xl-12">
<div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <?php echo $this->Form->create('User'); ?>
            <h3 class="mb-5"><?php echo __('Register'); ?></h3>
            <div class="form-outline mb-4">
            <?php
       echo $this->Form->input('username', array('class' => 'form-control form-control-lg'));
       echo $this->Form->input('email', array('class' => 'form-control form-control-lg'));
       echo $this->Form->input('password', array('class' => 'form-control form-control-lg'));
       echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password', 'class' => 'form-control form-control-lg' ));
    ?>
            </div>

            <!-- Checkbox -->
            <?php  echo $this->Form->submit('Register', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
        ?>


</div>
</div>
</div>
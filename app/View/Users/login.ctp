<div class="container h-100" style="margin-top: 0px;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-12 col-lg-12 col-xl-12">
<div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5"><?php echo __('Please enter your email and password'); ?></h3>
            
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->Form->create('User'); ?>
            <div class="form-outline mb-4">
              <?php echo $this->Form->input('email', array('class' => 'form-control form-control-lg'));?>
            </div>
      

            <div class="form-outline mb-4">
              <?php echo $this->Form->input('password', array('class' => 'form-control form-control-lg')); ?>
            </div>

            <!-- Checkbox -->
            <?php echo $this->Form->end(__('Login', array('class' => 'btn btn-primary btn-lg btn-block'))); ?>
            <hr class="my-4">


</div>
</div>
</div>



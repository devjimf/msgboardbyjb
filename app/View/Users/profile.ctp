
<section style="background-color: #eee;">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
		  <?php echo $this->Html->image($user['User']['profilepic'], array('class' => 'rounded-circle img-fluid', 'height' => '180', 'width' => '180', 'fullBase' => true, 'plugin' => false)); ?>
            <h5 class="my-3"><?php if($user['User']['lastname'] !== null) { ?>
					<?php echo $user['User']['lastname'].', '.$user['User']['firstname'].' '.$user['User']['age']; ?>
				<?php } else { ?>
					<p class="">Name: </p>
				<?php } ?></h5>
            <div class="d-flex justify-content-center mb-2">
			<?php
			echo $this->Html->link(
				 $this->Html->tag('div', "Edit Profile", array('class' => 'btn btn-outline-primary ms-1')),
				 array('action'=>'edit', $user['User']['id']),
				 array('escape' => false)
			);?>
			<?php echo $this->Html->link( "Edit Credentials",   array('controller' => 'users', 'action'=>'account'), array('class'=>'btn btn-outline-primary ms-1'));
		?>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
			<div class="user-info">
                <p class=""><span class="">  </span></p>
				<p class=""><span class=""> </span></p>
				<p class=""><span class="">  </span></p>
				<p class=""><span class=""> </span></p>
			</div>
              <div class="col-sm-3">
                <p class="mb-0">Gender:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['User']['gender'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Birthday: </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['User']['birthday'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Joined:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['User']['date_created'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Login: </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user['User']['date_lastlog_in'] ?></p>
              </div>
            </div>
			<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Hobby:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<?php echo $this->Html->tag('p', $user['User']['hobby'], array('class' => 'user-hobby')); ?></p>
              </div>
            </div>
          </div>
        </div>
        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






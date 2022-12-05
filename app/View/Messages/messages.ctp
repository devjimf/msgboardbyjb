
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  New Message
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Write Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php
		echo $this->Form->create(null,['url' => ['controller' => 'messages', 'action' => 'newmessage']]);
		echo $this->Form->hidden('from_user_id', array('value' => AuthComponent::user('id')));
		echo $this->Form->input('users', array('class' => 'form-control',));
    // echo $this->Form->input('to_user_id', array('type'=>'select', 'id'=>'selectedRecepientID', 'options'=>$resultData, 'default'=>'1'));
    
		echo $this->Form->input('message_details', array('rows' => '3'));
		echo $this->Form->end('Send Message'); 
		?>
      </div>
    </div>
  </div>
</div>
<!--messages-->

    <?php foreach ($messages as $message): ?>
		<ul class="list-unstyled mb-0 mt-3">
              <li class="p-2 border-bottom" style="background-color: #eee;">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">
                  <?php foreach($userdata as $user): ?>
              <?php if($user['Users']['id'] == $message['Messages']['to_user_id'] ) : ?>
				  <?php echo $this->Html->image($user['Users']['profilepic'], array('class' => 'rounded-circle img-fluid', 'height' => '60', 'width' => '60', 'fullBase' => true, 'plugin' => false)); ?>
          <?php elseif($user['Users']['id'] == $message['Messages']['from_user_id'] ) : ?>
				  <?php echo $this->Html->image($user['Users']['profilepic'], array('class' => 'rounded-circle img-fluid', 'height' => '60', 'width' => '60', 'fullBase' => true, 'plugin' => false)); ?>
          <?php endif; ?>
    <?php endforeach; ?> 
          <div class="pt-1">
          <?php foreach($userdata as $user): ?>
              <?php if($user['Users']['id'] == $message['Messages']['to_user_id']) : ?>
                <p class="fw-bold mb-0"><?php echo $user['Users']['username'];?></p>
          <?php endif; ?>
    <?php endforeach; ?> 
                      
                      <p class="small text-muted"><?php echo $last//$message['Messages']['message_details']; ?></p>
                    </div>
                  </div>
                  <div class="pt-1">
                    <p class="large text-muted mb-1"><?php echo $message['Messages']['date_created']; ?></p>
                  </div>
                </a>
                <span class="badge float-end"><?php echo $this->Form->postLink(
                    'Reply',
                    array('action' => 'replyview', $message['Messages']['id']),
                    array( 'class' => 'btn btn-success'),
                ); ?></span>
				    <span class="badge float-end"><?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'dltmessage', $message['Messages']['id']),
                    array('confirm' => 'Are you sure?','class' => 'btn btn-danger'),
                ); ?></span>
               
              </li>
              <li class="p-2 border-bottom">
		</ul>
    <?php endforeach; ?>
    <?php unset($message); ?>
</table>

<h2 class="load-more">Load More</h2>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">
    </div>
    </div>


<script>
  
$('document').ready(function(){
  $('#search').keyup(function(){
    var searchkey = $(this).val();
    searchTags( searchkey );
  });

  function searchTags(keyword){
    var data = keyword;
    $.ajax({
      method: 'get',
      url: "<?php echo $this->Html->url(['controller' => 'Messages', 'action'=>'Search']);?>",
      data: {keyword:data},

      success: function(response)
      {
        $('.table-content').html(response);
      }
    });
  };


  $(document).ready(function(){
    $(function(){
$('.content .items').hide();
$('.content .items:nth-child(n+1):nth-child(-n+3)').show();

$('.ShowMore').click(function(){
$(this).closest('.content').find('.items:not(:visible):lt(3)').show();
})

$('.ShowLess').click(function(){
$(this).closest('.content').find('.items').hide();
$(this).closest('.content').find('.items:lt(3)').show();
})

})


} );
});

</script>

<script type="text/javascript">
	$(".form-control").select2({
		placeholder: "Select a recepient",
		allowClear: true,
		templateResult: function (idioma1) {
			console.log(idioma1);
			var $span = $("<span><img src='/messageboard/app/webroot/img/" + idioma1.id + "' class='recipient-img'> <span class='recipient-text'>" + idioma1.text + "</span></span>");
			return $span;
		},
		templateSelection: function (idioma1) {
			console.log(idioma1);
			var $span = $("<span><img src='/messageboard/app/webroot/img/" + idioma1.id + "' class='recipient-img'> <span class='recipient-text'>" + idioma1.text + "</span></span>");
			return $span;
		},
	});
</script>
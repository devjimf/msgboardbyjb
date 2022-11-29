
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  New Message
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php echo $this->Form->create('Message');?>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<?php  echo $this->Form->submit('Send', array('class' => 'btn btn-primary',  'title' => 'Click here to add the user') );
        ?>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">

	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal
	btn.onclick = function() {
	modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

<script type="text/javascript">
	$("#selectedRecepientID").select2({
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

<?php
	session_start();
	 
	if(isset($_SESSION['akses']))
	{
	    header('location:'.$_SESSION['akses']);
	    exit();
	}
	 
	$error = '';
	if(isset($_SESSION['error'])) {
	 
	     $error = $_SESSION['error']; // Set error
	 
	     unset($_SESSION['error']);
	}
?>

<?php echo $error; ?>

<!-- FORM LOGIN -->
<div id="formLogin" class="modal fade" tabindex="-1" role="dialog">
  	<div class="modal-dialog2" role="document">
    	<div class="modal-content">
      		<div class="modal-header" style="border-bottom: 4px solid #f3c701;">
        		<button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="title" id="titleModal">Form Login</h4>
      		</div>
      
      		<div class="modal-body" style="padding: 30px">
	            <form action="<?php $url; ?>/projectkuliah/check_login.php" method="post">
		            <div class="form-group">
		            	<label class="sr-only" for="inlineFormInputGroup">Username</label>
					    <div class="input-group" style="display: flex">
					        <span class="input-group-label" style="width: 40px; padding: 12px; margin-right: -1px">
					        	<i class="fa fa-users"></i>
					        </span>
					        <input type="text" name="username" class="input-group-field" id="inlineFormInputGroup" placeholder="Username">
					    </div>
		            </div>
		            <div class="form-group">
		            	<label class="sr-only" for="inlineFormInputGroup">Password</label>
					    <div class="input-group" style="display: flex">
					        <span class="input-group-label" style="width: 40px; padding: 12px; margin-right: -1px">
					        	<i class="fa fa-key"></i>
					        </span>
					        <input type="password" name="password" class="input-group-field" id="inlineFormInputGroup" placeholder="Password">
					    </div>
		            </div>
		            <div class="text-right" style="margin-bottom: -15px">
		                <button class="btn-edit" type="submit">Login</button>
		            </div>
	            </form>
      		</div>
    	</div>
    </div>
</div>
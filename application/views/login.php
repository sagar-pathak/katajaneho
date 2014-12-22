  <body class="back-image">
    <div class="bs-component">
      <div class="navbar littlewhite">
            <div class="navbar-header">
            	<a class="navbar-brand" style="color: black !important;" href="#">KJH Solution<span class="hidden-xs"></span></a>
            </div>
        </div>
      </div>
    
<!-- template -->
<div class="container login-box littlewhite">
<?php 
if(isset($_POST['errors'])){
	$errors = $_POST['errors'];
?>
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Oh snap! </strong><?php echo $errors['login']['message']; ?>
</div>
<?php
	}
?>
	<?php 
	$attributes =  array(
			'class' => 'form-horizontal'
		);
	echo form_open('login/authenticate',$attributes);
	?>
	  <fieldset>
	    <legend>Login to KJH Solution</legend>
	    <div class="form-group">
	      <label for="username" class="col-lg-2 col-sm-3 col-xs-3 control-label">Username</label>
	      <div class="col-lg-10 col-sm-9 col-xs-9">
	        <input type="text" class="form-control" id="username" name="username" placeholder="username">
	      </div>
	    </div>
	      <div class="form-group">
	      <label for="password" class="col-lg-2 col-xs-3 col-sm-3 control-label">Password</label>
	      <div class="col-lg-10 col-sm-9 col-xs-9">
	        <input type="text" class="form-control" id="password" name="password" placeholder="password">
	      </div>
	    </div>
	    <div class="form-group">
      <div class="col-lg-7 col-sm-7 col-xs-7">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </div>
      <div class="form-group">
       <div class="col-lg-12 col-sm-12 col-xs-12">
       <iframe style="margin-left:-50px;padding-left:20px;" src="http://ghbtns.com/github-btn.html?user=sagar1992&type=follow&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="175" height="30"></iframe>
      	 <iframe src="http://ghbtns.com/github-btn.html?user=sagar1992&repo=katajaneho&type=watch&count=true"
  allowtransparency="true" frameborder="0" margin="0" scrolling="0" width="100" height="30"></iframe>
      </div>
      </div>
  </fieldset>
</form>
</div>
<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">
	  	<a href="<?php echo place_url();?>addnew" class="btn btn-info">Add New</a>
	  	<a href="<?php echo place_url();?>manage" class="btn btn-primary">Manage</a>
	  </div>
	  <div class="panel-body">
	    <div class="panel panel-default">
		  <div class="panel-body">
		  	<?php
		  	if($this->session->flashdata('newPlaceAdded')){
		  	?>
		  	<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Place has been successfully added.
			</div>
		  	<?php } ?>
		    <form class="form-horizontal" method="POST" action="<?php echo place_url()?>save">
			  <fieldset>
			    <legend>Add New Place</legend>
			    <div class="form-group">
			      <label for="inputName" class="col-lg-3 control-label">Name</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="name" id="inputName" placeholder="Bajeko Sekuwa">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocation" class="col-lg-3 control-label">Location</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="location" id="inputLocation" placeholder="Anamnagar Chok">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocationURL" class="col-lg-3 control-label">Location MAP(google map)</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="locationMap" id="inputLocationURL" placeholder="https://www.google.com.np/maps/place/Bajeko+Sekuwa/@27.697583,85.328579,17z/data=!3m1!4b1!4m2!3m1!1s0x39eb19a40b371b51:0x8309f1a056880ed6?hl=en">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocationURL" class="col-lg-3 control-label">Estimated time to reach</label>
			      <div class="col-lg-9">
			      	<div class="input-group">
					    <span class="mode-icon image-walking" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="byfoot" id="inputLocationURL" placeholder="30 minutes">
					  </div>
					  <div class="input-group">
					    <span class="mode-icon image-car" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="bycar" id="inputLocationURL" placeholder="5 minutes">
					  </div>
					  <div class="input-group">
					    <span class="mode-icon image-bus" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="bybus" id="inputLocationURL" placeholder="10 minutes">
					  </div>
			        </div>
			    </div>
			    <div class="form-group">
			      <label for="textArea" class="col-lg-3 control-label">Description</label>
			      <div class="col-lg-9">
			        <textarea name="description" class="form-control" rows="3" id="textArea" 
			        placeholder="1. Sekuwa Special 
2. Buff Mo:Mo
3. Chowmin
			        "></textarea>
			        <span class="help-block">Please provide in a list. </span>
			      </div>
			    </div>
			     <div class="form-group">
			      <div class="col-lg-9 col-lg-offset-3">
			        <button class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Save</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
		  </div>
		</div>
	  </div>
	</div>	
</div>
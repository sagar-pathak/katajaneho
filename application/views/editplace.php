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
		  	if($this->session->flashdata('placeEdited')){
		  	?>
		  	<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Place information has been successfully modified.
			</div>
		  	<?php } else if($this->session->flashdata('wrongpid')){ ?>
			<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  Information conflict. Couldn't edit place information. 
			</div>
		  	<?php }if(isset($placeInfo)){
		  	?>
		    <form class="form-horizontal" method="POST" action="<?php echo place_url()?>edit">
			  <fieldset>
			    <legend>Edit Place Information</legend>
			    <div class="form-group">
			      <label for="inputName" class="col-lg-3 control-label">Name</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="name" id="inputName" value="<?php echo $placeInfo[0]->name; ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocation" class="col-lg-3 control-label">Location</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="location" id="inputLocation" value="<?php echo $placeInfo[0]->location; ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocationURL" class="col-lg-3 control-label">Location MAP(google map)</label>
			      <div class="col-lg-9">
			        <input type="text" class="form-control" name="locationMap" id="inputLocationURL" value="<?php echo $placeInfo[0]->locationMap; ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputLocationURL" class="col-lg-3 control-label">Estimated time to reach</label>
			      <div class="col-lg-9">
			      	<div class="input-group">
					    <span class="mode-icon image-walking" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="byfoot" id="inputLocationURL" value="<?php echo $ettr[0]->byfoot; ?>">
					  </div>
					  <div class="input-group">
					    <span class="mode-icon image-car" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="bycar" id="inputLocationURL" value="<?php echo $ettr[0]->bycar; ?>">
					  </div>
					  <div class="input-group">
					    <span class="mode-icon image-bus" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
					    <input type="text" class="form-control" name="bybus" id="inputLocationURL" value="<?php echo $ettr[0]->bybus; ?>">
					  </div>
			        </div>
			    </div>
			    <div class="form-group">
			      <label for="textArea" class="col-lg-3 control-label">Description</label>
			      <div class="col-lg-9">
			        <textarea name="description" class="form-control" rows="3" id="textArea" ><?php echo $placeInfo[0]->description; ?></textarea>
			        <span class="help-block">Please provide in a list. </span>
			      </div>
			    </div>
			     <div class="form-group">
			      <div class="col-lg-9 col-lg-offset-3">
			      	<input type="hidden" name="placeNo" value="<?php echo $placeInfo[0]->placeNo; ?>" />
			        <button class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Save</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
			<?php } ?>
		  </div>
		</div>
	  </div>
	</div>	
</div>
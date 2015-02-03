<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">
	  	<a href="<?php echo place_url();?>addnew" class="btn btn-info">Add New</a>
	  	<a href="<?php echo place_url();?>manage" class="btn btn-primary">Manage</a>
	  </div>
	  <div class="panel-body">
	  	<div class="panel panel-default">
		  <div class="panel-heading">Manage Places</div>
		  <div class="panel-body">
		  	<div class="list-group">
		  	<?php if(isset($places)){ 
		  		foreach($places as $place){
		  			$placeNo = $place->placeNo;
		  	?>
			  <a  href="<?php echo place_url(). "manage/". $place->placeNo;?>" class="list-group-item list_heading">
			    <div class="list-group-item-heading"><span class="place_name"><?php echo $place->name; ?></span>
			    <?php foreach($ettoreach as $etr){ 
			    		if($placeNo == $etr->to){
			    ?>
				    	<div class="input-group pull-right">
						    <span class="mode-icon image-walking" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
						    <input type="text" class="form-control pointer" name="bycar" id="inputLocationURL" value="<?php echo $etr->byfoot; ?>" readonly>
						  </div>
						  <div class="input-group pull-right">
						    <span class="mode-icon image-car" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
						    <input type="text" class="form-control pointer" name="bycar" id="inputLocationURL" value="<?php echo $etr->bycar; ?>" readonly>
						  </div>
						  <div class="input-group pull-right">
						    <span class="mode-icon image-bus" style="background-image: url(<?php echo asset_url();?>images/sprite.png)"></span>
						    <input type="text" class="form-control pointer" name="bycar" id="inputLocationURL" value="<?php echo $etr->bybus; ?>" readonly>
						  </div>
					 <?php }} ?>
			    </div>
			    <p class="list-group-item-text"><?php echo $place->description ?></p>
			  </a>
			  <?php }}else{?>
			  	<h4 class="list-group-item-heading">No place available.</h4>
			  <?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>	 
</div>
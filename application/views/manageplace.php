<script>
	$(function(){
			var placeNoArray = [];
			$('input[type=checkbox]').prop('checked',false);
			$('input[name="placeNo"]').on('click',function(){
				$("#deletePlace").addClass("hide");
				var count = 0;
				var checkedPlaces = $('input[name="placeNo"]:checked').map(function(){
					$("#deletePlace").removeClass("hide");
					placeNoArray[count] = this.value;
					count++;
				}).get();
			});
			$("#deletePlace").click(function(){
					$.each(placeNoArray, function(index,value){
						$("#chkboxNo_"+value).addClass("hide");
						$("#placeNo_"+value).addClass("hide");
					});
					var data = JSON.stringify(placeNoArray);
					$.ajax({
						url: '<?php echo place_url();?>remove',
						type: 'POST',
						data: "places="+data,
						success: function(response){
							alert(response);
						}
					});
			});
		});
</script>
<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">
	  	<a href="<?php echo place_url();?>addnew" class="btn btn-info">Add New</a>
	  	<a href="<?php echo place_url();?>manage" class="btn btn-primary">Manage</a>
			<a href="#" id="deletePlace" class="btn btn-link hide" style="color:red">Delete</a>
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
				<span class="chkbox">
				<input type="checkbox"  style="float:left" name="placeNo" value="<?php echo $place->placeNo; ?>" id="chkboxNo_<?php echo $place->placeNo;?>"> 
				</span>
			  <a  href="<?php echo place_url(). "manage/". $place->placeNo;?>" class="list-group-item list_heading manage_place" id="placeNo_<?php echo $place->placeNo;?>">
			    <div class="list-group-item-heading"><span class="place_name">
            
						<?php echo $place->name; ?></span>
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
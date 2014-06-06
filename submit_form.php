<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Buy | Veritrans' Merchant</title>
	<?php include "meta_and_css.php" ?>
</head>

<body>
	<?php include "topbar.php" ?>
	<div class="container-fluid">
		<div class="row-fluid">
				
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			<div class="row-fluid sortable">
				<div class="box span10">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-shopping-cart"></i> Buy</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="checkout_process.php" method="post" enctype="multipart/form-data">
							<fieldset>
							  <div class="control-group">
									<label class="checkbox inline">
									  <input type="checkbox" name="id1"			 id="inlineCheckbox1" value="option1"> item1
									</label>
									<div class="controls">
									  <div class="input disabled">
										<input name="name1" size="16" type="text" value="Adidas f50">
									  </div>
									</div>
									<div class="controls">
									  <div class="input disabled">
										<input name="price1" size="16" type="text" value="200000">
									  </div>
									</div>
									<div class="controls">
								  	  <div class="input disabled">
									    <input name="quantity1" size="16" type="text">
								  	  </div>
									</div>
									<label class="checkbox inline">
									  <input type="checkbox" name="id2" id="inlineCheckbox2" value="option2"> item2
									</label>
									<div class="controls">
									  <div class="input disabled">
										<input name="name2" size="16" type="text" value="Permen Karet f50">
									  </div>
									</div>
									<div class="controls">
								  	  <div class="input disabled">
									    <input name="price2" size="16" type="text" value="500">
								  	  </div>
									</div>
									<div class="controls">
								  	  <div class="input disabled">
									    <input name="quantity2" size="16" type="text">
								  	  </div>
									</div>
								  </div>



							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Submit</button>
							  </div>
							</fieldset>
						</form>
					</div>
				</div><!--/span-->

			</div><!--/row-->
    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<?php include "modal_settings.php" ?>
		<?php include "footer.php" ?>
		
	</div><!--/.fluid-container-->

	<?php include "script_dependencies.php" ?>
</body>
<script>
	function show_baru(){
		document.getElementById("baru").style="display:block";
		document.getElementById("revisi").style="display:none";
	}
	function show_revisi(){
		document.getElementById("baru").style="display:none";
		document.getElementById("revisi").style="display:block";
	}
</script>
</html>

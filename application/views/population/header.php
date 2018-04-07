<html>
	<head>
		<title>Project</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/otherfiles/style.css" type="text/css" />
	</head>

	<body>
		<div id="topHeader">
			<a href="<?php echo base_url('index.php/population')?>/">Home</a>

<?php
		if(($this->session->userdata('logged_in')))
		{

			?>

			<a href="<?php echo base_url('index.php/population')?>/country">Country</a>


			<a href="<?php echo base_url('index.php/population')?>/city">City</a>
			<a href="<?php echo base_url('index.php/population')?>/population">Population</a>

		<?php
		}

		
			

		if(!($this->session->userdata('logged_in')))
		{

			?>

			<font style="float:right; margin-right:30px;">
				<a href="<?php echo base_url('index.php/population')?>/login" style="font-weight:700;">Log In</a>
			</font>

			<?php

			
		}

		else{

			?>

			<font style="float:right; margin-right:30px;">
				<a href="<?php echo base_url('index.php/population')?>/logout" style="font-weight:700;">Log OUT</a>
			</font>

			<?php

		}

		



		?>
			
		</div>
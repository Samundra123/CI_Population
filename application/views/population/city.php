<div id="container">
	<h2>Add New City/state</h2>
	<form method="post" action="new_city">

	<label>Select Country:</label>
		<select name="country">
		<?php
			for($i=0;$i < count($country);$i++)
		{


			
			echo '<option value="' . $country[$i]->c_id.'">' . $country[$i]->country . '</option><hr>';
				}

		?>


			
		</select>
		<input type="text" name="city" placeholder="New City name"><br><br>

		<input type="submit" value="Add City">
	</form>
</div>
<script>
 function get_city()
      {

      	var x = document.getElementById("mycountry").value;


        if(x==0){
          document.getElementById("txtHint").innerHTML ="";

          return;
        }

        else{



          var xmlhttp=new XMLHttpRequest();

          xmlhttp.onreadystatechange= function(){



            if(xmlhttp.readyState == 4 && xmlhttp.status==200) {

            	

              document.getElementById("city_select").innerHTML = xmlhttp.responseText;



            }

          }

          xmlhttp.open("POST","check_country",true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          xmlhttp.send("s="+ x);

        }


        }

</script>
<div id="container">
	<h2>Add New Country</h2>
	<form method="post" action="new_population">

		
		<label>Select Country:</label>
		<select id="mycountry" onchange="get_city()" name="country">

			<option value="0">Select Country</option>
		<?php
			for($i=0;$i < count($country);$i++)
		{


			
			echo '<option value="' . $country[$i]->c_id.'">' . $country[$i]->country . '</option><hr>';
				

		}

		?>
		
		</select>



		<label>Select City/state:</label>
	
		<select id="city_select" name="city">
			<option>Select City</option>

		
		</select>



		<label>Age Group:</label>

		<select name="age_group">
			<option value="2">OLD</option>
			<option value="1">Young</option>
			<option value="0">Child</option>
		</select>
		<br>
		<br>

		Male:<input type="text" name="male" placeholder="Male Population in number"><br><br>

		Female:<input type="text" name="female" placeholder="Female Population in number"><br><br>


		<input type="submit" value="Add Population">
	</form>
</div>
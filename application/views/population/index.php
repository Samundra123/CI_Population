<script>
// This script is for dynamically getting the city when selecting the country

 function get_city()
      {

      	var x = document.getElementById("mycountry").value;



        if(x==0){
          document.getElementById("city_select").innerHTML ="";

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
			


			<div id="header">
				<div id="title">Population Information Center</div>
			</div>

			<div id="selection">
				
		<select id="mycountry" class="theSelect" onchange="get_city();get_population();" name="country">

			<OPTION selected value="0">All Country</OPTION>
				<?php
					for($i=0;$i < count($country);$i++)
				{


					
					echo '<option value="' . $country[$i]->c_id.'">' . $country[$i]->country . '</option><hr>';
						

				}

				?>
		
		</select>


				<select id="city_select" name="city" onchange="get_population();" class="theSelect">
					<OPTION selected value="0">All State/Cities</OPTION>
					
				</select>

				<select id="age_group" onchange="get_population();" class="theSelect">
					<OPTION selected value="3" >All Gender</OPTION>
					<OPTION  value="1">Male</OPTION>
					<OPTION  value="2">Female</OPTION>
					
					
				</select>

				
			</div>

			<div  id="results">
				<table>
					<tr>
						<th>Population Type</th>
						<th>Number</th>
					</tr>

					<tr>
						<td>Old</td>
						<td><?php echo $old ?></td>
						
					</tr>

					<tr>
						<td>Young</td>
						<td><?php echo $young ?></td>
						
					</tr>

					<tr>
						<td>child</td>
						<td><?php echo $child ?></td>
						
					</tr>

					
				<table>
			</div>

		</div>
	</body>
	<script>


// this script gets the age and the select values if selected


 function get_population()
      {


	
      	var x = document.getElementById("mycountry").value;

	
      
      	var y = document.getElementById("city_select").value;

		
      	var z = document.getElementById("age_group").value;


          var xmlhttp=new XMLHttpRequest();

          xmlhttp.onreadystatechange= function(){



            if(xmlhttp.readyState == 4 && xmlhttp.status==200) {

            	

              document.getElementById("results").innerHTML = xmlhttp.responseText;



            }

          }

          xmlhttp.open("POST","get_population",true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          xmlhttp.send("s="+x +"&y="+y + "&z="+z );     

        }

</script>
</html>
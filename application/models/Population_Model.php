<?php

class Population_Model extends CI_Model
{

	public function __construct()
	{

		$this->load->helper('url');

		$this->load->database();

	}

	/** gets the user data for login attempt **/
    public function check_login()
    {
        $username=$this->input->post('username');
        
        $password=$this->input->post('password');
        
        $query = $this->db->query("SELECT * FROM user where uname='$username' and password='$password'");
        
        return  $query->result();
        
        
    }


    /** enters new country **/

    public function new_country()
    {

    	$country = $this->input->post('country');

    	$this->db->query("INSERT into country (country) value ('$country')");

    }


    /** get the country name **/

    public function get_country()
    {
    	$query = $this->db->query("SELECT * FROM country");

    	return $query->result();
    }


     /** get the city name **/

    public function get_city()
    {
    	$query = $this->db->query("SELECT * FROM city_state");

    	return $query->result();
    }

    /** get total population **/

    public function get_total_population($age_group,$gender)
    {

    	

    	$query = $this->db->query("SELECT SUM($gender) as sum FROM population where age_group=$age_group");



    	return $query->result();



    }



    /** enters new city **/

    public function new_city()

    {

    	$c_id= $this->input->post('country');

    	$city = $this->input->post('city');

    	$this->db->query("INSERT into city_state (c_id,state_name) value ($c_id,'$city')");

    }


    /** enter new population **/

    public function new_population()

    {

    	$s_id = $this->input->post('city');
    	$age_group = $this->input->post('age_group');
    	$male= $this->input->post('male');
    	$female= $this->input->post('female');

    	$this->db->query("INSERT into population (s_id,age_group,male,female) value ($s_id,$age_group,$male,$female)");

    }


    /** get specific city **/

    public function get_specific_city($c_id)

    {


    	$query= $this->db->query("SELECT * FROM city_state where c_id=$c_id");

    	return $query->result();


    }


	
}
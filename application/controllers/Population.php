<?php

	class Population extends CI_Controller
	{

		/* constructor */
		public function __construct()
		{
			parent::__construct();

			$this->load->helper('url');
        
        	$this->load->helper('form');
        
        	$this->load->library('session');
        
        	$this->load->model('Population_Model');
		}


		/* view showing the index */
		public function index()
		{

			$data['country'] = $this->Population_Model->get_country();

			$male=$this->Population_Model->get_total_population(2,"male");
			$female=$this->Population_Model->get_total_population(2,"female");
			$data['old']=$male[0]->sum + $female[0]->sum;
			
			$male=$this->Population_Model->get_total_population(1,"male");
			$female=$this->Population_Model->get_total_population(1,"female");
			$data['young']=$male[0]->sum + $female[0]->sum;
		

			$male=$this->Population_Model->get_total_population(0,"male");
			$female=$this->Population_Model->get_total_population(0,"female");
			$data['child']=$male[0]->sum + $female[0]->sum;

			$this->load->view('population/header');



			$this->load->view('population/index',$data);

		}


		public function login()
		{
			

			$this->load->view('population/header');

			$this->load->view('population/login');
		}




		/** logout from the admin **/

		public function logout()
		{

			
			$this->session->sess_destroy();

			redirect('population/login');

		}

		public function country()
		{
			$this->checkLoggedIn();

			$this->load->view('population/header');

			$this->load->view('population/country');

		}

		public function city()
		{
			$this->checkLoggedIn();

			$data['country'] = $this->Population_Model->get_country();

			$this->load->view('population/header');
			$this->load->view('population/city',$data);

		}

		public function population()
		{
			$this->checkLoggedIn();

			$data['country'] = $this->Population_Model->get_country();

			$data['city'] = $this->Population_Model->get_city();

			$this->load->view('population/header');
			$this->load->view('population/population',$data);

		}



		/** checks the login **/
    public function login_check()
    {
        
        $login=$this->Population_Model->check_login();
        
        $num = count($login);       
        
        if ($num==1)
        {
            $sess_array = array('id' => $num);
            
            $this->session->set_userdata('logged_in', $sess_array);
            
                     
                                              
            
            redirect('population/');
        }
        
        else
        {
            redirect('population/login');
        }

    }


    /** checks wether user is logged in or not **/

    public function checkLoggedIn()
	{

		if(!($this->session->userdata('logged_in')))
		{

			redirect('population/login','refresh');
		}


	}




	/** enter the new country **/

	public function new_country()

	{

		$this->Population_Model->new_country();

		redirect('population/country');


	}


	/** enter the new city **/

	public function new_city()

	{

		$this->Population_Model->new_city();

		redirect('population/city');


	}


	/** population **/

	public function new_population()

	{

		$this->Population_Model->new_population();

		redirect('population/population');
	}


	/** gets the city for specific country **/

	public function check_country()

	{
		$c_id= $_POST['s'];

		$city= $this->Population_Model->get_specific_city($c_id);

		echo "<option>Select City</option>";

			for($i=0;$i < count($city);$i++)
		{


			
			echo '<option value="' . $city[$i]->s_id.'">' . $city[$i]->state_name . '</option><hr>';
				}

		
		
		
		echo "<option>$c_id</option";
	}


	/** gets calculates and presents the population diversity **/

	public function get_population()
	{

		echo "hello";
		echo $_POST['s'];
		if (($_POST['s']==0) && $_POST['y']==0 && $_POST['z']==3)
		{
			$male=$this->Population_Model->get_total_population(2,"male");
			$female=$this->Population_Model->get_total_population(2,"female");
			$data['old']=$male[0]->sum + $female[0]->sum;
			
			$male=$this->Population_Model->get_total_population(1,"male");
			$female=$this->Population_Model->get_total_population(1,"female");
			$data['young']=$male[0]->sum + $female[0]->sum;
		

			$male=$this->Population_Model->get_total_population(0,"male");
			$female=$this->Population_Model->get_total_population(0,"female");
			$data['child']=$male[0]->sum + $female[0]->sum;

			echo "<table>
					<tr>
						<th>Population Type</th>
						<th>Number</th>
					</tr>

					<tr>
						<td>Old</td>
						<td>" . $data['old'] ,"</td>
						
					</tr>

					<tr>
						<td>Young</td>
						<td>" . $data['young'] . "</td>
						
					</tr>

					<tr>
						<td>child</td>
						<td>" . $data['child'] . "</td>
						
					</tr>

					
				<table>";

		}

		elseif (($_POST['s']>0) && $_POST['y']==0 && $_POST['z']==3)
		{
			echo "only country";
		}

		elseif (($_POST['s']>0) && $_POST['y']>0 && $_POST['z']==3)
		{

			echo "only contry and city";
		}

		else
		{
			echo "every thing else";

		}
		echo $_POST['y'];
		echo $_POST['z'];
	}


	




}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @package Users
*
* @access public
*/
class Users extends CI_Controller 
{
	
	public function __construct()
	{

		//call parent constructor
		parent::__construct();

		//load the Users model
		$this->load->model('Users_model');

		//load then pagination library
		$this->load->library('pagination');

		//load then user agent library
		$this->load->library('user_agent');

		$this->load->helper('url');

	}
	
	/**
	* dispay all users records in manage_users view file 
	* 
	* @access public
	* 
	*/

	public function manage_users()
	{
		$base_url = base_url() . "/users/manage_users";
		$toal_users_rocord = $this->Users_model->users_counts_records();

		//initialize pagination
		$this->_set_pagination($base_url,$toal_users_rocord);

		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3)) ;
		}
		else{
			$page = 1;
		}

		$page = ($page * PER_PAGE) - PER_PAGE;
		
		//fetch users record 
		$data["results"] = $this->Users_model->fetch_record_users(PER_PAGE, $page);
		//create a links for pagination
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links);
		//call header view file
		$this->load->view('header');
		
		//call manage_users view file
		$this->load->view('users/manage_users',$data);

		//call footer view file
		$this->load->view('footer');	}

	/**
	* initialize pagination
	*
	* @access private
	*
	* @param string $base_url
	*	
	* @param integer $total_record
	*/
	private function _set_pagination($base_url, $total_record)
	{

		//declar array paginationconfig varaible
		$paginationconfig = array();

		//set configation for pagination
		$paginationconfig["base_url"] 			= 	$base_url;
		$paginationconfig["total_rows"] 		= 	$total_record;
		$paginationconfig["per_page"] 			= 	PER_PAGE;
		$paginationconfig['use_page_numbers'] 	= 	TRUE;
		$paginationconfig['num_links'] 			= 	$total_record;
		$paginationconfig['cur_tag_open'] 		=   '&nbsp;<a class="current">';
		$paginationconfig['cur_tag_close'] 		= 	'</a>';
		$paginationconfig['next_link'] 			= 	'Next';
		$paginationconfig['prev_link'] 			= 	'Previous';

		//initialize pageination 
		$this->pagination->initialize($paginationconfig);
	} 

	/**
	* add form  
	* 
	* @access public
	* 
	*/


	public function index($id=0)
	{
		if(isset($id) && !empty($id))
		{
			$user_data = $this->Users_model->fetch_record_userByid($id);
			$user['data'] = (array) $user_data[0];
	
		}
		else
		{
			$user['data'] = array();
		}	
		//$user_data = $this->Users_model->fetch_record_userByid(1);
		//$user['data'] = (array) $user_data[0];
		//print_r($user);
		$this->load->view('header');
		$this->load->view('users/users', $user);
		$this->load->view('footer');
	}

	/**
	* add form  
	* 
	* @access public
	* 
	*/	
	public function save_users($id=0)
	{
		if(!empty($this->input->post('btn_save')))
		
		$data['name'] = $this->input->post('name');
		$data['phone'] = $this->input->post('phone');
		$data['email'] = $this->input->post('email');
		$data['general'] = $this->input->post('general');
		{

			if(isset($id) && !empty($id))
			{
				if($this->Users_model->Update($id,$data))
				{
					//set message
					$this->session->set_flashdata('message', 'User Information is Updated Sucessfully');
					//redirect('/users/manage_users', 'refresh');
					redirect($this->agent->referrer());
				}	
			}
			else
			{
				//print_r($this->Users_model->Save($data));
				//insert record in user table	
				if($this->Users_model->Save($data))
				{
			
					//set message	
					$this->session->set_flashdata('message', 'User Information is added Sucessfully');
					redirect('/users/manage_users', 'refresh');

				}	
			}	

		}
	}
}

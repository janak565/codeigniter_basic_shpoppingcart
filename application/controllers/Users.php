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

	public function index()
	{
		$this->load->view('header');
		$this->load->view('users/users');
		$this->load->view('footer');
	}

	public function save_users()
	{
		echo "te";
		print_r($_FILES);
		exit;
	}
}

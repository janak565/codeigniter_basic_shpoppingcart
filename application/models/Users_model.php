<?php
/**
* @package Users_model
*
* @access public
*/
class Users_model extends CI_Model{

	// define private $_tablename
	private $_tablename ='users';
	
	function __construct()
	{
		parent::__construct();

	}

	/**
	* return total record count of users
	*
	* @access public
	*
	* @return integer $user_record_count	
	*/
	function users_counts_records()
	{
		$user_record_count = 0;

		$user_record_count =  $this->db->count_all($this->_tablename);

		return $user_record_count;
	}
	/**
	*	fetch users data by user_id
	*	
	*	@access public
	*
	*	@param $users_id
	*
	*	@return array $users_data_array
	*/
	function fetch_record_userByid($user_id = 0)
	{
		//declare array in $users_data_arr
		$users_data_arr = array();
		//set where condtion by id
		$this->db->where('id',$user_id);

		//get query for users table 
		$users_query = $this->db->get($this->_tablename);

		//check records is exists
		if($users_query->num_rows() > 0)
		{
			foreach ($users_query->result() as $user_row) {
				$users_data_arr [] = $user_row;
			}
			return $users_data_arr; 
		}
		return false;	
	}

	/**
	* fetch limited users record  
	*
	* @access public
	*
	* @param integer $limit
	*
	* @param integer $start
	*
	* @return array $users_data_array
	*
	*/

	function fetch_record_users($limit = 0,$start = 0)
	{
		//set limit condition
		$this->db->limit($limit, $start);

		
		//get query for users table
		$users_query = $this->db->get($this->_tablename);

		//check records is exists
		if($users_query->num_rows() > 0)
		{
			foreach ($users_query->result() as $users_row) 
			{
				$users_data_arr [] = $users_row;
			}
			return $users_data_arr; 
		}
		return false;
	}

	/**
	* add record in users table  
	*
	* @access public
	*
	* @param array $data
	*
	* @return integer id
	*
	*/

	public function Save($data)
	{

		// insert record of user 
		 $this->db->trans_start();
		 $this->db->insert($this->_tablename, $data);
		 $id =  $this->db->insert_id();
		 $this->db->trans_complete();
		 return $id;
	}

	/**
	* update record in users table  
	* 
	* @access public
	*
	* @param interger $id
	*
	* @param array $data
	*
	* @return integer id
	*/
	public function Update($id,$data)
	{
		//update record of user
		$this->db->where('id', $id);
		$this->db->update($this->_tablename, $data);
		return $id;
	}

	/**
	* delete record in users table  
	* 
	* @access public
	*
	* @param interger $id
	*
	* @return integer id
	*/

	public function Delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->_tablename);
		return $id;
	}

	/**
	* fetch array record  
	* 
	* @access public
	*
	* @param mix $query
	*
	* @return array $data	*
	*/

	public function query($query)
	{
		$query = $this->db->query($query);
		return $data = $query->result_array();
	}
}	

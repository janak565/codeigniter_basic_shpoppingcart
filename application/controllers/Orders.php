<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @package Orders
*
* @access public
*/
class Orders extends CI_Controller 
{
	
	public function __construct()
	{

		//call parent constructor
		parent::__construct();
	}

	/**
	*	Display billing add form
	*	
	*	@access public
	*
	*	@return html	
	*/

	public function billing_add()
	{
		//it is check session is avaible or not
		if($this->session->userdata('session_produt_arr'))
		{
			//destroy session of session_produt_arr
			$this->session->unset_userdata('session_produt_arr'); 
		}

		//call header view file
		$this->load->view('header');

		//call billinga_add view file
		$this->load->view('orders/billing_add');

		//call footer view file
		$this->load->view('footer');
	}
	/**
	* 	return product inforamtion and add products in session array 
	*	
	*	@access public
	*
	* 	@param integer $product_id 
	*	@param integer $qty
	*	@param float   $product_price
	*	@param float  $amount
	*
	*	@return html
	*/
	public function  add_product()
	{
		//decare array 
		$product_data_arr = array();
		$session_product_arr = array();

		//get value in variable of post value
		$product_id 	= 	$this->input->post('product_id',TRUE);
		$qty 			=	$this->input->post('qty',TRUE);
		$amount			=	$this->input->post('amount',TRUE);
		$product_price 	=   $this->input->post('product_price',TRUE);

		//add product information in productDataArr
		$productDataArr['product_id'] = $product_id;
		$productDataArr['qty'] = $qty;
		$productDataArr['product_price'] = $product_price;
		$productDataArr['amount'] = $amount;

		//it is check session is avaible or not
		if($this->session->userdata('session_produt_arr'))
		{
			//add produts array in $session_product_arr 
			$session_product_arr = $this->session->userdata('session_produt_arr'); 
		}
		//add productDataArr in session_product_arr array
		$session_product_arr[] = $productDataArr;
		$this->session->set_userdata('session_produt_arr',$session_product_arr);

		//call add_prouct view file
		$this->load->view('orders/add_prouct');
	} 
}
//http://www.mysqltutorial.org/mysql-foreign-key/
//http://keighl.com/post/codeigniter-file-upload-validation/

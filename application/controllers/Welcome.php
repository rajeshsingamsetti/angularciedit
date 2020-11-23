<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function project_modules()  
	{
		$this->load->view('project_modules');
	}
		
	public function get_departlist()  
	{
				$this->load->model('department_model');
		$keyword = $this->input->get("keyword");
		$pagenum = $this->input->get("page"); 
		$pagesize = $this->input->get("size");
		$offset = ($pagenum - 1) * $pagesize;
		
		$result = $this->department_model->get_departlist($keyword,$offset,$pagesize);
		print json_encode($result); 
	}
	
	
	
	public function update_depart()
	{
		$this->load->model('department_model');
		$formdata = json_decode($this->input->get("formdata"));
		$data = array( "service_name" => $formdata->service_name, "add_date" => date('Y-m-d') );
		
		//$predata = $this->department_model->service_log($formdata->user_service_id);
		$description = $detailed_desc= "";	
		/*if(trim($predata['username'])!= trim($us['username']))
		{	$description= "Username";
			$detailed_desc="Username changed from ".$predata['username']." to ".$us['username']." ";
		}
		if(trim($predata['service_name'])!=trim($data['service_name']))
		{	if($description!="") { $description.= ", "; $detailed_desc.="<br>";} 			
			$description.= "Service Name";					
			$detailed_desc.="Service Name changed from ".$predata['service_name']." to ".$data['service_name']." ";
		}
		if(trim($predata['service_lines'])!=trim($data['service_lines']))
		{	if($description!="") { $description.= ", "; $detailed_desc.="<br>";} 			
			$description.= "Service Line";					
			$detailed_desc.="Service Line changed from ".$predata['service_lines']." to ".$data['service_lines']." ";
		}
		if(trim($predata['service_charge'])!=trim($data['service_charge']))
		{	if($description!="") { $description.= ", "; $detailed_desc.="<br>"; } 	
			$description.= "Service charge";
			$detailed_desc.="Service charge changed from ".$predata['service_charge']." to ".$data['service_charge']." ";
		} 
		//If any thing changed concatinate with a string: Changed.
		if($description!="")
		{
		  $description.= "  changed.";	
		}*/
		
		$result = $this->department_model->update_depart($formdata->user_service_id,$data);
		if($result == 1)
		{	$response = json_encode(array('errcode' => 200, 'errmsg' => 'Updated Successfully!'));
		}
		else
		{
			$response = json_encode(array('errcode' => 202, 'errmsg' => 'Failed To Update!'));
		}
		print_r($response);
	}
	
	public function delete_depart()
	{
		$formdata = json_decode($this->input->get("formdata"));
		$result = $this->department_model->delete_depart($formdata->user_service_id);
		if($result == 1)
		{
			$logdata = array( 'action_type' => "deletecustomerservice", 'action_date' => date('Y-m-d H:i:s'), 'action_by_admin' => $this->adminname, 'admin_ipaddress' => $_SERVER['REMOTE_ADDR'], 'action_applied_for' => '', 'additional_id' => '', 'action_text' => "deletecustomerservice", 'description' => "Customer service deleted.", 'detailed_desc' => '', 'additional_text' => 'customer', 'action_icon' => "trash" );
			$this->login_model->actionlog($logdata);
			$response = json_encode(array('errcode' => 200, 'errmsg' => "Deleted Successfully"));
		}
		else
		{
			$response = json_encode(array('errcode' => 202, 'errmsg' => 'Failed To Delete!'));
		}
		print_r($response);
	}
}

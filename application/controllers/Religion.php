<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion extends CI_Controller {

	public function index()
	{
		
		$data['title'] =' Religion ';
		$data['posts'] = $this->religion_model->get_religion();
		//print_r($data['posts']);

		$this->load->view('template/header.php');
		$this->load->view('Admin/Religion/index',$data);
		$this->load->view('template/footer.php');
	}

	public function addNew(){
		//$data['title'] = 'Add new';

		$this->form_validation->set_rules('inputReligion','Religion Name','required');
		$this->form_validation->set_rules('inputReligionCode','Religion Code','required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('template/header.php');
			$this->load->view('Admin/Religion/index');
			$this->load->view('template/footer.php');
		}
		else{
			$this->religion_model->new_religion();
			redirect('religion');
		}
		
	}

	public function delete($id){
		$this->religion_model->delete_religion($id);
		redirect('religion/index');
	}

	public function edit($id){
		$data['posts'] = $this->religion_model->get_religion();
		$data['getReligion'] = $this->religion_model->get_religion($id);

		if (empty($data['getReligion'])) {
			show_404();
		}
		$data['title'] = 'Edit Post ';

		$this->load->view('template/header.php');
		$this->load->view('Admin/Religion/index',$data);
		$this->load->view('template/footer.php');
	}

	public function update(){

		$this->religion_model->update_religion();
		redirect('religion/index');
	}

}

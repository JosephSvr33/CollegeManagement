<?php

/**
 * 
 */
class religion_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_religion($flag = FALSE){
		if($flag === FALSE){
			$this->db->order_by('Religion_Id','ASC');
			$query = $this->db->get('tbl_religion');
			return $query->result_array();
		}

		$query = $this->db->get_where('tbl_religion',array('Religion_Id' => $flag));
		return $query->row_array();
	}

	public function new_religion(){
		$data = array(
			'Religion' => $this->input->post('inputReligion'),
			 'Religion_Code' => $this->input->post('inputReligionCode')
			);
		//print_r($query);
		 return $this->db->insert('tbl_religion',$data);
		//redirect('posts/index');
	}

	//delete
	public function delete_religion($id){
		$this->db->where('Religion_Id',$id);
		$this->db->delete('tbl_religion');
	}

	public function update_religion(){
		$data = array(
			'Religion' => $this->input->post('inputReligion'),
			 'Religion_Code' => $this->input->post('inputReligionCode')
			);
		$this->db->where('Religion_Id',$this->input->post('inputReligionId'));
		return $this->db->update('tbl_religion',$data);
	}
}

?>
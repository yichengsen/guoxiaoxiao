<?php
class systemModel extends baseModel {
	public $pagesize = 2;
	
	//��־�б�
	public function logList(){
		$arr = $this->db->select("log");
        return $arr;
	}

	//��־ɾ��
	public function logDelete($id){
		$arr = $this->db->deletes("log", array('log_id' => $id));
        return $arr;
	}

	//��־����ɾ��
	public function logDelall($id){
		$where="log_id in ($id)";
		$arr=$this->db->delete('log',$where);
	}
}
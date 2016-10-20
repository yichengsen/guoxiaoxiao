<?php
class systemModel extends baseModel {
	public $pagesize = 2;
	
	//日志列表
	public function logList(){
		$arr = $this->db->select("log");
        return $arr;
	}

	//日志删除
	public function logDelete($id){
		$arr = $this->db->deletes("log", array('log_id' => $id));
        return $arr;
	}

	//日志批量删除
	public function logDelall($id){
		$where="log_id in ($id)";
		$arr=$this->db->delete('log',$where);
	}
}
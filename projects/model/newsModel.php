<?php
class newsModel extends baseModel {
	public $pagesize = 5; 
	
	//�������
	public function newsAdd($data){
		$arr = $this->db->insert("news", $data);
        return $arr;
	}

	//�����б�
	public function selectNews(){
		$arr = $this->db->select("news");
        return $arr;
	}
}
<?php
class picModel extends baseModel {
	public $pagesize = 5; 
	
	//����ֲ�ͼ
	public function picAdds($data){
		$arr = $this->db->insert("image", $data);
        return $arr;
	}
}
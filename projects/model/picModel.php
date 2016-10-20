<?php
class picModel extends baseModel {
	public $pagesize = 5; 
	
	//Ìí¼ÓÂÖ²¥Í¼
	public function picAdds($data){
		$arr = $this->db->insert("image", $data);
        return $arr;
	}
}
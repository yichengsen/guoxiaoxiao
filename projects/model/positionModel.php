<?php
class positionModel extends baseModel {
	public $pagesize = 5; 
	
	//ְλ����
	public function positionAdds($data){
		$arr = $this->db->insert("position", $data);
        return $arr;
	}

	//��ѯְλ�б�
	public function positionList(){
		$arr = $this->db->select("position");
        return $arr;
	}

	//ְλ�б���ҳ
	function getList($page){
		$start = ($page-1)*$this->pagesize;
		$sql = "select * from position where 1=1 limit ".$start.",".$this->pagesize;
		$list = $this->db->getAll($sql);
		return $list;
	}
	
	//ְλ�б����������
	function getTotal(){
		$sql = "select count(*) from position where 1=1 ";
		return $this->db->getOne($sql);
	}

	//����ְλ��ҳ
	function getLists($position_name,$page){
		$start = ($page-1)*$this->pagesize;
		$sql = "select * from position where position_name like '%$position_name%'  limit ".$start.",".$this->pagesize;
		$list = $this->db->getAll($sql);
		return $list;
	}
	
	//����ְλ���������
	function getTotals($position_name){
		$sql = "select count(*) from position where position_name like '%$position_name%' ";
		return $this->db->getOne($sql);
	}

	//ְλ�б�ɾ��
	public function positionDelete($id){
		$arr = $this->db->deletes("position", array('p_id' => $id));
        return $arr;
	}

	//ְλ�б��༭
	public function selectPosition($p_id){
		$arr = $this->db->select("position", array('p_id' => $p_id));
        return $arr;
	}

	//ְλ�б��༭�޸�
	public function positionEdits($p_id,$position_name,$position_work_age,$position_salary,$position_degree,$position_welfare,$position_describe,$position_condition,$position_sex){
		$arr = $this->db->update("position", array('position_name' => $position_name, 'position_work_age' => $position_work_age, 'position_salary' => $position_salary, 'position_degree' => $position_degree, 'position_welfare' => $position_welfare, 'position_describe' => $position_describe, 'position_condition' => $position_condition, 'position_sex' => $position_sex), $condition =array('p_id'=>$p_id));
        return $arr;
	}

	//ְλ����ɾ��
	public function positionDelall($id){
		$where="p_id in ($id)";
		$arr=$this->db->delete('position',$where);
	}
}
<?php
class powerModel extends baseModel {
    public $pagesize = 2;

    function __construct(){
        parent:: __construct();
    }

    //添加父级权限
    public function fatherPower($data){
        $arr = $this->db->insert("power", $data);
        return $arr;
    }

    //查询所有父级权限
    public function selectFatherPower(){
		$arr = $this->db->select("power", array('parent_id' => 0));
        return $arr;
    }

    //添加子级权限
    public function sunPower($data){
        $arr = $this->db->insert("power", $data);
        return $arr;
    }

    //查询所有权限
    public function adminPower(){
       $arr = $this->db->select("power");
        return $arr;
    }

    //查询删除的权限是否有子级权限
    public function selectDeletePower($power_id){
		$arr = $this->db->select("power", array('parent_id' => $power_id));
        return $arr;
    }

    //删除权限
    public function powerDelete($power_id){
        $where="power_id in ($power_id)";
        $arr=$this->db->delete('power',$where);
    }

    //权限列表分页
    function getList($page){
        $start = ($page-1)*$this->pagesize;
        $sql = "select * from power where 1=1 limit ".$start.",".$this->pagesize;
        $list = $this->db->getAll($sql);
        return $list;
    }

    //获得权限条数
    function getTotal(){
        $sql = "select count(*) from power where 1=1 ";
        return $this->db->getOne($sql);
    }

    //查询修改的权限
    public function editPower($power_id){
		$arr = $this->db->select("power", array('power_id' => $power_id));
        return $arr;
    }

    //修改父级权限
    public function editFatherPower($power_id,$power_name){
        $arr = $this->db->update("power", array('power_name' => $power_name), $condition =array('power_id'=>$power_id));
        return $arr;
    }

    //修改子级权限
    public function editSunpower($power_name,$controller_way,$controller_name,$parent_id,$power_id){
        $arr = $this->db->update("power", array('power_name' => $power_name,'controller_way' => $controller_way,'controller_name' => $controller_name,'parent_id' => $parent_id), $condition =array('power_id'=>$power_id));
        return $arr;
    }

    //查询权限名称
    public function selectPowerName($power_name){
        $sql ="select * from power where power_name like '%$power_name%'";
        return $this->db->getAll($sql);
    }

    //查询子级权限
    public function selectSunPower(){
        $sql ="select * from power where parent_id != 0 ";
        return $this->db->getAll($sql);
    }

    //查看选中父级
    public function checkedPower($p_id){
		$arr = $this->db->select("power", array('parent_id' => $p_id));
        return $arr;
    }

    //查看此角色用户
    public function selectName($role_id){
        $sql ="select username from admin where role_id = $role_id ";
        return $this->db->getAll($sql);
    }

    //添加角色
    public function roleAdd($data){
        $arr = $this->db->insert("role", $data);
        return $arr;
    }

    //查询角色所对应的用户
    public function adminRoleList(){
        $arr = $this->db->select("role");
        return $arr;
    }

    //查询出所有角色
    public function selectRole(){
        $arr = $this->db->select("role");
        return $arr;
    }

    //查询出角色对应的权限
    public function selectPowers($role_id){
		$arr = $this->db->select("role", array('role_id' => $role_id));
        return $arr;
    }

    //查询角色所对应的权限
    public function selectPowerId($role_id){
        $arr = $this->db->select("role", array('role_id' => $role_id));
        return $arr;
    }

    public function selectPower($power_id){
        $sql = "select * from power where power_id in ($power_id);";
        return $this->db->getAll($sql);
    }

    //角色删除
    public function adminRoleDelete($id){
        $arr = $this->db->deletes("role", array('role_id' => $id));
        return $arr;
    }

    //角色批量删除
    public function adminRoleDelall($role_id){
        $where="role_id in ($role_id)";
        $arr=$this->db->delete('role',$where);
    }

    //给角色分配权限
    public function allotPower($role_id,$power_id){
        $arr = $this->db->update("role", array('power_id' => $power_id), $condition =array('role_id'=>$role_id));
        return $arr;
    }

    //查询三级权限
    public function selectSunPowers($ids){
        $sql = "select * from power where parent_id in ($ids)";
        return $this->db->getAll($sql);
    }

	//模块名称处理
    public function all(){
        $remark = array(
            'fatherPower' => '添加父级权限',
            'sunPower' => '添加子级权限',
			'powerDelete' => '权限删除',
			'editPower' => '权限编辑',
			'editFatherPower' => '修改父级权限',
			'editSunPower' => '修改子级权限',
			'rolenameAdd' => '添加角色',
			'roleAdd' => '添加角色名称',
			'adminRoleDelete' => '角色删除',
			'adminRoleDelall' => '角色批量删除',
			'allotPower' => '给角色分配权限',
        );
        return $remark;
    }

	//添加操作日志管理
	public function addOperation($remark,$user_id){
		$data =  array();
        $data['handle_type'] = $remark;
        $data['user_id'] = $user_id;
        $data['handle_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['handle_time'] = date('Y-m-d H:i:s',time());
        $sql = "select * from power order by power_id desc limit 1";
        $result = $this->db->getAll($sql);
        $data['handle_id'] = $result[0]['power_id'];
        $arr = $this->db->insert("log", $data);
        return $arr;
	}

	//角色操作日志管理
	public function roleAddOperation($remark,$user_id){
		$data =  array();
        $data['handle_type'] = $remark;
        $data['user_id'] = $user_id;
        $data['handle_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['handle_time'] = date('Y-m-d H:i:s',time());
        $sql = "select * from role order by role_id desc limit 1";
        $result = $this->db->getAll($sql);
        $data['handle_id'] = $result[0]['role_id'];
        $arr = $this->db->insert("log", $data);
        return $arr;
	}

	//删除修改操作日志管理
	public function deleteOperation($remark,$user_id,$handle_id){
		$data =  array();
        $data['handle_type'] = $remark;
        $data['user_id'] = $user_id;
        $data['handle_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['handle_time'] = date('Y-m-d H:i:s',time());
		$data['handle_id'] = $handle_id;
		$arr = $this->db->insert("log", $data);
        return $arr;
	}
}

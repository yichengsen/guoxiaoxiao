<?php
/*
	类名：position
	管理：职位管理
*/
class positionController extends baseController {
	static $operationTrue = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>恭喜你，操作成功!</div>";
	static $operationFalse = "<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>对不起,操作失败!</div>";

	//职位添加页面
	public function positionAdd(){
		$this->display('position-add.html');
	}

	//职位添加
	public function positionAdds(){
		$data['position_name'] = $_POST['position_name'];
		$data['position_work_age'] = $_POST['position_work_age'];
		$data['position_salary'] = $_POST['position_salary'];
		$data['position_degree'] = $_POST['position_degree'];
		$data['position_welfare'] = $_POST['position_welfare'];
		$data['position_describe'] = $_POST['position_describe'];
		$data['position_condition'] = $_POST['position_condition'];
		$data['position_sex'] = $_POST['position_sex'];
		$model = new positionModel();
		$flag = $model->positionAdds($data);
		if($flag){

			echo self :: $operationTrue;
			echo "<script>location.href='position.php?c=position&a=positionList';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='position.php?c=position&a=positionList';</script>";
		}
	}

	//职位列表
	public function positionList(){
		if(isset($_GET["page"])){
			$page = intval($_GET['page']);
		}else{
			$page = 1;
		}

		$model = new positionModel();
		@$position_name = $_POST['position_name'];
		if($position_name!=''){
			$list = $model->getLists($position_name,$page);
			$total = $model->getTotals($position_name);
		}else{
			$list = $model->getList($page);
			$total = $model->getTotal();
		}
		$page = new pageLibrary($total,$model->pagesize);
		//职位列表数据
		$this->assign('data',$list);
		//职位列表总条数
		$this->assign('total',$total);
		//分页显示
		$this->assign("page",$page->showpage());
		$this->display('position-list.html');
	}

	//职位列表删除
	public function positionDelete(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new positionModel();
		$flag = $model->positionDelete($id);
		if($flag){
			$return["code"] = 1;
		}else{
			
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}

	//职位列表编辑修改页面
	public function positionEdit(){
		$p_id = $_GET['p_id'];
		$model = new positionModel($p_id);
		$data = $model->selectPosition($p_id);
		$this->assign('data',$data);
		$this->display("position-edit.html");
	}

	//职位列表编辑修改
	public function positionEdits(){
		$p_id = $_POST['p_id'];
		$position_name = $_POST['position_name'];
		$position_work_age = $_POST['position__work_age'];
		$position_salary = $_POST['position_salary'];
		$position_degree = $_POST['position_degree'];
		$position_welfare = $_POST['position_welfare'];
		$position_describe = $_POST['position_describe'];
		$position_condition = $_POST['position_condition'];
		$position_sex = $_POST['position_sex'];
		$model = new positionModel();
		$flag = $model->positionEdits($p_id,$position_name,$position_work_age,$position_salary,$position_degree,$position_welfare,$position_describe,$position_condition,$position_sex);
		if($flag){
			echo self :: $operationTrue;
			echo "<script>location.href='position.php?c=position&a=positionList';</script>";
		}else{
			echo self :: $operationFalse;
			echo "<script>location.href='position.php?c=position&a=positionEdit';</script>";
		}
	}

	//职位批量删除
	public function positionDelall(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new positionModel();
		$flag = $model->positionDelall($id);
		if(!$flag){
			$return["code"] = 1;
		}else{
			
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}
}
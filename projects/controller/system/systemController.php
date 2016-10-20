<?php
class systemController extends baseController {
	
	//日志列表
	public function logList(){
		$model = new systemModel();
		$data = $model->logList();
		$this->assign('data',$data);
		$this->display('log-list.html');
	}

	//日志删除
	public function logDelete(){
			$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new systemModel();
		$flag = $model->logDelete($id);
		if($flag){
			$return["code"] = 1;
		}else{
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);	
	}

	//管理员批量删除
	public function logDelall(){
		$return = array(
			"code"=>1,
			"message"=>"",
			"data"=>""
		);
		$id = $_POST['id'];
		$model = new systemModel();
		$flag = $model->logDelall($id);
		if(!$flag){
			$return["code"] = 1;
		}else{		
			$return["code"] = -1;
			$return["message"] = "删除失败";
		}
		echo json_encode($return);
	}
}
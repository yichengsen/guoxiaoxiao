<?php
class picController extends baseController {

		static $operationTrue="<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>恭喜你，成功!</div>";
	static $operationFalse="<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>对不起,失败!</div>";

		//轮播图添加
		public function picAdd(){
			$this->display('pic_add.html');
		}

		//轮播图添加
		public function picAdds(){
			//print_r($_FILES["img"]);die;
			if (!empty($_FILES["img"]["name"])) { //提取文件域内容名称，并判断
			$path="./img/uppic/"; //上传路径
			if(!file_exists($path))
			{
			//检查是否有该文件夹，如果没有就创建，并给予最高权限
			mkdir("$path", 0700);
			}//END IF
			//允许上传的文件格式
			$tp = array("image/gif","image/pjpeg","image/jpeg");
			//检查上传文件是否在允许上传的类型
			if(!in_array($_FILES["img"]["type"],$tp))
			{
			echo "<script>alert('格式不对');history.go(-1);</script>";
			exit;
			}//END IF
			$filetype = $_FILES['img']['type'];
			if($filetype == 'image/jpeg'){
			$type = '.jpg';
			}
			if ($filetype == 'image/jpg') {
			$type = '.jpg';
			}
			if ($filetype == 'image/pjpeg') {
			$type = '.jpg';
			}
			if($filetype == 'image/gif'){
			$type = '.gif';
			}
			if($_FILES["img"]["name"])
			{
			$today=date("YmdHis"); //获取时间并赋值给变量
			$file2 = $path.$today.$type; //图片的完整路径
			$img = $today.$type; //图片名称
			$flag=1;
			}//END IF
			if($flag) $result=move_uploaded_file($_FILES["img"]["tmp_name"],$file2);
			//特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件
			}
			$data['img_name'] = $img;
			$model = new picModel();
			$flag = $model->picAdds($data);
			if($flag){
				echo self :: $operationTrue;
				echo "<script>location.href='pic.php?c=pic&a=picList';</script>";
			}else{
				echo self :: $operationFalse;
				echo "<script>location.href='pic.php?c=pic&a=picList';</script>";
			}
		}

		//轮播图列表
		public function picList(){
			
		}
}
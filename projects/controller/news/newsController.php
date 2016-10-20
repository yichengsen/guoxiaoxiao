<?php
class newsController extends baseController {

	static $operationTrue="<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>恭喜你，成功!</div>";
	static $operationFalse="<div id='div_test' style='display:block;color:white;line-height:25px;position:absolute;z-index:100;left:50%;top:2%;margin-left:-75px;text-align:center;width:150px;height:25px;background-color:green;font-size:12px;'>对不起,失败!</div>";

	//新闻添加
	public function newsAdd(){
		$model = new newsModel();
		$url = 'http://cic.isc.org.cn/';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);//设定是否输出页面内容
		$str = curl_exec($curl);
		//echo $str;die;
		$reg = '#<ul class="word_list">.*</ul>#isU';
		preg_match($reg,$str,$arr);
		//print_r($arr);die;
	
		$reg2 = '#<li><a href="(.*)" target="_blank">(.*)</a><span>(.*)</span></li>#isU';
		preg_match_all($reg2,$arr[0],$arr1);
		//获取内容和图片
		$arr_con = '';
		foreach($arr1[1] as $key=>$val)
		{
			$str = file_get_contents('http://cic.isc.org.cn'.$val);
			$reg='#<div class="xzhd_word">.*</div>#isU';
			preg_match($reg,$str,$arr);
			$arr_con[$key] = $arr[0];
			$reg2='#src="(.*)"#isU';
			preg_match_all($reg2,$arr[0],$arr_img);
			foreach($arr_img[1] as $key=>$val)
			{
				$img = file_get_contents('http://cic.isc.org.cn'.$val);
				$file_name = substr($val,1,strrpos($val,'/'));
				if(!is_dir($file_name))
				{
					mkdir($file_name,0777,true);
				}
				file_put_contents(substr($val,1),$img);
			}
		}
		$array = array('title'=>$arr1[2],'link'=>$arr1[1],'time'=>$arr1[3],'content'=>$arr_con);
		//取时间[]
		foreach($array['time'] as $key=>$val)
		{
			$array['time'][$key] = trim(trim($val,'['),']');
		}
		//取标题、链接、时间、内容
		foreach($array['title'] as $key => $value)
		{
			$data['title'] = $array['title'][$key];
			$data['link']  = $array['link'][$key];
			$data['time']  = $array['time'][$key];
			$data['content'] = $array['content'][$key];
			$flag = $model->newsAdd($data);
		}
	}

	//新闻列表
	public function newsList(){
		$model = new newsModel();
		$data = $model->selectNews();
		echo $data[0]['content'];
	}
}
?>
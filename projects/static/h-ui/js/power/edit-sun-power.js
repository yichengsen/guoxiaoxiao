/*验证子级*/
	//验证英文名称
	function check_way(){
		var name=/^[A-Za-z]+$/
		var controller_way = document.getElementById('controller_way').value;
		if(controller_way!=''){
			if(name.test(controller_way)){
				document.getElementById('s_controllerway').innerHTML="*正确";
				return true;
			}else{
				document.getElementById('s_controllerway').innerHTML="*必须是全英文";
				return false;
			}
		}else{
			document.getElementById('s_controllerway').innerHTML="*英文名称不能为空";
			return false;
		}
	}
	//验证子类名称
	function check_sunname(){
		var power_names = document.getElementById('power_names').value;
		if(power_names!=''){	
			document.getElementById('s_powernames').innerHTML="*正确";
			return true;
		}else{
			document.getElementById('s_powernames').innerHTML="*子类名称不能为空";
			return false;
		}
	}
	function check_alls(){
		if(check_way() & check_sunname()){
			return true;
		}return false;
	}
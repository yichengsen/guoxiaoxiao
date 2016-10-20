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
	/*验证父级权限*/
	//验证权限名称
	function check_powername(){
		var power_name = document.getElementById('power_name').value;
		if(power_name!=''){	
			document.getElementById('s_powername').innerHTML="*正确";
			return true;
		}else{
			document.getElementById('s_powername').innerHTML="*权限名称不能为空";
			return false;
		}
	}
	//验证控制器名称
	function check_controllername(){
		var name=/^[A-Za-z]+$/
		var controller_name = document.getElementById('controller_name').value;
		if(controller_name!=''){
			if(name.test(controller_name)){
				document.getElementById('s_controllername').innerHTML="*正确";
				return true;
			}else{
				document.getElementById('s_controllername').innerHTML="*必须是全英文";
				return false;
			}
		}else{
			document.getElementById('s_controllername').innerHTML="*控制器名称不能为空";
			return false;
		}
	}

	//验证所有
	function check_all(){
		if(check_powername() & check_controllername()){
			return true;
		}return false;
	}

	//控制父级
    function dis_child(){
        document.getElementById('child').style.display='block';
        document.getElementById('parent').style.display='none';
    }
	//控制子级
    function dis_parent(){
        document.getElementById('child').style.display='none';
        document.getElementById('parent').style.display='block';
    }
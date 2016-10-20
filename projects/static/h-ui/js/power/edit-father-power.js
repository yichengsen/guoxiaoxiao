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
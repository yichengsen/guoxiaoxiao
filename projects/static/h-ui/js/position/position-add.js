function check_name(){
		if($("#position_name").val()==""){
			$("#s_position_name").html("<b>Please input correct figures</b>");
			return false;
	    }else{
			$("#s_position_name").html("<b>ok</b>");
			return true;
		}
	}
	function check_age(){
		if($("#position_work_age").val()==""){
			$("#s_position_work_age").html("<b>Please input correct figures</b>");
			return false;
	    }else{
			$("#s_position_work_age").html("<b>ok</b>");
			return true;
		}
	}
	function check_salary(){
		if($("#position_salary").val()==""){
			$("#s_position_salary").html("<b>Please input correct figures</b>");
			return false;
	    }else{
			$("#s_position_salary").html("<b>ok</b>");
			return true;
		}
	}
	function check_welfare(){
		if($("#position_welfare").val()==""){
			$("#s_position_welfare").html("<b>Please input correct figures</b>");
			return false;
	    }else{
			$("#s_position_welfare").html("<b>ok</b>");
			return true;
		}
	}
	function check_describe(){
		if($("#position_describe").val()==""){
			$("#s_position_describe").html("<b>Please input correct figures</b>");
			return false;
	    }else{
			$("#s_position_describe").html("<b>ok</b>");
			return true;
		}
	}
	function checkall(){
		if(check_name()&check_age()&check_salary()&check_welfare()&check_describe()){
			return true;
		}return false;
	}
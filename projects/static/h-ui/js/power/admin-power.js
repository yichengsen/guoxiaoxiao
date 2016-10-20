/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/

/*管理员-权限-添加*/
function admin_permission_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-权限-编辑*/
function admin_permission_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-权限-删除*/
function admin_permission_del(obj,id){
	//alert(id);
	layer.confirm('权限删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
		   type: "POST",
		   url: "power.php?c=power&&a=powerDelete",
		   data: "power_id="+id,
		   success: function(msg){
			  // alert(msg);
			 if(msg==1){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{ icon:1,time:1000} );
			 }else if(msg==2){
				layer.msg('请先删除子级权限!',{ icon:1,time:1000} );
			 }else{
				layer.msg('删除失败!',{ icon:1,time:1000} );
			 }
		   }
		} );
	} );
}

/*管理员-权限-搜索*/
function selectPowerName(){
	var power_name = document.getElementById("power_name").value;
	//alert(power_name);
	$.ajax({
		   type: "POST",
		   url: "power.php?c=power&&a=gaga",
		   data: "power_name="+power_name,
		   success: function(msg){
			 alert(msg);
		   }
		} );
}
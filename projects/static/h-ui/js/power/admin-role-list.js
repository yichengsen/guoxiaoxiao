//批量删除
function adminRoleDelall(){
        var name=document.getElementsByName('ids');
        var str='';
        for(var i=0;i<name.length;i++){
            if(name[i].checked){
                str+=name[i].value+',';
            }
        }
        str=str.substring(0,str.length-1);
		$.ajax({
		   type: "POST",
		   url: "power.php?c=power&&a=adminRoleDelall",
		   data: "role_id="+str,
		   dataType:"json",
		   success: function(obj){
			 if(obj.code==1){
				for(var i=name.length-1;i>=0;i--){
							if(name[i].checked){
								name[i].parentNode.parentNode.parentNode.removeChild(name[i].parentNode.parentNode);
							}
						}	 
			 }else{
				alert(obj.message);
			 }
		   }
		});
    }
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
    layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        $.ajax({
            type: "POST",
            url: "power.php?c=power&&a=adminRoleDelete",
            data: "id="+id,
            dataType:"json",
            success: function(msg){
                if(msg.code==1){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{ icon:1,time:1000} );
                }else{
                    layer.msg('删除失败!',{ icon:1,time:1000} );
                }
            }
        } );
    });
}
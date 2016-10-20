//状态的修改
    function userStatus(obj){
        ids=obj.id;
        //alert(ids);
       var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
				//alert(ajax.responseText);
                if(ajax.responseText==1){
                    obj.parentNode.innerHTML="<a href='javascript:void(0)' id='"+ids+"' onclick='userStatus(this)'>"+"<span class='label label-success radius' id='lock'>已启用</span>"+"</a>";

                }else if(ajax.responseText==2){
                    obj.parentNode.innerHTML="<a href='javascript:void(0)' id='"+ids+"' onclick='userStatus(this)'>"+"<span class='label label-success radius' id='lock'>已停用</span>"+"</a>";
                }else{
                  alert('修改失败');
                }
            }
        }
        ajax.open('post','admin.php?c=admin&&a=adminStops',true);
        ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        ajax.send('id='+ids);
    }
//即点即改
    function change_name(obj){
        $("#i"+obj.id).show();
        $("#s"+obj.id).hide();
        $("#i"+obj.id).focus();
    }
    //修改
    function dian(id){
        var keys=$("#i"+id).val();

        if(keys==""){
            alert('请输入修改内容');
        }else {
            // alert(keys);
            $.ajax({
                type: "POST",
                url: "admin.php?c=admin&&a=changeName",
                data: "keys=" + keys + "&id=" + id,
				dataType:"json",
                success: function (obj) {
                    // alert(e)
                    if (obj.code == 1) {
                        //alert("修改成功");
                        $("#i" + id).hide();
                        $("#s" + id).show();
                        $("#s" + id).html(keys);
                        // $("#i" + obj.id).focus();
                    } else {
                        //alert("修改失败");
                        $("#i" + id).hide();
                        $("#s" + id).show();
                        $("#i" + obj.id).focus();
                    }
                }
            });
        }
    }
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	//alert(id);
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
		   type: "POST",
		   url: "admin.php?c=admin&&a=adminDelete",
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
		});
	});	
}
/*管理员批量删除*/
function adminDelall(){
        var name=document.getElementsByName('ids');
        var str='';
        for(var i=0;i<name.length;i++){
            if(name[i].checked){
                str+=name[i].value+',';
            }
        }
        str=str.substring(0,str.length-1);
        //alert(str);
		$.ajax({
		   type: "POST",
		   url: "admin.php?c=admin&&a=adminDelall",
		   data: "id="+str,
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

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
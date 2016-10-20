 function checkedPower(obj){
        var id=obj.id;
        var p_id=$('#'+id).val();
        $.ajax({
            type: "POST",
            url: "power.php?c=power&&a=checkedPower",
            data: "p_id="+p_id,
            dataType:"json",
            success: function(msg){
                var p_id=msg;
                if(obj.checked){
                    for(var i=0;i<p_id.length;i++){
                        // alert(p_id.length);
                        $("#"+p_id[i]).prop("checked",true);
                    }
                }else{
                    for(var i=0;i<p_id.length;i++){
                        // alert(p_id.length);
                        $("#"+p_id[i]).prop("checked",false);
                    }
                }
            }
        });
    }
    //默认选中
    function selectRole(){
        $(":checkbox").prop("checked",false);
        var r_id=document.getElementById('r_id').value;
        $.ajax({
            type: "POST",
            url: "power.php?c=power&&a=selectPowers",
            data: "role_id="+r_id,
            dataType:"json",
            success: function(msg){
                var p_id=msg;
                for(var i=0;i<p_id.length;i++){
                    //alert(p_id.length);
                    $("#"+p_id[i]).prop("checked",true);
                }
            }
        });
    }
<link rel="stylesheet" href="<?php echo static_url('theme/admin/css/password.css')?>" />
<?php 
echo ace_header('用户',$item->agentid);

echo ace_form_open('','',array('id'=>$item->agentid));

	$options = array(
			'label_text'=>'代理编号',
			'datatype'=>'*',
			'nullmsg'=>"请输入代理编号！",
			'errormsg'=>"请输入代理编号",
			'help'=>'代理登录后台的用户号'
	);
	echo ace_input_m($options ,'agentid',$item->agentid,'maxlength="45" id="agentid"');
	
	$options = array(
	        'label_text'=>'代理全称',
					'datatype'=>'*',
					'nullmsg'=>"请输入代理编号！",
					'errormsg'=>"请输入代理编号",
	        'help'=>'代理全称'
	);
	echo ace_input_m($options,'agentname',$item->agentname,'maxlength="45" id="agentname"');
	$options = array(
	        'label_text'=>'代理简称',
					'datatype'=>'*',
					'nullmsg'=>"请输入代理编号！",
					'errormsg'=>"请输入代理编号",
	        'help'=>'代理简称'
	);
	echo ace_input_m($options,'shortname',$item->shortname,'maxlength="45" id="shortname"');
	
	if(!$item->agentid){
		$options = array('label_text'=>'密码','datatype'=>'pwd','help'=>lang('pwd_help_msg'),'errormsg'=>lang('pwd_help_msg'));
		echo ace_password($options, array('id'=>'q_password1','name'=>'password'));
	}
	$options = array(
	        'label_text'=>'手机号',
					'datatype'=>'*11-11',
					'nullmsg'=>"请输入手机号！",
					'errormsg'=>"请输入手机号",
	        'help'=>'代理联系人手机号'
	);
	echo ace_input_m($options,'mobilenum',$item->mobilenum,'maxlength="11"');
	$options = array(
	        'label_text'=>'联系人',
					'datatype'=>'*1-15',
					'nullmsg'=>"请输入联系人！",
					'errormsg'=>"请输入联系人",
	        'help'=>'联系人'
	);
	echo ace_input_m($options,'contact',$item->contact,'maxlength="15"');

	$options = array(
	        'label_text'=>'QQ',
	        'help'=>'代理联系人的QQ'
	);
	echo ace_input($options,'qq',$item->qq,'maxlength="45"');
	
  	echo ace_srbtn('agent/agent',false);
  echo ace_form_close()
?>
<script type="text/javascript">
    $(function(){

        $("input[type=password]").closest(".col-sm-5").addClass('col-sm-4').removeClass('col-sm-5');
        var qd_html = '<div class="passwordStrength"><b>密码强度：</b> <span class="">弱</span><span class="">中</span><span class="last">强</span></div>';

        $("#q_password1").closest('span').after(qd_html);
        
        $("#agentname").change(function(){
            
            agentname = $("#agentname").val();
            
            if(agentname !=""){
                $.post("<?php echo admin_base_url('agent/agent/ajaxName')?>",
                   { agentname: agentname }	,
                   function(data){
                       result = eval(data);
                       if(result.status == 1){
                           $("#agentname").val("");
                           $("#agentname").focus();
                            layer.alert(result.info);
                       }
                    },"json"	
                );	
            } 	
        });
        $("#shortname").change(function(){
            
            agentshort = $("#shortname").val();
            
            if(agentshort !=""){
                $.post("<?php echo admin_base_url('agent/agent/ajaxShort')?>",
                   { agentshort: agentshort }	,
                   function(data){
                       result = eval(data);
                       if(result.status == 1){
                           $("#shortname").val("");
                           $("#shortname").focus();
                            layer.alert(result.info);
                       }
                    },"json"	
                );	
            } 	
        });
        $("#agentid").change(function(){
            
            agentid = $("#agentid").val();
            
            if(agentid !=""){
                $.post("<?php echo admin_base_url('agent/agent/ajaxId')?>",
                   { agentid: agentid }	,
                   function(data){
                       result = eval(data);
                       if(result.status == 1){
                           $("#agentid").val("");
                           $("#agentid").focus();
                            layer.alert(result.info);
                       }
                    },"json"	
                );	
            } 	
        });
    });
</script>

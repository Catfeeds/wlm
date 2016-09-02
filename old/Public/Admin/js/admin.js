function insert_check(){
	var name=$("#name").val();
	if(name == ''){
		layer.alert('请填写账号！',8);return false;
	}
	var pwd=$("#pwd").val();
	if(pwd == ''){
		layer.alert('请填写密码！',8);return false;
	}
	return true;
}

function edit_check(){
	var name=$("#name").val();
	if(name == ''){
		layer.alert('请填写账号！',8);return false;
	}
	return true;
}

$(function(){
	$('.del').click(function(e) {
	     var url = this;  
	     layer.confirm('确定要删除吗?数据删除后不可恢复，请谨慎操作！',function(){
	    	 location.href=url;
	     },e.preventDefault());
	     
	});
});

function pwd_check(){
	var pwd=$("#pwd").val();
	if(pwd == ''){
		layer.alert('请填写新密码！',8);return false;
	}
	var repwd=$("#repwd").val();
	if(repwd == ''){
		layer.alert('请重复新密码！',8);return false;
	}
	if(pwd != repwd){
		layer.alert('两次密码不一至！',8);return false;
	}
	return true;
}
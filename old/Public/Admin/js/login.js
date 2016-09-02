function check(){
	var username=$('#username').val();
	if(username == ''){
		layer.alert('请填写登录名',8);return false;
	}
	var password=$('#password').val();
	if(password == ''){
		layer.alert('请填写登录密码',8);return false;
	}
	return true;
}
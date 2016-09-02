// JavaScript Document
function login(){
	var url = $('#loginURL').val();
	var indexURL = $('#indexURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:$('#loginForm').serialize(),
		success:function(data){
			if(data == '0'){
				window.location.href = indexURL;
			}
			else if(data == '1'){
				layer.tips('用户名不存在', '#username');
			}
			else if(data == '2'){
				layer.tips('用户名和密码不匹配', '#password');
			}
		}
	});
}

function reload_s(){
	location.reload();
}
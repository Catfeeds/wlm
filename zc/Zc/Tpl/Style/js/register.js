// JavaScript Document
function sendCode(){
	var codeURL = $('#codeURL').val();
	$.ajax({
		type:"POST",
		url:codeURL,
		data:"telphone="+$('#user_name').val(),
		success:function(data){
			if(data == '0'){
				//layer.msg('发送成功', {shift: 6});
				$('#button_code').attr('disabled','disabled');
				code_time();
			}
			else if(data == '1'){
				$('#button_code').attr('disabled','');
				layer.alert('发送失败');
			}
			else if(data == '2'){
				layer.alert('验证码有误');
			} 
		}
	});
}

var time=30;
var button_time;
var button_text = "重新发送验证码";
function code_time(){
	if(time > 0){
		$('#button_code').html(time);
		time --;
		button_time = setTimeout('code_time()',1000);
	}
	else{
		clearTimeout(button_time);
		$('#button_code').html(button_text);
		$('#button_code').attr('disabled',false);
	}
}

function register(){
	var url = $('#insURL').val();
	var indexURL = $('#indexURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:$('#register').serialize(),
		success:function(data){
			if(data == '0'){
				window.location.href=indexURL;
			}
			else if(data == '1'){
				layer.alert('注册失败',5);
			}
		}
	});
}
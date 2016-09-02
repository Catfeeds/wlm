// JavaScript Document
function showLeftMenu(){
	var menuLeft = document.getElementById('menu_left'),
		bodys = document.body;
	classie.toggle( bodys, 'cbp-spmenu-push-toright' );
	classie.toggle( menuLeft, 'cbp-spmenu-open' );
}
	
function showTopMenu(){
	var menuTop = document.getElementById('menu_top');
	classie.toggle( menuTop, 'cbp-spmenu-open' );
}

function dofoucs(deal_id){
	var url = $('#fouceURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:"deal_id="+deal_id,
		success:function(data){
			if(data == '1' || data == '2'){
				alert('关注失败');
			}
			else{
				var obj = eval(data);
				var result = obj.result;
				var count = obj.count;
				if(result == '0'){
					$('#foucs1').attr('class','button icon-heart bg-gray button-big');
					$('#foucs1').text('取消关注('+count+')');
					$('#foucs2').text('取消关注('+count+')');
				}
				else if(result == '3'){
					$('#foucs1').attr('class','button icon-heart bg-dot button-big');
					$('#foucs1').text('关注('+count+')');
					$('#foucs2').text('关注('+count+')');
				}
			}
			
		}
	});
}

function incar(deal_id){
	var carURL = $('#carURL').val();
	$.ajax({
		type:"POST",
		url:carURL,
		data:"deal_id="+deal_id,
		success:function(data){
			if(data == 0){
				layer.msg('购物车+1',{icon:1});
				$('#incar').attr('disabled','disabled');
			}
			else if(data == 1){
				layer.msg('未成功',{icon:5});
			}
			else if(data == 2){
				window.location.href= $('#loginURL').val();
			}
			else if(data == 3){
				layer.msg('该商品在购物车中存在',{icon:3});
			}
		}
	});
}

function delcar(deal_id){
	var url = $('#delURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:"deal_id="+deal_id,
		success:function(data){
			if(data == '0'){
				$('#'+deal_id+'_pro').attr('class','media media-x fadeout');
				setTimeout('location.reload();',2000);
			}
			else if(data == '1'){
				window.location.href= $('#loginURL').val();
			}
		}
	});
}

var time=60;
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


function sendCode_pass(){
	var codeURL = $('#codeURL').val();
	$.ajax({
		type:"POST",
		url:codeURL,
		data:"telphone="+$('#login_login').val(),
		success:function(data){
			if(data == '0'){
				//layer.msg('发送成功', {shift: 6});
				$('#button_code').attr('disabled','disabled');
				code_time();
				$('#password').attr('disabled',false);
				$('#repassword').attr('disabled',false);
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

function changePass(){
	var url = $('#changeURL').val();
	var loginurl = $('#loginURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:"code="+$('#code').val()+"&telphone="+$('#login_login').val()+"&password="+$('#repassword').val(),
		success:function(data){
			if(data == '0'){
				layer.alert('密码修改成功', {icon: 1});
				setTimeout("window.location.href='"+loginurl+"'",3000);
				
			}
			else if(data == '1'){
				layer.msg('验证码有误');
			}
			else if(data == '2'){
				layer.msg('用户不存在');
			}
			else{
				layer.msg('修改失败');
			}
		}
	});
}

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
		time = 60;
	}
	
}

function register(){
	var url = $('#regURL').val();
	var indexURL = $('#indexURL').val();
	$.ajax({
		type:"POST",
		url:url,
		data:$('#register_form').serialize(),
		success:function(data){
			if(data == '0'){
				window.location.href=indexURL;
			}
			else if(data == '1'){
				layer.alert('注册失败',5);
			}
			else if(data == '2'){
				layer.alert('该用户已存在',5);
			}
		}
	});
}
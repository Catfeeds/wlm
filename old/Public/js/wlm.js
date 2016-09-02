// JavaScript Document
//刷新验证码
function replaceVerify(){
	var verifyURL = $("#image_verify").attr("ch");
	//var verifyURL = document.getElementById("hidden_verifyurl").value;
	var timenow = new Date().getTime();
	var url = verifyURL.substring(0,verifyURL.length-5);
	$('#image_verify').attr("src",url+"/time/"+timenow+".html");
}

function checkUsername(){
	var username = $('#username').val();
	var reg = /^[a-zA-Z0-9_]{3,16}$/ ;
	if(username == ''){
		layer.tips('用户名不可为空', '#username' , {guide: 1, time: 2});
		return false;
	}
	else if(!reg.test(username)){
		layer.tips('用户名由数字、字母和"_"组成，且在3~16位之间', '#username' , {guide: 1, time: 2});
		return false;
	}
	else{
		return true;
	}
}

function checkPassword(){
	var password = $('#password').val();
	var length = password.length;
	if(length == 0){
		layer.tips('密码不可为空', '#password' , {guide: 1, time: 2});
		return false;
	}
	else if(length < 8 || length > 20){
		layer.tips('密码在8~20位之间', '#password' , {guide: 1, time: 2});
		return false;
	}
	else{
		return true;
	}
}

function checkRepassword(){
	var password = $('#password').val();
	var repassword = $('#repassword').val();
	if(repassword != password){
		layer.tips('两次密码输入不一致', '#repassword' , {guide: 1, time: 2});
		return false;
	}
	else{
		return true;
	}
}

function checkVerify(){
	var verifyURL = $('#verifyURL').val();
	var regURL = $('#regURL').val();
	var indexURL = $('#indexURL').val();
	var verifycode = $('#verify').val();
	if(verifycode == ""){
		layer.tips('验证码不可为空', '#verify' , {guide: 1, time: 2});
		return false;
	}
	else{
		$.ajax({
			type:"POST",
			url:verifyURL,
			data:"verify="+verifycode,
			success:function(data){
				if(data == "1"){
					layer.tips('验证码有误', '#verify' , {guide: 1, time: 2});
				}
				else if(data == "0"){
					if(checkUsername() && checkPassword() && checkRepassword()){
						$.ajax({
							type:"post",
							url:regURL,
							data:$('#registerform').serialize(),
							success:function(data){
								if(data == '0'){
									location.href = indexURL;
								}
								else if(data == '1'){
									layer.alert('用户名已存在',8);
								}
								else if(data == '2'){
									layer.alert('注册失败',8);
								}
								else if(data == '3'){
									layer.alert('手机号已被注册',8);
								}
							}
						});
					}
				}
			}
		});
	}
}
 //登录
function doLogin(){
	var explorer = window.navigator.userAgent ;
	
	var indexURL = $('#indexURL').val();
	var loginURL = $('#loginURL').val();
	var personURL = $('#personURL').val();
	
	$.ajax({
		type:"POST",
		url:loginURL,
		data:$('#loginform').serialize(),
		success :function(data){
			if(data == "0"){
				if (explorer.indexOf("QQBrowser") >= 0) {
					document.getElementById("person").click();
					window.open('','_top'); 
					window.top.close();
				}
				else{
					window.location.href = personURL;
				}
			}
			else if(data == "1"){
				layer.tips('用户名不存在', '#d3JndY' , {guide: 1, time: 2});
			}
			else if(data == "2"){
				layer.tips('用户名和密码不匹配', '#R4M7Rp' , {guide: 1, time: 2});
			}
		}
	});
}
//获取city
function getCity(){
	var cityURL = $('#cityURL').val();
	var prov_select = $('#prov_select').val();
	if(prov_select == '0'){
		$("#city_select").find("option").remove();
		$("#city_select").attr("disabled","disabled");
	}
	else {
		$.ajax({
			type:"GET",
			url:cityURL,
			data:"province_id="+prov_select,
			success:function(data){
				$("#city_select").find("option").remove();
				var option_s = "<option value='0'>请选择</option>";
				$("#city_select").append(option_s);
				var city_array = $.parseJSON(data);
				$.each(city_array,function(i,n){
					var option = "<option value='"+n.id+"'>"+n.name+"</option>"
					$("#city_select").attr("disabled",false);
					$("#city_select").append(option);
				});
			}
		});
	}
}

//ajax提交表单
function doEdit(){
	var editURL = $('#editURL').val();
	var infoURL = $('#infoURL').val();
	
	$.ajax({
		type:"POST",
		url:editURL,
		data :$('#editform').serialize(),
		success:function(data){
			if(data == "0"){
				layer.alert('个人信息修改成功',1);
				setTimeout("location.href='"+infoURL+"'",1400);
			}
			else if(data == "1"){
				layer.alert('个人信息修改失败',8);
			}
		}
	});
}

function getImage(){
	var image = $('#face_hidden_image').val();
	$('#face_text').attr('value',image);
	$('#face_image_submit').click();
}

function uploadFaceRes(src,result){
	if(result == "1"){
		layer.alert('头像上传成功',1);
		$('#face_image').attr('src',src);
	}
	else{
		layer.alert('头像上传失败',8);
	}
}

function addCompanyRes(des,result){
	if(result == '1'){
		layer.alert('公司图片上传失败:'+des,8);
	}
	else if(result == '2'){
		layer.alert('员工不可为空',8);
	}
	else if(result == '0'){
		layer.alert('公司添加成功',1);
	}
	else if(result == '3'){
		layer.alert('公司添加失败',8);
	}
	else if(result == "4"){
		layer.alert('公司名已存在',8);
	}
}

function addInvestRes(des,result){
	if(result == '0'){
		layer.alert('机构添加成功',1);
		history.back();
	}
	else if(result == '1'){
		layer.alert('机构添加失败',8);
	}
	else if(result == "2"){
		layer.alert('机构已存在',8);
		history.back();
	}
}

function checkFile(file){
	var filetype=file.substring(file.lastIndexOf('.')+1,file.length);
	if(filetype != "png" && filetype != "jpg" && filetype != "gif" && filetype != "jpeg"){
		layer.alert('请上传指定类型的图片（png，jpg，gif，jpeg）',8);
		return false;
	}
	return true;
}

function addComment(){
	var commentURL = $('#commentURL').val();
	$.ajax({
		type:"POST",
		url:commentURL,
		data:$('#comment_form').serialize(),
		success:function(data){
			if(data == '0'){
				alert('评论成功',1);
				$('#comment_content').val('');
			}
			else if(data == '1'){
				alert('评论失败',8);
			}
		}
	});
}
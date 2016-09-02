function system_check(){
	var webname=$('#webname').val();
	if(webname == ''){
		layer.alert('请填写站点标题！',8);return false;
	}
	var home=$('#home').val();
	if(home == ''){
		layer.alert('请填写站点域名！',8);return false;
	}
	var keywords=$('#keywords').val();
	if(keywords == ''){
		layer.alert('请填写站点关键字，有利于SEO！',8);return false;
	}
	var intro=$('#intro').val();
	if(intro == ''){
		layer.alert('请填写站点描述，有利于SEO！',8);return false;
	}
	var email=$('#email').val();
	if(email == ''){
		layer.alert('请填写网站联系邮箱！',8);return false;
	}
	var contact=$('#contact').val();
	if(contact == ''){
		layer.alert('请填写网站联系人！',8);return false;
	}
	var tel=$('#tel').val();
	if(tel == ''){
		layer.alert('请填写联系人电话号码！',8);return false;
	}
	var icp=$('#icp').val();
	if(icp == ''){
		layer.alert('请填写网站备案号！',8);return false;
	}
	var address=$('#address').val();
	if(address == ''){
		layer.alert('请填写公司地址！',8);return false;
	}
	
	email_re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
	if(!email_re.test(email)){
		layer.alert('邮箱地址不正确！',8);return false;
	}
	
	tel_re = /^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/;
	if(!tel_re.test(tel)){
		layer.alert('联系电话格式不正确！',8);return false;
	}
	return true;
}
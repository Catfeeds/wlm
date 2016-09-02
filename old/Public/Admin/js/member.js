function add_check(){
	var username=$("#username").val();
	if(username == ''){
		layer.alert('请填写账号！',8);return false;
	}
	var email=$("#email").val();
	if(email == ''){
		layer.alert('请填写邮箱！',8);return false;
	}
	var pwd=$("#pwd").val();
	if(pwd == ''){
		layer.alert('请填写密码！',8);return false;
	}
	email_re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
	if(!email_re.test(email)){
		layer.alert('邮箱地址不正确！',8);return false;
	}
	if(pwd.length < 6){
		layer.alert('密码太简单了，请换一个试试！',8);return false;
	}
	if(pwd.length > 15){
		layer.alert('密码太长了，请换一个试试！',8);return false;
	}
	return true;
}

function get_more(id){
	url = url +'&id='+id;
	$.layer({
	    type: 2,
	    shadeClose: false,
	    maxmin: true,
	    title: ['会员详细信息', 'background:#ddd;'] ,
	    closeBtn: [0, true],
	    shade: [0.5, '#000'],
	    border: [0],
	    offset: ['20px',''],
	    area: ['1000px', ($(window).height() - 50) +'px'],
	    iframe: {src:url}
	}); 
}

$(function(){
	$('.del').click(function(e) {
	     var url = this;  
	     layer.confirm('确定要删除吗?数据删除后不可恢复，请谨慎操作！',function(){
	    	 location.href=url;
	     },e.preventDefault());
	     
	});
});
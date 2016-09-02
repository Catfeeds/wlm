function nav_check(){
	var name=$('#name').val();
	if(name == ''){
		layer.alert('请填写导航名称！',8);return false;
	}
	var url=$('#url').val();
	if(url == ''){
		layer.alert('请填写导航地址！',8);return false;
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
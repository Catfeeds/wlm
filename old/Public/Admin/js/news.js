function add_check(){
	var title=$('#title').val();
	if(title == ''){
		layer.alert('请填写新闻标题',8);
		return false;
	}
	var come=$('#come').val();
	if(come == ''){
		layer.alert('请填写新闻来源',8);
		return false;
	}
	var company=$('#company').val();
	if(company == ''){
		layer.alert('请填写公司/机构名称',8);
		return false;
	}
	var title=$('#title').val();
	if(title == ''){
		layer.alert('请填写新闻标题',8);
		return false;
	}
	var title=$('#title').val();
	if(title == ''){
		layer.alert('请填写新闻标题',8);
		return false;
	}
	return true;
}
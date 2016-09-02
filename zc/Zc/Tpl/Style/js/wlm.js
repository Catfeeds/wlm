function dofoucs(deal_id){
	var url = $('#foucs').val();
	//alert(url);
	$.ajax({
		type:"POST",
		url:url,
		data:"deal_id="+deal_id,
		success:function(data){
			if(data == 1){
				alert("感谢您关注我们的项目");
			}else{
				alert("谢谢您");
			}
			
		}
	});
}

function doLike(deal_id){
	var url = $('#like').val();
	//alert(url);
	$.ajax({
		type:"POST",
		url:url,
		data:"id="+deal_id,
		success:function(data){
			//alert(data);
			if(data == 1){
				alert("不可重复哦");
			}else if(data == 2){
				alert("赞+1");
			}
			else{
				alert("谢谢您");
			}
			
		}
	});
}
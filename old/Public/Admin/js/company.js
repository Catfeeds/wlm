$(function(){
	$('.del').click(function(e) {
	     var url = this;  
	     layer.confirm('确定要删除吗?数据删除后不可恢复，请谨慎操作！',function(){
	    	 location.href=url;
	     },e.preventDefault());
	     
	});
	
	$('#province_id').change(function(){
		var pcode = $(this).val();
		$.post(ajaxUrl,{code:pcode},function(data){
			$('#city_id').html(data.msg);
		},'json');
	});
});

function get_more(id){
	url = url +'&id='+id;
	$.layer({
	    type: 2,
	    shadeClose: false,
	    maxmin: true,
	    title: ['机构详细信息', 'background:#ddd;'] ,
	    closeBtn: [0, true],
	    shade: [0.5, '#000'],
	    border: [0],
	    offset: ['20px',''],
	    area: ['1000px', ($(window).height() - 50) +'px'],
	    iframe: {src:url}
	}); 
}
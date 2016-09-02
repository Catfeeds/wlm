$(function(){ 
　　$('#auth_search').click(function(){
        $.post("/index.php?s=/Service/Authorize/search",{data:$('#auth_data').val()},function(data){
            $('#auth_info').html(data.info);
        },'json');
    });
    $('#auth_active').click(function(){
        $.post("/index.php?s=/Service/Authorize/active",$('#auth_activation').serialize(),function(data){
            alert(data.info);
            if(data.status){
                location.reload();
            }
            
        },'json');
    });
}); 

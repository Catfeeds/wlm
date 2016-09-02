/**
 * Created by wangyi9 on 2015/5/1.
 */
$("#uploadMore").click(function(){
    var projectPage= $("#pageNo").val();
    projectPage++;
    loadChooseProduct(projectPage,"/bigger/get_choose_home.action");

});

$(".s-searchbtn").click(function(){
    window.open("bigger/search.html?pageNo=1&keyword="+$(".s-searchkey").val());
});
$(".s-searchkey").keydown(function(event){
    if(event.keyCode==13){
        window.open("bigger/search.html?pageNo=1&keyword="+$(".s-searchkey").val());
    }
});


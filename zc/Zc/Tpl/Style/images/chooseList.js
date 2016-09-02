/**
 * Created by wangyi9 on 2015/5/1.
 */
var chooseList=$(".hob-chooselist").find("li");
chooseList.click(function(){
  /*  $("#probl").attr("class", "s-checked").siblings().attr("class", "s-unchecked");
    $(".select").find(".s-list").stop().slideUp();*/
    $(this).attr("class", "cur").siblings().attr("class", "");
    var chooseId=$(this).attr("code");
    $("#chooseId").val(chooseId);
    $("#infos1" ).html('');
    $("#infos2" ).html('');
    $("#infos3" ).html('');
    $("#infos4" ).html('');
    $("#uploadMore").css("display", "block");
    $("#linkMore").html("“好项目太多啦，选择<a href=''#found'>兴趣点</a>可以帮您更快找到心仪项目哦~”");
    $("#sceneEnd").val(0);
    $("#productEnd").val(0);
    $("#loderPro").val(0);
    $("#pageNo").val(1);
    loadChooseProduct(1,"/bigger/get_choose_home.action");
});
/**
 * Created with IntelliJ IDEA.
 * User: wangyi9
 * Date: 15-5-5
 * Time: 上午1:43
 * To change this template use File | Settings | File Templates.
 */
function zanclick(prodcutId,typeId) {
    var loadUrl = "http://sq.jr.jd.com/cm/praise?key=2000&systemId="+prodcutId+"&callback=?";
    if(typeId==1 || typeId==2 || typeId==3 || typeId==6 || typeId==7){
        loadUrl = "http://sq.jr.jd.com/cm/praise?key=1000&systemId="+prodcutId+"&callback=?";
    }
    var key = JrTools.getCookie('Praise_System_Id_up' + "_" + prodcutId);
    if (key == null || key == undefined || key != "true") {
        jQuery.ajax({
            url: loadUrl, dataType: "jsonp", scriptCharset: "utf-8", success: function (a) {
                if (a == null) {
                    return;
                }
                var up=a["praise"];
                if (up > 10000) {
                    up = parseInt(up / 10000);
                    up = up + '万';
                } else if (up > 1000) {
                    up = parseInt(up / 1000);
                    up = up + '千';
                }
                JrTools.setCookie('Praise_System_Id_up' + "_" + prodcutId, 'true');
                var t = (parseInt($("#support" + prodcutId).position().left) + 10, parseInt($("#support" + prodcutId).position().top) - 10, $("#support" + prodcutId));
                return $("#support" + prodcutId).append('<div class="add"><b>+1</b></div>'), $(".add").css({
                    position: "absolute",
                    "z-index": "100",
                    left: "20px",
                    top: "-20px"
                }), $(".add").animate({left: 0, top: 10, opacity: 0}, 1500, function () {
                    t.find("span").text(up)
                }), $("#support" + prodcutId).addClass("cur"), !1
            }
        });
    } else {
        alert("已点赞！")
        $("#support" + prodcutId).addClass("cur");
    }
}

/**
 * Created by wangyi9 on 2015/4/22.
 */
$(function(){
    jQuery.ajax({
        url: "http://sq.jr.jd.com/notice/getList?key=1000&pageSize=1&channelId=3&callback=?&temp="+new Date().getTime(),
        dataType: "jsonp",
        scriptCharset: "utf-8",
        success: function(a) {
            var projectHtml = "";
            if (a != undefined && a.length > 0) {
                $.each(a, function(index, obj) {
                    var content= obj["noticeTitle"];
                    if( obj["noticeTitle"].length>21){
                        content=obj["noticeTitle"].substring(0,21)+"...";
                    }
                    projectHtml += "<a  href='http://sq.jr.jd.com/notice/detail?noticeId=" + obj["noticeId"] + "'target='_blank' clstag='pageclick|keycount|zc2home_page_201505073|4' title='"+ obj["noticeTitle"]+"'>" + content + "</a>";
                });
                $("#winner").append(projectHtml);
            }
        }
    });
});

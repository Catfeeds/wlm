/**
 *
 *
 * Created by wangyi9 on 2015/4/22.
 */
window.onload=function (){
    jQuery.ajax({
        url: "http://sq.jr.jd.com/notice/detail_json?key=1000&channelId=1",
        dataType: "jsonp",
        scriptCharset: "utf-8",
        success: function (a) {
            if (!(a["noticeTitle"] == null) || !(a["noticeTitle"] == undefined)) {
                var content=a["noticeTitle"];
                if(a["noticeTitle"].length>17){
                    content=a["noticeTitle"].substring(0,17)+"...";
                }
                var html = "<a  target='_blank' clstag='pageclick|keycount|zc2home_page_201505073|3' href='http://sq.jr.jd.com/notice/detail?noticeId="+a["noticeId"]+"' title='"+a["noticeTitle"]+"'>" + content + "</a>";
                html += "<span class='v-line'></span>";
               $("#funad").append(html);
            }
        }
    });
}
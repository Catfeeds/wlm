/**
 * Created by wangyi9 on 2015/4/22.
 */
$(function(){
    jQuery.ajax({
        type: "GET",
        url: "http://z.jd.com/getHotTopicList.action?temp="+new Date().getTime(),
        dataType: "json",
        scriptCharset: "utf-8",
        success: function(a) {
            var hotTopicListHtml = "";
            if (a!=null && a.length > 0) {
                $.each(a, function(index, obj) {
                    if(obj["topicTitle"]!=undefined && obj["topicTitle"]!=""){
                        var content=obj["topicTitle"];
                        if(obj["topicTitle"].length>17){
                            content=obj["topicTitle"].substring(0,17)+"...";
                        }
                        hotTopicListHtml+="<li><a  target='_blank' href='http://z.jd.com/project_details.action?projectId=" + obj["systemId"] + "&topicStatus=" + obj["topicId"] + "' title='"+obj["topicTitle"]+"' clstag='pageclick|keycount|zc2home_page_201505073|5'>"+content+"<span class='nub'>["+obj["replys"]+"评论]</span></a></li>";
                    }
                });
            }
            $("#hotTopic").append(hotTopicListHtml);
        }
    });
});

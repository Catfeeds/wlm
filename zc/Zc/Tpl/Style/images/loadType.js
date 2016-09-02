/**
 * Created by wangyi9 on 2015/5/1.
 */
function gotoDetail(topicId, productId) {
    window.open('/bigger/details/' + productId + '.html?indexTopicId=' + topicId);
}

//获取更多推荐
function getMoreRecommend() {
    var recommends = $("#scene_id").val();
    var i = 1;
    $(".recommend").each(function () {
        recommends += "," + $(this).val();
    });
    //var l = $("#recommend_loading");
    //l.css("display", "block");
    var loadUrl = "/scene/getMoreRecommend.html";
    jQuery.ajax({
        type: "get",
        url: loadUrl,
        data: {'recommends': recommends},
        dataType: "json",
        success: function (data) {
            //l.css("display", "none");
            if (data == null || data == undefined || data == '' || data.targetList.length != 4) {
                //$(".getMoreRecommend").html("<p style='text-align: center;   font-size: 18px; width: 100%; height: 50px;   line-height: 50px; background: #e6e6e6;'>暂无更多推荐</p>");
                $(".getMoreRecommend").css("display", "none");
                //$("#linkMore_recommend").html("“啊哦~，没有更多了，试试其他查找方式吧”");
            }
            if (data && data.targetList.length == 4) {
                pushMoreRecommend(data.targetList);
            }
        },
        error: function (e) {
            //l.css("display", "none");
        }
    });
}

function pushMoreRecommend(dataArr) {
    var html = "";
    //html += " <ul id='test' class='it-fav'>";

    for (var i = 0; i < dataArr.length; i++) {
        var sceneVo = dataArr[i];
        var sceneItemList = sceneVo.sceneItemList;
        html += " <li class='if-list fl pr mr24 mb20 recommend' value='" + sceneVo.scene.id + "'>";
        html += " <a href='/scene/" + sceneVo.scene.id + ".html' class='if-l-L'>";
        html += " <div class='bg-mask-s'></div>";
        html += " <img src='" + sceneVo.scene.sceneImg + "' width='280' height='280'/> ";
        html += "</a>";
        html += "<span class='smll-icons pl-icons'>" + sceneVo.scene.sceneName + "</span>";

        if (sceneItemList != null && sceneItemList != undefined && sceneItemList != '') {
            html += "<ul class='if-list-more'>";
            for (var j = 0; j < sceneItemList.length; j++) {
                var sceneItem = sceneItemList[j];
                html += "<li class='if-lm-list fl'>";
                html += "<a href='" + sceneItem.itemLink + "' class='if-l-S'>";
                html += " <img src='" + sceneItem.itemImg + "' width='90' height='90'/>";
                html += "   </a>";
                html += "  </li>";
            }
            html += " </ul>";
        }
    }
    //html += " </ul>";
    $("#recommendProjects").html(html);
}

function addTopic(type, productId, thisobj) {
    var topicContent = $("#textarea_" + productId).val();
    var len = topicContent.length;
    if (len > 140) {
        alert("输入字符不能超过140字！请重新输入！");
        return;
    }
    if (topicContent != "") {
        var url = "http://sq.jr.jd.com/cm_focus/saveTopic?callback=?";
        var key = 2000;
        if (type == 1 || type == 2 || type == 3 || type == 6) {
            key = 1000;
        }
        jQuery.ajax({
            type: "get",
            url: url,
            data: {key: key, systemId: productId, topicContent: topicContent, temp: new Date().getTime()},
            dataType: "jsonp",
            catch: false,
            success: function (data) {
                $("#stopTopic").remove();
                $(".info").find(".support").css("display", "none");
                $(".info").find(".c-editor").css("display", "none");
                $(".info").find(".c-write").css("display", "none");
                $(".info").find(".c-submit").css("display", "none");
                var html = "";
                if(data["data"]["topicContent"]==null || data["data"]["topicContent"]==undefined){
                       alert('话题保存失败！');
                       return;
                }
                var topicContentt = emoj.change(data["data"]["topicContent"]);
                alert("已发布");
                html += "<div id='stopTopic'>";
                html += "<div class='c-list'>";
                html += "<div class='c-pic'>";
                html += "<img src='' height='34' width='34' name='pinImg'/>";
                html += "<a href=''></a>";
                html += "<span class='c-mask'></span>";
                html += "</div>";
                html += "<div class='c-text'>";
                html += "<span></span>";
                html += "<p>" + topicContentt + "</p>";
                html += "</div></div></div>";
                $('#comments'+productId).append(html);
                getCurrentUser();
                $("img[name='pinImg']").attr("src", $("#login_img").val());
            },
            error: function (e) {
            }
        });

    } else {
        alert("请输入话题内容！")
        return;
    }
}

function loadChooseProduct(pageNo, url) {
    var loadUrl = url;
    var chooseId = $("#chooseId").val();
    var result = 0;
    loadUrl = loadUrl + "?pageNo=" + pageNo + "&sceneEnd=" + $("#sceneEnd").val() + "&productEnd=" + $("#productEnd").val() + "&state=" + $("#state").val() + "&sort=" + $("#sort").val();

    if (chooseId) {
        loadUrl = loadUrl + "&chooseId=" + chooseId;
    }

    jQuery.ajax({
        url: loadUrl, dataType: "json", scriptCharset: "utf", cache: false, async: false, success: function (a) {

            if (a == null || a == undefined || a == '') {
                $("#loderPro").val(0);
                $("#uploadMore").css("display", "none");
                $("#linkMore").html("“啊哦~，没有更多了，试试其他查找方式吧”");
                return 0;
            }
            if (a) {
                $("#pageNo").val(pageNo);
                $("#loderPro").val(1);
                waterfall(a['itemVoList']);
                if (a['pagination']) {
                    $("#uploadMore").css("display", "block");
                    if (a['pagination'].pageCount == pageNo) {
                        $("#loderPro").val(0);
                        $("#uploadMore").css("display", "none");
                        $("#linkMore").html("“啊哦~，没有更多了，试试其他查找方式吧”");
                    }
                }
                $("#sceneEnd").val(a['sceneEnd']);
                $("#productEnd").val(a['productEnd']);
                return 1;
            }
            $("#loderPro").val(0);
        }
    });
    return result;

}
var emoj = new EmojiTransform();
function waterfall(arr) {
    //获取元素
    var userPinLogin = $("#user_pin").val();
    var userImgLogin = $("#login_img").val();
    var html = "";
    if (arr) {
        var num = 1;
        for (var i = 0; i < arr.length; i++) {
            var bighref_val = "/bigger/details/" + arr[i].itemId + ".html";
            var crowdhref_val = "http://z.jd.com/project/details/" + arr[i].itemId + ".html";
            var scenehref_url = "http://z.jd.com/scene/" + arr[i].itemId + ".html";
            var supportsCount = arr[i].praise;
            if (supportsCount == '' || supportsCount == undefined || supportsCount == null) {
                supportsCount = 0;
            }
            if (supportsCount > 10000) {
                supportsCount = parseInt(supportsCount / 10000);
                supportsCount = supportsCount + '万';
            } else if (supportsCount > 1000) {
                supportsCount = parseInt(supportsCount / 1000);
                supportsCount = supportsCount + '千';
            }
            html += "<li class='info pr mb20' style='z-index:103' id='proNum" + arr[i].itemId + "'>";
            if (arr[i].type == 1) {
                html += "<i class='smll-icons zc-icons'>预热中</i>";
            } else if (arr[i].type == 2) {
                html += "<i class='smll-icons zc-icons'>众筹中</i>";
            } else if (arr[i].type == 3) {
                html += "<i class='smll-icons anke-icons'>安可</i>";
            } else if (arr[i].type == 4 || arr[i].type == 5) {
                html += "<i class='smll-icons bl-icons'>爆料</i>";
            } else {
                html += "<i class='smll-icons  anke-icons'>安可</i>";
            }
            if (arr[i].type == 1 || arr[i].type == 2 || arr[i].type == 3) {
                html += "<a target='_blank' href='" + crowdhref_val + "' class='link-pic'>";
            } else if (arr[i].type == 4) {
                html += "<a target='_blank' href='" + bighref_val + "' class='link-pic'>";
            } else {
                html += "<a target='_blank' href='" + scenehref_url + "' class='link-pic'>";
            }
            html += "<img src='" + arr[i].itemImg + "'  width='280' />";
            html += "</a>";
            html += "<div class='i-tits mb10'>";
            if (arr[i].type == 1 || arr[i].type == 2 || arr[i].type == 3) {
                html += "<a target='_blank' href='" + crowdhref_val + "'><h4 class='link-tit mt5'>" + arr[i].itemName + "</h4></a>";
            } else if (arr[i].type == 4) {
                html += "<a target='_blank' href='" + bighref_val + "'><h4 class='link-tit mt5'>" + arr[i].itemName + "</h4></a>";
            } else {
                html += "<a target='_blank' href='" + scenehref_url + "'><h4 class='link-tit mt5'>" + arr[i].itemName + "</h4></a>";
            }
            if (arr[i].defaultCategoryName != "" && arr[i].defaultCategoryName != undefined) {
              //  html += '<p class="mt5 b-tit"><i class="b-icons" style="background:url(\''+arr[i].defaultCategoryImg+'\')"></i>'+arr[i].defaultCategoryName+'</p>';
                html += '<p class="mt5 b-tit"><a target="_blank" href="bigger/search.html?pageNo=1&categoryId='+arr[i].defaultCategoryId+'"><i class="b-icons" style="background:url(\''+arr[i].defaultCategoryImg+'\');background-size:20px 20px;"></i><span style="color:#5b9fe2;">'+arr[i].defaultCategoryName+'</span></a></p>';
            }
            html += "</div>";
            html += "<div style='word-wrap:break-word; word-break:break-all' class='i-descr mt10'>";
            if (arr[i].itemDes != "" && arr[i].itemDes != undefined) {
                if (arr[i].type == 1 || arr[i].type == 2 || arr[i].type == 3) {
                    html += "<p class=\"text\"><a target='_blank' href='" + crowdhref_val + "' style='color:#5e5e5e'>" + arr[i].itemDes + "</a></p>";
                } else if (arr[i].type == 4) {
                    html += "<p class=\"text\" ><a target='_blank' href='" + bighref_val + "' style='color:#5e5e5e'>" + arr[i].itemDes + "</a></p>";
                } else {
                    html += "<p class=\"text\"><a target='_blank' href='" + scenehref_url + "' style='color:#5e5e5e'>" + arr[i].itemDes + "</a></p>";
                }
            }
            html += "</div>";
            if (arr[i].type == 1 || arr[i].type == 2 || arr[i].type == 3) {
                html += "<div class='p-outter'>";
                html += " <div class='p-bar'>";
                var progessP = arr[i].progress;
                if (progessP > 100) {
                    progessP = 100;
                } else if (progessP < 0) {
                    progessP = 0;
                }
                html += "<span class='p-b-slide' style='width:" + progessP + "%;'></span></div>";
                html += "<div class='p-items'>";
                html += "<ul class='p-i-infos'>";
                html += "<li class='fore1'><p class='p-percent'>" + arr[i].progress + "%</p> <p class='p-extra'>已达</p> <span class='v-line'></span></li>";
                html += "<li class='fore2'><p class='p-percent'>￥" + arr[i].collectedAmount + "</p> <p class='p-extra'>已筹</p> <span class='v-line'></span></li>";
                if (arr[i].remainDays > 0) {
                    html += "<li class='fore3'><p class='p-percent'>" + arr[i].remainDays + "天</p><p class='p-extra'>剩余时间</p></li>";
                } else {
                    html += "<li class='fore3'><p class='p-percent'>0天</p><p class='p-extra'>剩余时间</p></li>";
                }
                html += "</ul>";
                html += "</div></div>";
            } else if (arr[i].type == 4) {
                html += "<p class='t-right'><a target='_blank'  clstag='pageclick|keycount|zc2home_page_201505073|25' href='" + arr[i].linkUrl + "' >直达链接></a></p></div>";
            }

            html += "<div class='comments' id='comments"+ arr[i].itemId+"'>";
            var datas = arr[i].topicVoList;
            if (datas != null && datas != undefined && datas != '') {
                for (var j = 0; j < datas.length; j++) {
                    var topicContent = emoj.change(datas[j].topicContent);
                    html += "<div class='c-list'>";
                    html += "<div class='c-pic'>";
                    html += "<img src='" + datas[j].yunSmaImageUrl + "' height='34' width='34'/>";
                    html += "<a href='javascript:;' onclick=gotoDetail(" + datas[j].topicId + "," + arr[i].itemId + ")></a>";
                    html += "<span class='c-mask'></span>";
                    html += "</div>";
                    html += "<div class='c-text'>";
                    //    html += "<a href='javascript:;' onclick=gotoDetail(" +datas[j].topicId + "," + arr[i].itemId + ")>" + datas[j].pin + "</a>";
                    html += "<span>" + datas[j].pin + "</span>";//onclick=gotoDetail(" +datas[j].topicId + "," + arr[i].itemId + ")
                    if(arr[i].type==1 || arr[i].type==2 || arr[i].type==3){
                       html += "<p><a href=\"/project_details.action?projectId="+arr[i].itemId+"&topicStatus="+datas[j].topicId+"\" target=\"_blank\">"+topicContent+"</a></p>"
                    }else if(arr[i].type==4 || arr[i].type==5){
                        html += "<p><a href='javascript:;' onclick=gotoDetail(" + datas[j].topicId + "," + arr[i].itemId + ") target=\"_blank\">" + topicContent + "</a></p>";
                    }
                    html += "</div></div>";
                }
            }
            html += "</div>";

            /*if (datas != null && datas != undefined && datas != '') {
                $(".comments").style.display=''
            }*/

            if (arr[i].type == 5) {
                html += "<div>";
            } else  {
                html += "<div class='c-editor' id='editor" + arr[i].itemId + "' onclick='editclick(" + arr[i].itemId + ","+ arr[i].type+")'>";
            }
            html += "<a href='#none'></a>";
            html += "</div>";
            html += "<div class='c-write mt15' id='write" + arr[i].itemId + "' style='display:none;'>";
            html += "<div class='c-pic'>";
            html += "<img src='' height='34' width='34' name='pinImg'/>";
            html += "<span class='c-mask'></span>";
            html += "</div>";
            html += "<textarea name='comments' id='textarea_" + arr[i].itemId + "' onfocus='textfocus(" + arr[i].itemId + ")' class='dowriteTextarea' placeholder='说两句' data-complete='completed'></textarea>";
            html += "</div>";
            html += "<div class='c-submit t-right mt10' id='submit" + arr[i].itemId + "' style='display:none;'>";
            html += "<div class='emoji-icon-holder' id='emojiBtn' >";
            html += "<a href='javascript:;' class='emoji-icon'></a>";
            html += "<span class='transMask'></span>";
            html += "<div class='emojiwrapper' style='display: none;'>";
            html += "<div id='emoji_1' class='emoji-scroller clearfix'>";
            html += "<s class='emoarrowup'></s>";
            html += "<i data-emoji='[大哭]' class='emoji_1 emoji icon_0'></i>";
            html += "<i data-emoji='[害羞]' class='emoji_1 emoji icon_1'></i>";
            html += "<i data-emoji='[憨笑]' class='emoji_1 emoji icon_2'></i>";
            html += "<i data-emoji='[奸笑]' class='emoji_1 emoji icon_3'></i>";
            html += "<i data-emoji='[可爱]' class='emoji_1 emoji icon_4'></i>";
            html += "<i data-emoji='[玫瑰]' class='emoji_1 emoji icon_5'></i>";
            html += "<i data-emoji='[难过]' class='emoji_1 emoji icon_6'></i>";
            html += "<i data-emoji='[太阳]' class='emoji_1 emoji icon_7'></i>";
            html += "<i data-emoji='[调皮]' class='emoji_1 emoji icon_8'></i>";
            html += "<i data-emoji='[偷笑]' class='emoji_1 emoji icon_9'></i>";
            html += "<i data-emoji='[吻]' class='emoji_1 emoji icon_10'></i>";
            html += "<i data-emoji='[握手]' class='emoji_1 emoji icon_11'></i>";
            html += "<i data-emoji='[疑问]' class='emoji_1 emoji icon_12'></i>";
            html += "<i data-emoji='[拥抱]' class='emoji_1 emoji icon_13'></i>";
            html += "<i data-emoji='[再见]' class='emoji_1 emoji icon_14'></i>";
            html += "<i data-emoji='[真棒]' class='emoji_1 emoji icon_15'></i>";
            html += "</div></div></div>";
            html += "<input type='button'  onclick='addTopic(" + arr[i].type + "," + arr[i].itemId + ",this)' value='发布话题'  clstag='pageclick|keycount|zc2home_page_201505073|26' class='c-btn'/>";
            html += "</div>";
            if (arr[i].type != 5) {
                var keys = JrTools.getCookie('Praise_System_Id_up' + "_" + arr[i].itemId);
                if (keys == "true") {
                    html += "<a class='support cur' id='support" + arr[i].itemId + "' onclick='zanclick(" + arr[i].itemId + "," + arr[i].type + ")'>";
                } else {
                    html += "<a class='support' id='support" + arr[i].itemId + "' onclick='zanclick(" + arr[i].itemId + "," + arr[i].type + ")'>";
                }
                html += "<i class='support-icons'></i><span>" + supportsCount + "</span>";
                html += "</a>";
            }
            html += "</li>";
            var name = "infos" + num;
            $("#" + name).append(html);
            html = "";
            if (num % 4 == 0) {
                num = 0;
            }
            num++;
            if (arr.length < 12) {
                $("#uploadMore").css("display", "none");
                $("#linkMore").html("“啊哦~，没有更多了，试试其他查找方式吧”");
                $("#loderPro").val(0);
            }
        }
        $(".info").find(".support").css("display", "none");
        $(".info").find(".c-editor").css("display", "none");
        $(".info").hover(function () {
                $(this).find(".support").css("display", "block");
                if ($(this).find(".c-write").css("display") == "block") {
                    $(this).find(".c-editor").css("display", "none");
                } else {
                    $(this).find(".c-editor").css("display", "block");
                }
        }, function () {
            $(this).find(".support").css("display", "none");
            $(this).find(".emojiwrapper").css("display", "none");
            $(this).find(".c-editor").css("display", "none");
        })
    } else {
        $("#uploadMore").css("display", "none");
        $("#linkMore").html("“啊哦~，没有更多了，试试其他查找方式吧”");
    }
}
function textfocus(id) {
    $("#submit" + id).css("display", "block");
    $("#submit" + id).find("#emojiBtn").css("display", "block");
    $("#submit" + id).find("#emojiBtn").hover(function () {
        $(this).find(".emojiwrapper").css("display", "block");
        $(this).find(".emojiwrapper").find("i").unbind('click').click(function () {
            var expression = $(this).parents(".info").find("textarea").val();
            if (expression == "说两句") {
                expression = "";
            }
            $(this).parents(".info").find("textarea").val(expression + $(this).attr("data-emoji"));
        });
    }, function () {
        $(this).find(".emojiwrapper").hover(function () {
            $(this).css("display", "block");
            $(this).find("i").unbind('click').click(function () {
                var expression = $(this).parents(".info").find("textarea").val();
                if (expression == "说两句") {
                    expression = "";
                }
                $(this).parents(".info").find("textarea").val(expression + $(this).attr("data-emoji"));
            });
        }, function () {
            $(this).css("display", "none");

        })
    });
}

function editclick(id,type) {
    getCurrentUser();
    setTimeout(function () {
        var name = $("#user_pin").val();
        if (name == null || name == "" || name == undefined || name == "{}") {
            isShowLogon(function () {
                getCurrentUser();
            });
        }else {
           // if(type!=5){
                $("img[name='pinImg']").attr("src", $("#login_img").val());
                $("#editor" + id).css("display", "none");
                $("#write" + id).css("display", "block");
                $("#textarea_" + id).val("");
           // }

        }
    }, 200);
}

//登录回调

function isShowLogon(callback) {
    var name = $("#user_pin").val();
    if (name == null || name == "" || name == undefined || name == "{}") {
        seajs.use('common/unit/login/1.0.0/login', function (login) {
            login(function () {
                // 登陆成功回调
                //alert('登陆成功');
                callback();
            });
        });
    } else {
        callback();
    }
}

function getCurrentUser() {
    if ($("#user_pin").val() == "" || $("#user_pin").val() == undefined || $("#user_pin").val() == null || $("#user_pin").val() == "{}") {
        jQuery.ajax({
            url: "http://z.jd.com/bigger/get_loginpin_img.action",
            dataType: "json",
            scriptCharset: "UTF-8",
            success: function (msg) {
                var pinName = msg["pin"];
                var pinImgUrl = msg["yunSmaImage"];
                $("#user_pin").val(pinName);
                //pinImg
                $("#login_img").val(pinImgUrl);
                $("img[name='pinImg']").attr("src", pinImgUrl);
                //init();
            }, error: function (e) {
                $("#user_pin").val("");
                //alert("getCurrentUser  报错");
            }
        });
    }
}
var sortPar = $(".s-list");
var sortList = sortPar.find("a");
sortList.click(function () {
    $("#pageNo").val(1);
    $(this).attr("class", "cur").siblings().attr("class", "");
    var sort = $(this).attr("code");
    $("#sort").val(sort);
    $("#infos1").html('');
    $("#infos2").html('');
    $("#infos3").html('');
    $("#infos4").html('');
    $("#uploadMore").css("display", "block");
    $("#linkMore").html("“好项目太多啦，选择<a ><span id='moreProduct'>兴趣点</span></a>可以帮您更快找到心仪项目哦~”");
    $("#sceneEnd").val(0);
    $("#productEnd").val(0);
    $("#loderPro").val(0);
    loadChooseProduct(1, "/bigger/get_choose_home.action");
});

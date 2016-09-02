jQuery.cookie = function(name, value, options) {
	if (typeof value != 'undefined') {
		options = options || {};
		if (value === null) {
			value = '';
			options = $.extend( {}, options);
			options.expires = -1;
		}
		var expires = '';
		if (options.expires
				&& (typeof options.expires == 'number' || options.expires.toUTCString)) {
			var date;
			if (typeof options.expires == 'number') {
				date = new Date();
				date.setTime(date.getTime()
						+ (options.expires * 24 * 60 * 60 * 1000));
			} else {
				date = options.expires;
			}
			expires = '; expires=' + date.toUTCString();
		}
		var path = options.path ? '; path=' + (options.path) : '';
		var domain = options.domain ? '; domain=' + (options.domain) : '';
		var secure = options.secure ? '; secure' : '';
		document.cookie = [ name, '=', encodeURIComponent(value), expires,
				path, domain, secure ].join('');
	} else {
		var cookieValue = null;
		if (document.cookie && document.cookie != '') {
			var cookies = document.cookie.split(';');
			for ( var i = 0; i < cookies.length; i++) {
				var cookie = jQuery.trim(cookies[i]);
				if (cookie.substring(0, name.length + 1) == (name + '=')) {
					cookieValue = decodeURIComponent(cookie
							.substring(name.length + 1));
					break;
				}
			}
		}
		return cookieValue;
	}
};

var Type = {"PV":"1", "UV":"2","PVUV":"3", "PayCnt":"7", "SupButton":"28", "NextButton":"29"};

/**
 * 处理PV，UV
 * 
 * @param sid
 * @param tid
 * @param pid
 * @return
 */
function req(sid, tid, pid, proid, levelid, refer) {

    var url = getReqUrl(sid, tid, pid, proid, levelid, refer);
    reqImage(url);
}

function reqImage(url) {
    var newImage = function(src, random, callback) {
        var img = new Image();
        src = random ? (src + '&random=' + Math.random()+''+(new Date)) : src;

        img.setAttribute('src', src);
    };

    newImage(url, true);
}

function getReqUrl(sid, tid, pid, proid, levelid, refer) {
    sid = $.trim(sid);
    tid = $.trim(tid);
    pid = $.trim(pid);
    proid = $.trim(proid);
    levelid = $.trim(levelid);
    refer = $.trim(refer);
    var url = 'http://t.jr.jd.com/click?sid=' + sid
        + '&tid=' + tid
        + '&pid=' + pid
        + '&proid=' + proid
        + '&level=' + levelid
        + '&refer=' + refer
        + '&t=' + new Date().getTime();
    return url;
}

function isIndex() {
	return "";
/*	var refer = document.referrer;

	if (refer == undefined || refer == null || refer.length == 0) {
		return false;
	}

	return refer.indexOf("http://z.jd.com/index.html") > 0 ? "1" : "";*/
}
function getRefer() {
    var refer = document.referrer;
    if (refer == undefined || refer == null || refer.length == 0) {
        return "";
    } else {
        return refer;
    }
}
$(function() {

	// 未获取到pid 则不做处理
	var hidePid = $('#buried_point').val();
	if ($.trim(hidePid) == '') {
		return;
	}

    // 重新载入时从cookie中取点击支持或下一步的URL，并发送uv记录请求 之后从cookie中清除
    var jrspltKey = "jr_cookie_pid_levelid_tid";
    var jrspltVal = $.cookie(jrspltKey);
    if (jrspltVal != null && jrspltVal != '') {
        reqImage(jrspltVal);
        $.cookie(jrspltKey, null, {path: "/"});
    }
	var cKey = "jr_cookie_pid_" + hidePid;
	// cookie处理
	var cVal = $.cookie(cKey);
	var sid = hidePid.substring(0, 1);
	var pid = hidePid;
	var proid = $('#_projectId').val();
	var levelid = $('#subscribeId').val();
    // 来源请求
    reqForRefer(hidePid,sid, '', pid, proid, levelid);
	if (cVal == null || cVal == '') {

		// 写cookie， 并发送uv记录请求
		$.cookie(cKey, cKey, { expires: 1, path: '/' });
		req(sid, Type.UV, pid, proid, levelid, isIndex());
	}
	// pv请求
	req(sid, Type.PV, pid, proid, levelid, isIndex());
	
	//支付点击
	$('#paynow').click(function(){
		req(sid, Type.PayCnt, pid, proid, levelid);
	});

    // 给按钮加监听事件
    addButtonListener();
});

function reqForRefer(hidePid,sid, typeid, pid, proid, levelid){
    var refer = document.referrer;
    if (refer == undefined || refer == null || refer.length == 0) {
        return;
    }
    // pvuv请求
    req(sid, Type.PVUV, pid, proid, levelid, refer);
}

// 给按钮加监听事件
function addButtonListener() {

    $(function () {
        var obj = $("[type=button][class='btn130'][clstag='jr|keycount|jr_zc_detail|xmzc']");
        var objVal = obj.attr('jrtag');
        if (objVal == null || objVal == '' || objVal == 'undefined') {
            obj = $("[id=btn_next][clstag='jr|keycount|jr_zc_support|txy']");
        }
        obj.each(function(){
            $(this).bind("click", function () {
                // 未获取到pid 则不做处理
                var hidePid = $('#buried_point').val();
                if ($.trim(hidePid) == '') {
                    return;
                }
                var sid = hidePid.substring(0, 1);
                var pid = hidePid;
                var proid = $('#_projectId').val();
                var jttag = $(this).attr('jrtag');
                if (jttag != null && jttag != '' && jttag != 'undefined') {
                    var jrtags = jttag.split("|");
                    var typeid = jrtags[0];
                    var levelid = jrtags[1];
                    var jrspltKey = "jr_cookie_pid_levelid_tid";
                    // cookie处理
                    var jrspltVal = $.cookie(jrspltKey);
                    if (jrspltVal == null || jrspltVal == '') {
                        // 写cookie
                        var url = getReqUrl(sid, typeid, pid, proid, levelid, getRefer());
                        $.cookie(jrspltKey, url, { expires: 1, path: '/' });
                    }
                }
            });
        });
    });

}

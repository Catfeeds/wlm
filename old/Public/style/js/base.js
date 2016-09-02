var jq = jQuery.noConflict();
var Duomeng = function (){

    var UNDEF = "undefined", 
        OBJECT = "object", 
        win = window, 
        doc = document; 

    var EventUtil = {
        addHandler: function(element, type, handler) {
            if (element.addEventListener) {
                element.addEventListener(type, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent("on" + type, handler);
            } else {
                element["on" + type] = handler;
            }

            return element;
        },
        removeHandler: function(element, type, handler) {
            if (element.removeEventListener) {
                element.removeEventListener(type, handler, false);
            } else if (element.detachEvent) {
                element.detachEvent("on" + type, handler);
            } else {
                element["on" + type] = null;
            }

            return element;
       }
    }
    function addLoadEvent(fn) {
        if (typeof win.addEventListener != UNDEF) {
            win.addEventListener("load", fn, false);
        } 
        else if (typeof doc.addEventListener != UNDEF) {
            doc.addEventListener("load", fn, false);
        } 
        else if (typeof win.attachEvent != UNDEF) {
            win.attachEvent("onload", fn);
        } 
        else if (typeof win.onload == "function") {
            var fnOld = win.onload;
            win.onload = function() {
                fnOld();
                fn();
            };
        } 
        else {
            win.onload = fn;
        }
    }

    return {
        version: '0.0.0.1',
        getElementById: function (id) {
            return doc.getElementById(id);
        },
        addHandler: EventUtil.addHandler,    
        removeHandler: EventUtil.removeHandler
    };
}();

var User = {
    /*public 跳转到注册页面，无参数*/
    register: function() {
        location.href = '/passport/user/register';
    },
    /*public 更新通知栏消息数*/   
    msgCount: function() {
        $.ajax({
            dataType:'json',
            url: '/passport/message/read/m/0',
            success: function(data) {
                  User.updateCount(data.data.count);
            }
        });
    },
    /*private 更新*/
    updateCount: function(count) {
         var countbox = jq("#msgcount");
         if (0 == count) {
             countbox.hide();
         } else {
             countbox.show();
             countbox.text("(" + count + ")");
         }
     }
};



function GetXmlHttpObject()
{
  var xmlHttp=null;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
  return xmlHttp;
}
var index=0;
function subnav_mover(el){
	if(el.className=="subnav_n"){
	        el.className="subnav_h";
	 }
}
function subnav_mout(el){
	if(el.className=="subnav_h"){
	        el.className="subnav_n";
    }

}
function getParameter() {
				   var str = location.href;
				   paramStr = str.substring(str.indexOf("?") + 1);
				   parmeters = {};
				   var param = paramStr.split("&");
				   if (param.length > 1) {
					   for (var i = 0; i < param.length; i++) {
						   var p = param[i].split("=");
						   parmeters[p[0]] = p[1];
					   }
				   } else {
					   var p = param[0].split("=");
					   parmeters[p[0]] = p[1];
				   }
				   return parmeters;
			   }

function changetab(){
	if(document.documentElement){
		document.documentElement.scrollTop=0;
	}
	else if (document.body){
		document.body.scrollTop=0;
	}
	var label = arguments[0];
	var callback = arguments[1];
	if (label == null) {}
	
	var str = label.id;
	document.getElementById("tab"+index).className="subnav_n";
	label.className = "subnav_a";
	index = str.match(/[0-9]{1,}$/);

	var url = label.getAttribute("rel");
	var xhr =GetXmlHttpObject();
	xhr.open("POST", url, true);
	xhr.send();

	var target = document.getElementById("item");
	target.innerHTML = "<img src='/assets3.0/index/i/loading.gif' class='loading' />正在载入内容，请稍后...";
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			window.setTimeout(function() {
        target.innerHTML = xhr.responseText;
        if (callback) callback();
		  }, 300);
		}
	}

//	var url = location.href;
//	if (/?[a-zA-Z]{1,}[0-9]{1,}$/.test(url)) {
//		var arr = url.split("?");
//		location.href = arr[0] + "?" + str;
//	} else {
//		location.href = url + "?" + str;
//	}
//	window.setTimeout(function() {
//		window.scrollTo(0, 0);
//	}, 0);
}


function parseSearch(){
      var tab,pos,search = location.search;
      search = search.match(/\d+-\d+/); 
       
      if(search){
            search = search.pop().split('-'); 
            tab = search.shift();
            pos = search.pop();

            if(jq('#t'+tab).length){
                change(jq('#t'+tab)[0]);
                if(jq("#t"+tab+"_c .title:eq("+ pos +")").length){
                    jq('html, body').animate({
                             scrollTop: jq("#t"+tab+"_c .title:eq("+ pos +")").offset().top
                    }, 500);
                }
            }
      } else{
            return ;
      } 
}


function block(id){
	    document.getElementById(id).style.display="block";       
}
function visible(id){
	document.getElementById(id).style.visibility="visible";
}
function hidden(id){
	document.getElementById(id).style.visibility="hidden";
}
function none(id){
	    document.getElementById(id).style.display="none";
}
function menu_act(id){
	    document.getElementById(id).className="menu f17px bold menu_act";
}
function menu_nor(id){
	    document.getElementById(id).className="menu f17px bold menu_nor";
}
var nav_classname;
function nav_mover(id1,id2){
	nav_classname=document.getElementById(id2).className;
	block(id1);
	menu_act(id2);
}
function nav_mout(id1,id2){
	none(id1);
	document.getElementById(id2).className=nav_classname;
}
function help_mover(el){
	if(el.className=="normal"){
	el.className="hover";
	}
}
function help_mout(el){
	if(el.className=="hover"){
	el.className="normal";
	}
}
var trace;
function mouse_over(el,act,nor){
	if(el.className==act){
		trace=el.id;
		return;
	}
	else{
		el.className=act;
	}
}
function mouse_out(el,act,nor){
	if(el.id==trace){
		el.className=act;
	}
	else{
		el.className=nor;
	}
}
window.onscroll = function() {
	if(document.getElementById("contact-said")){
	var _contact=document.getElementById("contact-said");
	var _scrolltop=document.documentElement.scrollTop || document.body.scrollTop;
	_contact.style.top=_scrolltop+230+'px';
	}
}


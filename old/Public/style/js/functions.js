;(function(b){var a={init:function(c){return this.each(function(){a.destroy.call(this);this.opt=b.extend(true,{},b.fn.raty.defaults,c);var e=b(this),g=["number","readOnly","score","scoreName"];a._callback.call(this,g);if(this.opt.precision){a._adjustPrecision.call(this);}this.opt.number=a._between(this.opt.number,0,this.opt.numberMax);this.opt.path=this.opt.path||"";if(this.opt.path&&this.opt.path.slice(this.opt.path.length-1,this.opt.path.length)!=="/"){this.opt.path+="/";}this.stars=a._createStars.call(this);this.score=a._createScore.call(this);a._apply.call(this,this.opt.score);var f=this.opt.space?4:0,d=this.opt.width||(this.opt.number*this.opt.size+this.opt.number*f);if(this.opt.cancel){this.cancel=a._createCancel.call(this);d+=(this.opt.size+f);}if(this.opt.readOnly){a._lock.call(this);}else{e.css("cursor","pointer");a._binds.call(this);}if(this.opt.width!==false){e.css("width",d);}a._target.call(this,this.opt.score);e.data({settings:this.opt,raty:true});});},_adjustPrecision:function(){this.opt.targetType="score";this.opt.half=true;},_apply:function(c){if(c&&c>0){c=a._between(c,0,this.opt.number);this.score.val(c);}a._fill.call(this,c);if(c){a._roundStars.call(this,c);}},_between:function(e,d,c){return Math.min(Math.max(parseFloat(e),d),c);},_binds:function(){if(this.cancel){a._bindCancel.call(this);}a._bindClick.call(this);a._bindOut.call(this);a._bindOver.call(this);},_bindCancel:function(){a._bindClickCancel.call(this);a._bindOutCancel.call(this);a._bindOverCancel.call(this);},_bindClick:function(){var c=this,d=b(c);c.stars.on("click.raty",function(e){c.score.val((c.opt.half||c.opt.precision)?d.data("score"):this.alt);if(c.opt.click){c.opt.click.call(c,parseFloat(c.score.val()),e);}});},_bindClickCancel:function(){var c=this;c.cancel.on("click.raty",function(d){c.score.removeAttr("value");if(c.opt.click){c.opt.click.call(c,null,d);}});},_bindOut:function(){var c=this;b(this).on("mouseleave.raty",function(d){var e=parseFloat(c.score.val())||undefined;a._apply.call(c,e);a._target.call(c,e,d);if(c.opt.mouseout){c.opt.mouseout.call(c,e,d);}});},_bindOutCancel:function(){var c=this;c.cancel.on("mouseleave.raty",function(d){b(this).attr("src",c.opt.path+c.opt.cancelOff);if(c.opt.mouseout){c.opt.mouseout.call(c,c.score.val()||null,d);}});},_bindOverCancel:function(){var c=this;c.cancel.on("mouseover.raty",function(d){b(this).attr("src",c.opt.path+c.opt.cancelOn);c.stars.attr("src",c.opt.path+c.opt.starOff);a._target.call(c,null,d);if(c.opt.mouseover){c.opt.mouseover.call(c,null);}});},_bindOver:function(){var c=this,d=b(c),e=c.opt.half?"mousemove.raty":"mouseover.raty";c.stars.on(e,function(g){var h=parseInt(this.alt,10);if(c.opt.half){var f=parseFloat((g.pageX-b(this).offset().left)/c.opt.size),j=(f>0.5)?1:0.5;h=h-1+j;a._fill.call(c,h);if(c.opt.precision){h=h-j+f;}a._roundStars.call(c,h);d.data("score",h);}else{a._fill.call(c,h);}a._target.call(c,h,g);if(c.opt.mouseover){c.opt.mouseover.call(c,h,g);}});},_callback:function(c){for(i in c){if(typeof this.opt[c[i]]==="function"){this.opt[c[i]]=this.opt[c[i]].call(this);}}},_createCancel:function(){var e=b(this),c=this.opt.path+this.opt.cancelOff,d=b("<img />",{src:c,alt:"x",title:this.opt.cancelHint,"class":"raty-cancel"});if(this.opt.cancelPlace=="left"){e.prepend("&#160;").prepend(d);}else{e.append("&#160;").append(d);}return d;},_createScore:function(){return b("<input />",{type:"hidden",name:this.opt.scoreName}).appendTo(this);},_createStars:function(){var e=b(this);for(var c=1;c<=this.opt.number;c++){var f=a._getHint.call(this,c),d=(this.opt.score&&this.opt.score>=c)?"starOn":"starOff";d=this.opt.path+this.opt[d];b("<img />",{src:d,alt:c,title:f}).appendTo(this);if(this.opt.space){e.append((c<this.opt.number)?"&#160;":"");}}return e.children("img");},_error:function(c){b(this).html(c);b.error(c);},_fill:function(d){var m=this,e=0;for(var f=1;f<=m.stars.length;f++){var g=m.stars.eq(f-1),l=m.opt.single?(f==d):(f<=d);if(m.opt.iconRange&&m.opt.iconRange.length>e){var j=m.opt.iconRange[e],h=j.on||m.opt.starOn,c=j.off||m.opt.starOff,k=l?h:c;if(f<=j.range){g.attr("src",m.opt.path+k);}if(f==j.range){e++;}}else{var k=l?"starOn":"starOff";g.attr("src",this.opt.path+this.opt[k]);}}},_getHint:function(d){var c=this.opt.hints[d-1];return(c==="")?"":(c||d);},_lock:function(){var d=parseInt(this.score.val(),10),c=d?a._getHint.call(this,d):this.opt.noRatedMsg;b(this).data("readonly",true).css("cursor","").attr("title",c);this.score.attr("readonly","readonly");this.stars.attr("title",c);if(this.cancel){this.cancel.hide();}},_roundStars:function(e){var d=(e-Math.floor(e)).toFixed(2);if(d>this.opt.round.down){var c="starOn";if(this.opt.halfShow&&d<this.opt.round.up){c="starHalf";}else{if(d<this.opt.round.full){c="starOff";}}this.stars.eq(Math.ceil(e)-1).attr("src",this.opt.path+this.opt[c]);}},_target:function(f,d){if(this.opt.target){var e=b(this.opt.target);if(e.length===0){a._error.call(this,"Target selector invalid or missing!");}if(this.opt.targetFormat.indexOf("{score}")<0){a._error.call(this,'Template "{score}" missing!');}var c=d&&d.type=="mouseover";if(f===undefined){f=this.opt.targetText;}else{if(f===null){f=c?this.opt.cancelHint:this.opt.targetText;}else{if(this.opt.targetType=="hint"){f=a._getHint.call(this,Math.ceil(f));}else{if(this.opt.precision){f=parseFloat(f).toFixed(1);}}if(!c&&!this.opt.targetKeep){f=this.opt.targetText;}}}if(f){f=this.opt.targetFormat.toString().replace("{score}",f);}if(e.is(":input")){e.val(f);}else{e.html(f);}}},_unlock:function(){b(this).data("readonly",false).css("cursor","pointer").removeAttr("title");this.score.removeAttr("readonly","readonly");for(var c=0;c<this.opt.number;c++){this.stars.eq(c).attr("title",a._getHint.call(this,c+1));}if(this.cancel){this.cancel.css("display","");}},cancel:function(c){return this.each(function(){if(b(this).data("readonly")!==true){a[c?"click":"score"].call(this,null);this.score.removeAttr("value");}});},click:function(c){return b(this).each(function(){if(b(this).data("readonly")!==true){a._apply.call(this,c);if(!this.opt.click){a._error.call(this,'You must add the "click: function(score, evt) { }" callback.');}this.opt.click.call(this,c,{type:"click"});a._target.call(this,c);}});},destroy:function(){return b(this).each(function(){var d=b(this),c=d.data("raw");if(c){d.off(".raty").empty().css({cursor:c.style.cursor,width:c.style.width}).removeData("readonly");}else{d.data("raw",d.clone()[0]);}});},getScore:function(){var d=[],c;b(this).each(function(){c=this.score.val();d.push(c?parseFloat(c):undefined);});return(d.length>1)?d:d[0];},readOnly:function(c){return this.each(function(){var d=b(this);if(d.data("readonly")!==c){if(c){d.off(".raty").children("img").off(".raty");a._lock.call(this);}else{a._binds.call(this);a._unlock.call(this);}d.data("readonly",c);}});},reload:function(){return a.set.call(this,{});},score:function(){return arguments.length?a.setScore.apply(this,arguments):a.getScore.call(this);},set:function(c){return this.each(function(){var e=b(this),f=e.data("settings"),d=b.extend({},f,c);e.raty(d);});},setScore:function(c){return b(this).each(function(){if(b(this).data("readonly")!==true){a._apply.call(this,c);a._target.call(this,c);}});}};b.fn.raty=function(c){if(a[c]){return a[c].apply(this,Array.prototype.slice.call(arguments,1));}else{if(typeof c==="object"||!c){return a.init.apply(this,arguments);}else{b.error("Method "+c+" does not exist!");}}};b.fn.raty.defaults={cancel:false,cancelHint:"Cancel this rating!",cancelOff:"cancel-off.png",cancelOn:"cancel-on.png",cancelPlace:"left",click:undefined,half:false,halfShow:true,hints:["bad","poor","regular","good","gorgeous"],iconRange:undefined,mouseout:undefined,mouseover:undefined,noRatedMsg:"Not rated yet!",number:5,numberMax:20,path:"",precision:false,readOnly:false,round:{down:0.25,full:0.6,up:0.76},score:undefined,scoreName:"score",single:false,size:16,space:true,starHalf:"star-half.png",starOff:"star-off.png",starOn:"star-on.png",target:undefined,targetFormat:"{score}",targetKeep:false,targetText:"",targetType:"hint",width:undefined};})(jQuery);
;!function(a){var b=function(b,c){this.options=c,this.$element=a(b).delegate('[data-dismiss="modal"]',"click.dismiss.modal",a.proxy(this.hide,this)),this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};b.prototype={constructor:b,toggle:function(){return this[this.isShown?"hide":"show"]()},show:function(){var b=this,c=a.Event("show");this.$element.trigger(c);if(this.isShown||c.isDefaultPrevented())return;this.isShown=!0,this.escape(),this.backdrop(function(){var c=a.support.transition&&b.$element.hasClass("fade");b.$element.parent().length||b.$element.appendTo(document.body),b.$element.show(),c&&b.$element[0].offsetWidth,b.$element.addClass("in").attr("aria-hidden",!1),b.enforceFocus(),c?b.$element.one(a.support.transition.end,function(){b.$element.focus().trigger("shown")}):b.$element.focus().trigger("shown")})},hide:function(b){b&&b.preventDefault();var c=this;b=a.Event("hide"),this.$element.trigger(b);if(!this.isShown||b.isDefaultPrevented())return;this.isShown=!1,this.escape(),a(document).off("focusin.modal"),this.$element.removeClass("in").attr("aria-hidden",!0),a.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var b=this;a(document).on("focusin.modal",function(a){b.$element[0]!==a.target&&!b.$element.has(a.target).length&&b.$element.focus()})},escape:function(){var a=this;this.isShown&&this.options.keyboard?this.$element.on("keyup.dismiss.modal",function(b){b.which==27&&a.hide()}):this.isShown||this.$element.off("keyup.dismiss.modal")},hideWithTransition:function(){var b=this,c=setTimeout(function(){b.$element.off(a.support.transition.end),b.hideModal()},500);this.$element.one(a.support.transition.end,function(){clearTimeout(c),b.hideModal()})},hideModal:function(){var a=this;this.$element.hide(),this.backdrop(function(){a.removeBackdrop(),a.$element.trigger("hidden")})},removeBackdrop:function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},backdrop:function(b){var c=this,d=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var e=a.support.transition&&d;this.$backdrop=a('<div class="modal-backdrop '+d+'" />').appendTo(document.body),this.$backdrop.click(this.options.backdrop=="static"?a.proxy(this.$element[0].focus,this.$element[0]):a.proxy(this.hide,this)),e&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in");if(!b)return;e?this.$backdrop.one(a.support.transition.end,b):b()}else!this.isShown&&this.$backdrop?(this.$backdrop.removeClass("in"),a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(a.support.transition.end,b):b()):b&&b()}};var c=a.fn.modal;a.fn.modal=function(c){return this.each(function(){var d=a(this),e=d.data("modal"),f=a.extend({},a.fn.modal.defaults,d.data(),typeof c=="object"&&c);e||d.data("modal",e=new b(this,f)),typeof c=="string"?e[c]():f.show&&e.show()})},a.fn.modal.defaults={backdrop:!0,keyboard:!0,show:!0},a.fn.modal.Constructor=b,a.fn.modal.noConflict=function(){return a.fn.modal=c,this},a(document).on("click.modal.data-api",'[data-toggle="modal"]',function(b){var c=a(this),d=c.attr("href"),e=a(c.attr("data-target")||d&&d.replace(/.*(?=#[^\s]+$)/,"")),f=e.data("modal")?"toggle":a.extend({remote:!/#/.test(d)&&d},e.data(),c.data());b.preventDefault(),e.modal(f).one("hide",function(){c.focus()})})}(window.jQuery)
;!function(a){var b='[data-dismiss="alert"]',c=function(c){a(c).on("click",b,this.close)};c.prototype.close=function(b){function f(){e.trigger("closed").remove()}var c=a(this),d=c.attr("data-target"),e;d||(d=c.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),e=a(d),b&&b.preventDefault(),e.length||(e=c.hasClass("alert")?c:c.parent()),e.trigger(b=a.Event("close"));if(b.isDefaultPrevented())return;e.removeClass("in"),a.support.transition&&e.hasClass("fade")?e.on(a.support.transition.end,f):f()};var d=a.fn.alert;a.fn.alert=function(b){return this.each(function(){var d=a(this),e=d.data("alert");e||d.data("alert",e=new c(this)),typeof b=="string"&&e[b].call(d)})},a.fn.alert.Constructor=c,a.fn.alert.noConflict=function(){return a.fn.alert=d,this},a(document).on("click.alert.data-api",b,c.prototype.close)}(window.jQuery)
;FrepUI={init:function(){this.frep_ui_select()},frep_ui_select:function(){this.frep_ui_select_build();this.frep_ui_select_focus();this.frep_ui_select_hover()},frep_ui_select_build:function(){$("select.pretty").hide();$("select.pretty").each(function(){var b=$(this).children("select option:first").text();var c=$(this).children("select option:selected").text(),a=(c?c:b);$(this).wrap('<div class="frep-ui-select-wrap" id="'+$(this).attr("name")+'" />');$(this).parent("div").attr("tabindex",$(this).attr("tabindex"));$(this).parent("div").prepend('<ul class="frep-ui-select-list" />');$(this).parent("div").prepend('<div class="frep-ui-select-value"><span>'+a+"</span></div>");$(this).parent("div").find("option").each(function(f,e){var d=($(e).attr("selected"))?' class="selected"':"";$(this).parent().prev(".frep-ui-select-list").append("<li"+d+"><span>"+$(e).text()+"</span></li>")})})},frep_ui_select_focus:function(){var a=false;$(".frep-ui-select-wrap").bind("focus",function(d){var b=$(this).find(".frep-ui-select-list li").length-1,c=(a!=false)?a:-1;$(this).addClass("active");$(this).bind("keydown",function(g){var f=g.keyCode||g.which;if(f==38||f==40){if(f==38){c--}if(f==40){c++}a=c;if(c<=b&&c>=0){$(this).find(".frep-ui-select-list li:eq("+c+")").click()}else{if(c<0){$(this).find(".frep-ui-select-list li:eq("+b+")").click();c=b}else{if(c>b){$(this).find(".frep-ui-select-list li:eq(0)").click();c=0}}}}g.preventDefault()})}).bind("blur",function(){$(this).removeClass("active");$(this).find(".frep-ui-select-list").hide()})},frep_ui_select_hover:function(){$(".frep-ui-select-wrap").on({mouseover:function(){$(this).addClass("active");$(this).children(".frep-ui-select-list").show()},mouseout:function(){$(this).children(".frep-ui-select-list").hide();$(this).removeClass("active")}});$(".frep-ui-select-list li").on("click",function(){var b=$(this).text(),a=$(this).index();$(this).parent(".frep-ui-select-list").prev(".frep-ui-select-value").find("span").text(b);$(this).parent(".frep-ui-select-list").next().find("option:selected").removeAttr("selected");$(this).parent(".frep-ui-select-list").next().find("option:eq("+a+")").attr("selected","selected");$(this).parent(".frep-ui-select-list").next().change();$(this).parent(".frep-ui-select-list").hide();$(this).parent(".frep-ui-select-list").parent().removeClass("active").unbind("hover");$(this).parent(".frep-ui-select-list").find(".selected").removeClass("selected");$(this).addClass("selected")})}};$(document).ready(function(){FrepUI.init()});
;!function(a){var b=function(b,c){this.options=a.extend({},a.fn.affix.defaults,c),this.$window=a(window).on("scroll.affix.data-api",a.proxy(this.checkPosition,this)).on("click.affix.data-api",a.proxy(function(){setTimeout(a.proxy(this.checkPosition,this),1)},this)),this.$element=a(b),this.checkPosition()};b.prototype.checkPosition=function(){if(!this.$element.is(":visible"))return;var b=a(document).height(),c=this.$window.scrollTop(),d=this.$element.offset(),e=this.options.offset,f=e.bottom,g=e.top,h="affix affix-top affix-bottom",i;typeof e!="object"&&(f=g=e),typeof g=="function"&&(g=e.top()),typeof f=="function"&&(f=e.bottom()),i=this.unpin!=null&&c+this.unpin<=d.top?!1:f!=null&&d.top+this.$element.height()>=b-f?"bottom":g!=null&&c<=g?"top":!1;if(this.affixed===i)return;this.affixed=i,this.unpin=i=="bottom"?d.top-c:null,this.$element.removeClass(h).addClass("affix"+(i?"-"+i:""))};var c=a.fn.affix;a.fn.affix=function(c){return this.each(function(){var d=a(this),e=d.data("affix"),f=typeof c=="object"&&c;e||d.data("affix",e=new b(this,f)),typeof c=="string"&&e[c]()})},a.fn.affix.Constructor=b,a.fn.affix.defaults={offset:0},a.fn.affix.noConflict=function(){return a.fn.affix=c,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var b=a(this),c=b.data();c.offset=c.offset||{},c.offsetBottom&&(c.offset.bottom=c.offsetBottom),c.offsetTop&&(c.offset.top=c.offsetTop),b.affix(c)})})}(window.jQuery);

// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
;(function($){


/* trigger when page is ready */
$(document).ready(function (){




  $('.add-person').on('click', '.del-person-item', function(){

  	$(this).parents('.add-person-item').remove();
  	return false;
  });

  $('.add-person-item-btn').click(function(){

	var new_person="";
		new_person += "<div class=\"add-person-item\" style=\"padding:20px 10px 10px; margin-bottom:10px; border:1px solid #ccc;\">";
		new_person += "						<p class=\"text-right\"><a class=\"del-person-item\" href=\"\">删除此人<\/a><\/p>";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_name[]\">姓名<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <input type=\"text\" name=\"per_item_name[]\" value=\"\" id=\"per_item_name[]\" class=\"input-xlarge\" placeholder=\"姓名\">";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_com_des[]\">职位<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <input type=\"text\" name=\"per_item_com_des[]\" value=\"\" id=\"per_item_com_des[]\" class=\"input-xlarge\" placeholder=\"职位\">";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_des[]\">个人介绍<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <textarea type=\"text\" name=\"per_item_des[]\" value=\"\" id=\"per_item_des[]\" class=\"input-xlarge\" placeholder=\"个人介绍\"><\/textarea>";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_weibo[]\">微博<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <input type=\"text\" name=\"per_item_weibo[]\" value=\"\" id=\"per_item_weibo[]\" class=\"input-xlarge\" placeholder=\"微博\">";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_email[]\">邮箱<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <input type=\"text\" name=\"per_item_email[]\" value=\"\" id=\"per_item_email[]\" class=\"input-xlarge\" placeholder=\"邮箱\">";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "						<!-- Text input-->";
		new_person += "						<div class=\"control-group\">";
		new_person += "						  <label class=\"control-label\" for=\"per_item_mobile[]\">联系电话<\/label>";
		new_person += "						  <div class=\"controls\">";
		new_person += "						    <input type=\"text\" name=\"per_item_mobile[]\" value=\"\" id=\"per_item_mobile[]\" class=\"input-xlarge\" placeholder=\"联系电话\">";
		new_person += "						  <\/div>";
		new_person += "						<\/div>";
		new_person += "";
		new_person += "					<\/div>";


	$(this).parent().before($(new_person));

	return false;

  });

// product


$('.add-person').on('click', '.del-product-item', function(){

  	$(this).parents('.add-product-item').remove();
  	return false;
  });

  $('.add-product-item-btn').click(function(){

	var newProduct="";
		newProduct += "<div style=\"padding:20px 10px 10px; margin-bottom:10px; border:1px solid #ccc;\" class=\"add-product-item\">";
		newProduct += "								<p class=\"text-right\"><a class=\"del-product-item\" href=\"\">删除此产品<\/a><\/p>";
		newProduct += "								";
		newProduct += "								<!-- Text input-->";
		newProduct += "								<div class=\"control-group\">";
		newProduct += "								  <label for=\"com_pro_name[]\" class=\"control-label\">名称<\/label>";
		newProduct += "								  <div class=\"controls\">";
		newProduct += "								    <input type=\"text\" placeholder=\"名称\" class=\"input-xlarge\" id=\"com_pro_name[]\" value=\"\" name=\"com_pro_name[]\">";
		newProduct += "								  <\/div>";
		newProduct += "								<\/div>";
		newProduct += "";
		newProduct += "								<!-- Text input-->";
		newProduct += "								<div class=\"control-group\">";
		newProduct += "								  <label for=\"com_pro_url[]\" class=\"control-label\">网址<\/label>";
		newProduct += "								  <div class=\"controls\">";
		newProduct += "								    <input type=\"text\" placeholder=\"网址\" class=\"input-xlarge\" id=\"com_pro_url[]\" value=\"\" name=\"com_pro_url[]\">";
		newProduct += "								  <\/div>";
		newProduct += "								<\/div>";
		newProduct += "";
		newProduct += "								<!-- Text input-->";
		newProduct += "								<div class=\"control-group\">";
		newProduct += "									<label for=\"com_pro_type_id\" class=\"control-label\">类型<\/label>";
		newProduct += "									<div class=\"controls\">";
		newProduct += "										<select name=\"com_pro_type_id[]\" id=\"com_pro_type_id\">";
		newProduct += "																							<option value=\"1\" selected=\"selected\">网站<\/option>";
		newProduct += "																							<option value=\"2\">app<\/option>";
		newProduct += "																							<option value=\"3\">游戏<\/option>";
		newProduct += "																							<option value=\"4\">电子商务<\/option>";
		newProduct += "																							<option value=\"5\">电子硬件<\/option>";
		newProduct += "																							<option value=\"6\">软件<\/option>";
		newProduct += "																							<option value=\"7\">其他<\/option>";
		newProduct += "																					<\/select>";
		newProduct += "									<\/div>";
		newProduct += "								<\/div>";
		newProduct += "";
		newProduct += "								<!-- Text input-->";
		newProduct += "								<div class=\"control-group\">";
		newProduct += "								  <label for=\"com_pro_detail[]\" class=\"control-label\">简介<\/label>";
		newProduct += "								  <div class=\"controls\">";
		newProduct += "								    <input type=\"text\" placeholder=\"简介\" class=\"input-xlarge\" id=\"com_pro_detail[]\" value=\"\" name=\"com_pro_detail[]\">";
		newProduct += "								  <\/div>";
		newProduct += "								<\/div>";
		newProduct += "";
		newProduct += "";
		newProduct += "							<\/div>";

	$(this).parent().before($(newProduct));

	return false;

  });

// mile news


$('.add-person').on('click', '.del-news-item', function(){

  	$(this).parents('.add-news-item').remove();
  	return false;
  });

  $('.add-news-item-btn').click(function(){
		var strNews="";
			strNews += "<div style=\"padding:20px 10px 10px; margin-bottom:10px; border:1px solid #ccc;\" class=\"add-news-item\">";
			strNews += "								<p class=\"text-right\"><a class=\"del-news-item\" href=\"\">删除此新闻<\/a><\/p>";
			strNews += "								";
			strNews += "								<div class=\"control-group\">";
			strNews += "								    <label class=\"control-label\" for=\"com_new_name\">标题<\/label>";
			strNews += "								    <div class=\"controls\">";
			strNews += "								        <input type=\"text\" id=\"com_new_name\" name=\"com_new_name[]\" class=\"input-xlarge\" value=\"\">";
			strNews += "								    <\/div>";
			strNews += "								<\/div>";
			strNews += "								<div class=\"control-group\">";
			strNews += "								    <label class=\"control-label\" for=\"com_new_year\">时间<\/label>";
			strNews += "								    <div class=\"controls\">";
			strNews += "								        <input type=\"text\" name=\"com_new_year[]\" id=\"com_new_year\" class=\"input-mini\" value=\"\"> 年 <input type=\"text\" name=\"com_new_month[]\" value=\"\" id=\"com_new_month\" class=\"input-mini\"> 月 <input type=\"text\" name=\"com_new_day[]\" value=\"\" id=\"com_new_day\" class=\"input-mini\"> 日";
			strNews += "								    <\/div>";
			strNews += "								<\/div>";
			strNews += "								<div class=\"control-group\">";
			strNews += "								    <label class=\"control-label\" for=\"com_new_url\">网址<\/label>";
			strNews += "								    <div class=\"controls\">";
			strNews += "								        <input type=\"text\" id=\"com_new_url\" value=\"\" name=\"com_new_url[]\" class=\"input-xlarge\">";
			strNews += "								    <\/div>";
			strNews += "								<\/div>";
			strNews += "								<div class=\"control-group\">";
			strNews += "								    <label class=\"control-label\" for=\"new_type\">类型<\/label>";
			strNews += "								    <div class=\"controls\">";
			strNews += "								        <select id=\"new_type\" name=\"com_new_type_id[]\">";
			strNews += "								            												<option value=\"1\">产品发布<\/option>";
			strNews += "																							<option value=\"2\">投资并购<\/option>";
			strNews += "																							<option value=\"3\">人物访谈<\/option>";
			strNews += "																							<option value=\"4\">分析评论<\/option>";
			strNews += "																							<option value=\"5\">活动会议<\/option>";
			strNews += "																							<option value=\"6\">数据信息<\/option>";
			strNews += "																							<option value=\"7\">竞争合作<\/option>";
			strNews += "																							<option value=\"8\">传言预测<\/option>";
			strNews += "																							<option value=\"9\">排名奖项<\/option>";
			strNews += "																							<option value=\"10\">关停调整<\/option>";
			strNews += "																							<option value=\"11\">人事变动<\/option>";
			strNews += "																							<option value=\"12\">其他<\/option>";
			strNews += "																			        <\/select>";
			strNews += "								    <\/div>";
			strNews += "								<\/div>";
			strNews += "";
			strNews += "							<\/div>";



	$(this).parent().before($(strNews));

	return false;

  });



// mile stone


$('.add-person').on('click', '.del-mile-stone-item', function(){

  	$(this).parents('.add-mile-stone-item').remove();
  	return false;
  });

  $('.add-mile-stone-item-btn').click(function(){
		var newMilStone="";
			newMilStone += "<div style=\"padding:20px 10px 10px; margin-bottom:10px; border:1px solid #ccc;\" class=\"add-mile-stone-item\">";
			newMilStone += "								<p class=\"text-right\"><a class=\"del-mile-stone-item\" href=\"\">删除此里程<\/a><\/p>";
			newMilStone += "								";
			newMilStone += "								<div class=\"control-group\">";
			newMilStone += "								    <label class=\"control-label\" for=\"com_mil_year\">时间<\/label>";
			newMilStone += "								    <div class=\"controls\">";
			newMilStone += "								        <input type=\"text\" name=\"com_mil_year[]\"  id=\"com_mil_year\" class=\"input-mini\"> 年 <input type=\"text\" name=\"com_mil_month[]\"  id=\"com_mil_month\" class=\"input-mini\"> 月";
			newMilStone += "								    <\/div>";
			newMilStone += "								<\/div>";
			newMilStone += "";
			newMilStone += "								<div class=\"control-group\">";
			newMilStone += "								    <label class=\"control-label\" for=\"com_mil_detail\">里程碑<\/label>";
			newMilStone += "								    <div class=\"controls\">";
			newMilStone += "								        <textarea name=\"com_mil_detail[]\" id=\"com_mil_detail\" cols=\"40\" rows=\"3\" type=\"textarea\" class=\"input-xlarge\"><\/textarea>";
			newMilStone += "								    <\/div>";
			newMilStone += "								<\/div>";
			newMilStone += "";
			newMilStone += "";
			newMilStone += "							<\/div>";


	$(this).parent().before($(newMilStone));

	return false;

  });




  // 评分
  $('#star').raty({
    path     : window.base_url + '/asset/v2/img/raty',
    half     : true,
    size     : 24,
    target    : '#your-consider-star-detail',
    starHalf : 'star-half-big.png',
    starOff  : 'star-off-big.png',
    starOn   : 'star-on-big.png',
    width    : 160,
    targetKeep: true,
    precision : true,
    targetText: '0.0',
    hints:['凑数的吧','还看得过去','一般般','有点意思','太棒了'],
    score: $('#star').attr("score"),
    click: function(score, evt) {


    	var com_id   = $('#com_id_value').attr('com_id');

  		var commont_req = $.ajax({
            url: window.site_url + "/commont/ajax_add/star",
            type: "POST",
            data: {com_id : com_id, score: score},
            dataType: "json"
          });

		commont_req.done(function(msg) {

			 if (msg)
			 {
			    if (msg.status == 'ok') {
			      $('#star').raty('score', msg.score);
			      $('#star_des').empty().html(msg.detail);
			      $.removeCookie('star'+ com_id, { path: '/' });
			    } else if ( msg.status == 'error' ||  msg.status == 'timeout' ) {
			      $.cookie('star'+ com_id, score, { expires: 7, path: '/' });
			      window.location.href = window.site_url + "user/login" + '?redirect=company/' + com_id;
			    } else {
			      $.cookie('star'+ com_id, score, { expires: 7, path: '/' });
			      window.location.href = window.site_url + "user/login" + '?redirect=company/' + com_id;
			    }

			 }

		});

		return false;

 	}
  });

  if ($.cookie('star'+ $('#com_id_value').attr('com_id'))) {
  	$('#star').raty('click', $.cookie('star'+ $('#com_id_value').attr('com_id')));
  }

  $(document).on("click","#go_to_commont_inbox",function () {
  	$('.wrapper').ScrollTo();
  	return false;
  });

  function add_commont_info_to_html(item) {
  	// check if exist info wrap
  	var exist_wrap = $('#commont_show').length?$('#commont_show'):false;
  	if (!exist_wrap) {
  		exist_wrap = $('<div class="normal-box" id="commont_show"> <h2><a id="go_to_commont_inbox" href="#commont_inbox" class="btn btn-green pull-right"> <i class="icon_plus"></i> 添加评论</a> 评论</h2> <div class="clearfix "></div></div>') ;
  		exist_wrap.appendTo($('.two-col-little-right'));
  	}
  	exist_wrap.find('.clearfix').prepend(item);
  	$('#commont_add_info').val('');
  	$('#commont_show').ScrollTo();
  }

  $('#commont_add_btn').click(function () {

		var com_id   = $('#commont_add_info').attr('com_id'),
			commont_info = $('#commont_add_info').val();

		if (!commont_info) {
			alert("请输入内容后，再提交您的评论！");
			return false;
		}

  		var commont_req = $.ajax({
            url: window.site_url + "/commont/ajax_add",
            type: "POST",
            data: {com_id : com_id, commont_info: commont_info},
            dataType: "json"
          });

		commont_req.done(function(msg) {

			 if (msg)
			 {
			    if (msg.status == 'ok') {
			      add_commont_info_to_html(msg.detail);
			    } else if ( msg.status == 'error' ||  msg.status == 'timeout' ) {
			      window.location.href = window.site_url + "user/login";
			    } else {
			      window.location.href = window.site_url + "user/login";
			    }

			 }

		});

		return false;

  });

  $(".top-search").fadeIn();

	$(".childen-hover").children().hover(function(){
		$(this).addClass("hover");
	},function(){
		$(this).removeClass("hover");
	});

	  if ($("#follow_scope").length)
	  {
	  	$("#follow_scope").click(function(){

          var $base = $(this);

          var comId = $(this).attr("scope_id");

          var request = $.ajax({
            url: window.site_url + "/follow/scope",
            type: "POST",
            data: {id : comId},
            dataType: "json"
          });

          request.done(function(msg) {

             if (msg)
             {
                if (msg.status != 'timeout') {
                  $base.find('b').text(msg.text);
                } else {
                  window.location.href = window.site_url + "user/login";
                }

             }

          });

          return false;

     	 });
	  }

    if ($("#follow_company").length)
    {
      $("#follow_company").click(function(){

              var $base = $(this);

              var comId = $(this).attr("com_id");

              var request = $.ajax({
                url: window.site_url + "/follow/company",
                type: "POST",
                data: {id : comId},
                dataType: "json"
              });

              request.done(function(msg) {

                 if (msg)
                 {
                    if (msg.status != 'timeout') {
                       $base.find('b').text(msg.text);
                    } else {
                      window.location.href = window.site_url + "/user/login";
                    }

                 }

              });

              return false;

          });
        }

        if ($("#follow_investor").length) {
           $("#follow_investor").click(function(){

            var $base = $(this);

              var comId = $(this).attr("com_id");

              var request = $.ajax({
                url: window.site_url + "/follow/investor",
                type: "POST",
                data: {id : comId},
                dataType: "json"
              });

              request.done(function(msg) {

                 if (msg)
                 {
                    if (msg.status != 'timeout') {
                      $base.find('b').text(msg.text);
                    } else {
                      window.location.href = window.site_url + "/user/login";
                    }

                 }

              });

              return false;

          });

        };

        if ($("#follow_invst").length) {
          $("#follow_invst").click(function(){

          var $base = $(this);

          var comId = $(this).attr("invst_id");

          var request = $.ajax({
            url: window.site_url + "/follow/investfirm",
            type: "POST",
            data: {id : comId},
            dataType: "json"
          });

          request.done(function(msg) {

             if (msg)
             {
                if (msg.status != 'timeout') {
                  $base.find('b').text(msg.text);
                } else {
                  window.location.href = window.site_url + "/user/login";
                }

             }

          });

          return false;

      });
        };

    if ($("#follow_album").length) {
       $("#follow_album").click(function(){

        var $base = $(this);

          var albumId = $(this).attr("album_id");

          var request = $.ajax({
            url: window.site_url + "follow/album",
            type: "POST",
            data: {id : albumId},
            dataType: "json"
          });

          request.done(function(msg) {

             if (msg)
             {
                if (msg.status != 'timeout') {
                  $base.find('b').text(msg.text);
                } else {
                  window.location.href = window.site_url + "/user/login";
                }

             }

          });

          return false;

      });

    };
    // add archive follow function
    if ($("#follow_archive").length)
    {
      $("#follow_archive").click(function(){

              var $base = $(this);

              var comId = $(this).attr("archive_id");

              var request = $.ajax({
                url: window.site_url + "/follow/archive",
                type: "POST",
                data: {id : comId},
                dataType: "json"
              });

              request.done(function(msg) {

                 if (msg)
                 {
                    if (msg.status != 'timeout') {
                       $base.find('b').text(msg.text);
                    } else {
                      window.location.href = window.site_url + "/user/login";
                    }

                 }

              });

              return false;

          });
        }
    // add product follow function
    if ($("#follow_product").length)
    {
      $("#follow_product").click(function(){
            var $base = $(this);
            var id = $("input[name='product_id_value']").val();
						
            var request = $.ajax({
              url: window.site_url + "follow/product",
              type: "POST",
              data: {id : id},
              dataType: "json"
            });
            request.done(function(msg) {

               if (msg)
               {
                  if (msg.status != 'timeout') {
                     $base.find('b').text(msg.text);
                  } else {
                    window.location.href = window.site_url + "/user/login";
                  }

               }

            });

            return false;

        });
      }
      // 上传图片
      if ( $("#upload_image").length )
      {
        $("#upload_image").uploadify({
                swf: window.base_url + '/public/manage/js/plugins/uploadify/uploadify.swf',
                uploader: window.site_url+'/uploadify/process_upload/person_avatar',
                'buttonText' : '上传图片',
                'fileTypeDesc' : '您所选的文件',
                'fileTypeExts' : '*.gif; *.jpg; *.jpeg; *.png',
                multi: false,
                formData : {userdata:window.userdata,'token':window.token_value},
                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                    alert(file.name + ' could not be uploaded: ' + errorString);
                },
                'onUploadSuccess'   : function (file, data, response) {
                     var return_file = eval('(' + data + ')');
                     if ( typeof return_file.file_name != 'undefined' )
                     {
                      $('#uplogo').val(return_file.file_name);
                      $('#upload_img_src').attr({src:window.base_url + '/images/' + return_file.file_name});
                      $('#img_w').val( return_file.image_width );
                      $('#img_h').val( return_file.image_height );
                      $('#avatar img').add($('#preview-pane .preview-container img')).attr({src:window.base_url + '/images/' + return_file.file_name});
                      setimg(return_file.image_width,return_file.image_height);
                     } else {
                      alert(return_file.error);
                     }
                }
            });

          var dot_postion = [10,100,10,10];

          if ( $('#f').val())
          {
            dot_postion = [$('#x1').val(),$('#y1').val(),$('#x2').val(),$('#y2').val()];
            setimg ($('#img_w').val(),$('#img_h').val());
          }

          function setimg (w,h) {
            w = parseInt(w);
            h = parseInt(h);
            var big = w>h?'width':'height';
            var big_value = w>h?w:h;

            if (big_value>300) {

            } else {
              $('#target').css(big,'300px');
            }

            $('#avatar').css({'padding':'0','height':'300px','width':'300px'});

            if (big == 'width' && big_value >300)
            {

              $('#target').css({'width':'300px','height':'auto'});
              $('#avatar').css({ 'height':(300-(300-300/big_value*h)) + 'px','padding-top':(300-300/big_value*h)/2 + 'px','padding-bottom':(300-300/big_value*h)/2 + 'px'})

            } else {

              $('#target').css({'height':'300px','width':'auto'});
              $('#avatar').css({ 'width':(300-(300-300/big_value*w)) + 'px','padding-left':(300-300/big_value*w)/2 + 'px','padding-right':(300-300/big_value*w)/2 + 'px'})
            }
            $('#f').val(big_value/300);

            typeof window.jcrop != 'undefined'?window.jcrop.destroy():false;

             // crop avtar
          // Create variables (in this scope) to hold the API and image size
          var jcrop_api,
              boundx,
              boundy,

              // Grab some information about the preview pane
              $preview = $('#preview-pane'),
              $pcnt = $('#preview-pane .preview-container'),
              $pimg = $('#preview-pane .preview-container img'),

              xsize = $pcnt.width(),
              ysize = $pcnt.height();



              // console.log('init',[xsize,ysize]);
              $('#target').Jcrop({
                onChange: updatePreview,
                onSelect: updatePreview,
                setSelect: dot_postion,
                aspectRatio: xsize / ysize
              },function(){
                // Use the API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];
                // Store the API in the jcrop_api variable
                window.jcrop = jcrop_api = this;

                updatePreview(window.tmp_crop);

                // Move the preview into the jcrop container for css positioning
                // $preview.appendTo(jcrop_api.ui.holder);
              });

              function updatePreview(c)
              {
                showCoords(c);
                if (parseInt(c.w) > 0)
                {
                  var rx = xsize / c.w;
                  var ry = ysize / c.h;

                  $pimg.css({
                    width: Math.round(rx * boundx) + 'px',
                    height: Math.round(ry * boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                  });
                }
              };

               function showCoords(c)
              {
                window.tmp_crop = c;
                $('#x1').val(c.x);
                $('#y1').val(c.y);
                $('#x2').val(c.x2);
                $('#y2').val(c.y2);
                $('#w').val(c.w);
                $('#h').val(c.h);
              };

          }
      }

      // change random company

      $('#change-random-company').click(function () {
      	var company_location = $(this).attr('company-location');

      	var change_company = $.ajax({
            url: window.site_url + "/company/get_random",
            data:{com_id:$('#com_id_value').attr('com_id'),scope_id:$('#scope_id_value').attr('scope_id'),company_location:company_location},
            type: "POST",
            dataType: "html"
          });

		change_company.done(function(msg) {

			 if (msg)
			 {
			 	$('#company-similar').empty().html(msg);
			 }

		});
		return false;
      });
			
		// change random product
		$('#change-random-product').click(function () {
			// var site_url = "http://itjuzi.niandev.com/itjuzi/";
			var change_company = $.ajax({
				url: window.site_url + "product/get_random",
				data:{product_id:$("input[name='product_id_value']").val(),scope_id:$("input[name='scope_id_value']").val(),company_location:$("input[name='com_location']").val()},
				type: "POST",
				dataType: "html"
				});
			change_company.done(function(msg) {
			 if (msg)
			 {
			 	$('#product-similar').empty().html(msg);
			 }

			});
			return false;
    });
});


/* optional triggers

$(window).load(function() {

});

$(window).resize(function() {

});

*/


})(window.jQuery);



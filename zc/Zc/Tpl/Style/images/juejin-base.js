window.pageConfig=window.pageConfig||{};
var TrimPath;
(function() {
    if (TrimPath == null) TrimPath = new Object();
    if (TrimPath.evalEx == null) TrimPath.evalEx = function(src) {
        return eval(src);
    };
    var UNDEFINED;
    if (Array.prototype.pop == null) Array.prototype.pop = function() {
        if (this.length === 0) {
            return UNDEFINED;
        }
        return this[--this.length];
    };
    if (Array.prototype.push == null) Array.prototype.push = function() {
        for (var i = 0; i < arguments.length; ++i) {
            this[this.length] = arguments[i];
        }
        return this.length;
    };
    TrimPath.parseTemplate = function(tmplContent, optTmplName, optEtc) {
        if (optEtc == null) optEtc = TrimPath.parseTemplate_etc;
        var funcSrc = parse(tmplContent, optTmplName, optEtc);
        var func = TrimPath.evalEx(funcSrc, optTmplName, 1);
        if (func != null) return new optEtc.Template(optTmplName, tmplContent, funcSrc, func, optEtc);
        return null;
    }
    try {
        String.prototype.process = function(context, optFlags) {
            var template = TrimPath.parseTemplate(this, null);
            if (template != null) return template.process(context, optFlags);
            return this;
        }
    } catch (e) {}
    TrimPath.parseTemplate_etc = {};
    TrimPath.parseTemplate_etc.statementTag = "forelse|for|if|elseif|else|var|macro";
    TrimPath.parseTemplate_etc.statementDef = {
        "if": {
            delta: 1,
            prefix: "if (",
            suffix: ") {",
            paramMin: 1
        },
        "else": {
            delta: 0,
            prefix: "} else {"
        },
        "elseif": {
            delta: 0,
            prefix: "} else if (",
            suffix: ") {",
            paramDefault: "true"
        },
        "/if": {
            delta: -1,
            prefix: "}"
        },
        "for": {
            delta: 1,
            paramMin: 3,
            prefixFunc: function(stmtParts, state, tmplName, etc) {
                if (stmtParts[2] != "in") throw new etc.ParseError(tmplName, state.line, "bad for loop statement: " + stmtParts.join(' '));
                var iterVar = stmtParts[1];
                var listVar = "__LIST__" + iterVar;
                return ["var ", listVar, " = ", stmtParts[3], ";", "var __LENGTH_STACK__;", "if (typeof(__LENGTH_STACK__) == 'undefined' || !__LENGTH_STACK__.length) __LENGTH_STACK__ = new Array();", "__LENGTH_STACK__[__LENGTH_STACK__.length] = 0;", "if ((", listVar, ") != null) { ", "var ", iterVar, "_ct = 0;", "for (var ", iterVar, "_index in ", listVar, ") { ", iterVar, "_ct++;", "if (typeof(", listVar, "[", iterVar, "_index]) == 'function') {continue;}", "__LENGTH_STACK__[__LENGTH_STACK__.length - 1]++;", "var ", iterVar, " = ", listVar, "[", iterVar, "_index];"].join("");
            }
        },
        "forelse": {
            delta: 0,
            prefix: "} } if (__LENGTH_STACK__[__LENGTH_STACK__.length - 1] == 0) { if (",
            suffix: ") {",
            paramDefault: "true"
        },
        "/for": {
            delta: -1,
            prefix: "} }; delete __LENGTH_STACK__[__LENGTH_STACK__.length - 1];"
        },
        "var": {
            delta: 0,
            prefix: "var ",
            suffix: ";"
        },
        "macro": {
            delta: 1,
            prefixFunc: function(stmtParts, state, tmplName, etc) {
                var macroName = stmtParts[1].split('(')[0];
                return ["var ", macroName, " = function", stmtParts.slice(1).join(' ').substring(macroName.length), "{ var _OUT_arr = []; var _OUT = { write: function(m) { if (m) _OUT_arr.push(m); } }; "].join('');
            }
        },
        "/macro": {
            delta: -1,
            prefix: " return _OUT_arr.join(''); };"
        }
    }
    TrimPath.parseTemplate_etc.modifierDef = {
        "eat": function(v) {
            return "";
        },
        "escape": function(s) {
            return String(s).replace(/&/g, "&").replace(/</g, "<").replace(/>/g, ">");
        },
        "capitalize": function(s) {
            return String(s).toUpperCase();
        },
        "default": function(s, d) {
            return s != null ? s : d;
        }
    }
    TrimPath.parseTemplate_etc.modifierDef.h = TrimPath.parseTemplate_etc.modifierDef.escape;
    TrimPath.parseTemplate_etc.Template = function(tmplName, tmplContent, funcSrc, func, etc) {
        this.process = function(context, flags) {
            if (context == null) context = {};
            if (context._MODIFIERS == null) context._MODIFIERS = {};
            if (context.defined == null) context.defined = function(str) {
                return (context[str] != undefined);
            };
            for (var k in etc.modifierDef) {
                if (context._MODIFIERS[k] == null) context._MODIFIERS[k] = etc.modifierDef[k];
            }
            if (flags == null) flags = {};
            var resultArr = [];
            var resultOut = {
                write: function(m) {
                    resultArr.push(m);
                }
            };
            try {
                func(resultOut, context, flags);
            } catch (e) {
                if (flags.throwExceptions == true) throw e;
                var result = new String(resultArr.join("") + "[ERROR: " + e.toString() + (e.message ? '; ' + e.message : '') + "]");
                result["exception"] = e;
                return result;
            }
            return resultArr.join("");
        }
        this.name = tmplName;
        this.source = tmplContent;
        this.sourceFunc = funcSrc;
        this.toString = function() {
            return "TrimPath.Template [" + tmplName + "]";
        }
    }
    TrimPath.parseTemplate_etc.ParseError = function(name, line, message) {
        this.name = name;
        this.line = line;
        this.message = message;
    }
    TrimPath.parseTemplate_etc.ParseError.prototype.toString = function() {
        return ("TrimPath template ParseError in " + this.name + ": line " + this.line + ", " + this.message);
    }
    var parse = function(body, tmplName, etc) {
        body = cleanWhiteSpace(body);
        var funcText = ["var TrimPath_Template_TEMP = function(_OUT, _CONTEXT, _FLAGS) { with (_CONTEXT) {"];
        var state = {
            stack: [],
            line: 1
        };
        var endStmtPrev = -1;
        while (endStmtPrev + 1 < body.length) {
            var begStmt = endStmtPrev;
            begStmt = body.indexOf("{", begStmt + 1);
            while (begStmt >= 0) {
                var endStmt = body.indexOf('}', begStmt + 1);
                var stmt = body.substring(begStmt, endStmt);
                var blockrx = stmt.match(/^\{(cdata|minify|eval)/);
                if (blockrx) {
                    var blockType = blockrx[1];
                    var blockMarkerBeg = begStmt + blockType.length + 1;
                    var blockMarkerEnd = body.indexOf('}', blockMarkerBeg);
                    if (blockMarkerEnd >= 0) {
                        var blockMarker;
                        if (blockMarkerEnd - blockMarkerBeg <= 0) {
                            blockMarker = "{/" + blockType + "}";
                        } else {
                            blockMarker = body.substring(blockMarkerBeg + 1, blockMarkerEnd);
                        }
                        var blockEnd = body.indexOf(blockMarker, blockMarkerEnd + 1);
                        if (blockEnd >= 0) {
                            emitSectionText(body.substring(endStmtPrev + 1, begStmt), funcText);
                            var blockText = body.substring(blockMarkerEnd + 1, blockEnd);
                            if (blockType == 'cdata') {
                                emitText(blockText, funcText);
                            } else if (blockType == 'minify') {
                                emitText(scrubWhiteSpace(blockText), funcText);
                            } else if (blockType == 'eval') {
                                if (blockText != null && blockText.length > 0) funcText.push('_OUT.write( (function() { ' + blockText + ' })() );');
                            }
                            begStmt = endStmtPrev = blockEnd + blockMarker.length - 1;
                        }
                    }
                } else if (body.charAt(begStmt - 1) != '$' && body.charAt(begStmt - 1) != '\\') {
                    var offset = (body.charAt(begStmt + 1) == '/' ? 2 : 1);
                    if (body.substring(begStmt + offset, begStmt + 10 + offset).search(TrimPath.parseTemplate_etc.statementTag) == 0) break;
                }
                begStmt = body.indexOf("{", begStmt + 1);
            }
            if (begStmt < 0) break;
            var endStmt = body.indexOf("}", begStmt + 1);
            if (endStmt < 0) break;
            emitSectionText(body.substring(endStmtPrev + 1, begStmt), funcText);
            emitStatement(body.substring(begStmt, endStmt + 1), state, funcText, tmplName, etc);
            endStmtPrev = endStmt;
        }
        emitSectionText(body.substring(endStmtPrev + 1), funcText);
        if (state.stack.length != 0) throw new etc.ParseError(tmplName, state.line, "unclosed, unmatched statement(s): " + state.stack.join(","));
        funcText.push("}}; TrimPath_Template_TEMP");
        return funcText.join("");
    }
    var emitStatement = function(stmtStr, state, funcText, tmplName, etc) {
        var parts = stmtStr.slice(1, -1).split(' ');
        var stmt = etc.statementDef[parts[0]];
        if (stmt == null) {
            emitSectionText(stmtStr, funcText);
            return;
        }
        if (stmt.delta < 0) {
            if (state.stack.length <= 0) throw new etc.ParseError(tmplName, state.line, "close tag does not match any previous statement: " + stmtStr);
            state.stack.pop();
        }
        if (stmt.delta > 0) state.stack.push(stmtStr);
        if (stmt.paramMin != null && stmt.paramMin >= parts.length) throw new etc.ParseError(tmplName, state.line, "statement needs more parameters: " + stmtStr);
        if (stmt.prefixFunc != null) funcText.push(stmt.prefixFunc(parts, state, tmplName, etc));
        else funcText.push(stmt.prefix);
        if (stmt.suffix != null) {
            if (parts.length <= 1) {
                if (stmt.paramDefault != null) funcText.push(stmt.paramDefault);
            } else {
                for (var i = 1; i < parts.length; i++) {
                    if (i > 1) funcText.push(' ');
                    funcText.push(parts[i]);
                }
            }
            funcText.push(stmt.suffix);
        }
    }
    var emitSectionText = function(text, funcText) {
        if (text.length <= 0) return;
        var nlPrefix = 0;
        var nlSuffix = text.length - 1;
        while (nlPrefix < text.length && (text.charAt(nlPrefix) == '\n'))
        nlPrefix++;
        while (nlSuffix >= 0 && (text.charAt(nlSuffix) == ' ' || text.charAt(nlSuffix) == '\t'))
        nlSuffix--;
        if (nlSuffix < nlPrefix) nlSuffix = nlPrefix;
        if (nlPrefix > 0) {
            funcText.push('if (_FLAGS.keepWhitespace == true) _OUT.write("');
            var s = text.substring(0, nlPrefix).replace('\n', '\\n');
            if (s.charAt(s.length - 1) == '\n') s = s.substring(0, s.length - 1);
            funcText.push(s);
            funcText.push('");');
        }
        var lines = text.substring(nlPrefix, nlSuffix + 1).split('\n');
        for (var i = 0; i < lines.length; i++) {
            emitSectionTextLine(lines[i], funcText);
            if (i < lines.length - 1) funcText.push('_OUT.write("\\n");\n');
        }
        if (nlSuffix + 1 < text.length) {
            funcText.push('if (_FLAGS.keepWhitespace == true) _OUT.write("');
            var s = text.substring(nlSuffix + 1).replace('\n', '\\n');
            if (s.charAt(s.length - 1) == '\n') s = s.substring(0, s.length - 1);
            funcText.push(s);
            funcText.push('");');
        }
    }
    var emitSectionTextLine = function(line, funcText) {
        var endMarkPrev = '}';
        var endExprPrev = -1;
        while (endExprPrev + endMarkPrev.length < line.length) {
            var begMark = "${",
                endMark = "}";
            var begExpr = line.indexOf(begMark, endExprPrev + endMarkPrev.length);
            if (begExpr < 0) break;
            if (line.charAt(begExpr + 2) == '%') {
                begMark = "${%";
                endMark = "%}";
            }
            var endExpr = line.indexOf(endMark, begExpr + begMark.length);
            if (endExpr < 0) break;
            emitText(line.substring(endExprPrev + endMarkPrev.length, begExpr), funcText);
            var exprArr = line.substring(begExpr + begMark.length, endExpr).replace(/\|\|/g, "#@@#").split('|');
            for (var k in exprArr) {
                if (exprArr[k].replace) exprArr[k] = exprArr[k].replace(/#@@#/g, '||');
            }
            funcText.push('_OUT.write(');
            emitExpression(exprArr, exprArr.length - 1, funcText);
            funcText.push(');');
            endExprPrev = endExpr;
            endMarkPrev = endMark;
        }
        emitText(line.substring(endExprPrev + endMarkPrev.length), funcText);
    }
    var emitText = function(text, funcText) {
        if (text == null || text.length <= 0) return;
        text = text.replace(/\\/g, '\\\\');
        text = text.replace(/\n/g, '\\n');
        text = text.replace(/"/g, '\\"');
        funcText.push('_OUT.write("');
        funcText.push(text);
        funcText.push('");');
    }
    var emitExpression = function(exprArr, index, funcText) {
        var expr = exprArr[index];
        if (index <= 0) {
            funcText.push(expr);
            return;
        }
        var parts = expr.split(':');
        funcText.push('_MODIFIERS["');
        funcText.push(parts[0]);
        funcText.push('"](');
        emitExpression(exprArr, index - 1, funcText);
        if (parts.length > 1) {
            funcText.push(',');
            funcText.push(parts[1]);
        }
        funcText.push(')');
    }
    var cleanWhiteSpace = function(result) {
        result = result.replace(/\t/g, "    ");
        result = result.replace(/\r\n/g, "\n");
        result = result.replace(/\r/g, "\n");
        result = result.replace(/^(\s*\S*(\s+\S+)*)\s*$/, '$1');
        return result;
    }
    var scrubWhiteSpace = function(result) {
        result = result.replace(/^\s+/g, "");
        result = result.replace(/\s+$/g, "");
        result = result.replace(/\s+/g, " ");
        result = result.replace(/^(\s*\S*(\s+\S+)*)\s*$/, '$1');
        return result;
    }
    TrimPath.parseDOMTemplate = function(elementId, optDocument, optEtc) {
        if (optDocument == null) optDocument = document;
        var element = optDocument.getElementById(elementId);
        var content = element.value;
        if (content == null) content = element.innerHTML;
        content = content.replace(/</g, "<").replace(/>/g, ">");
        return TrimPath.parseTemplate(content, elementId, optEtc);
    }
    TrimPath.processDOMTemplate = function(elementId, context, optFlags, optDocument, optEtc) {
        return TrimPath.parseDOMTemplate(elementId, optDocument, optEtc).process(context, optFlags);
    }
})();

(function($){
    $.fn.Jrslider=function(option,callback){
        if(!this.length)return;
        if (typeof option == "function") {
            callback = option;
            option = {};
        }
        var settings=$.extend({
            auto:false,
            reInit:false,//ÖØÐÂ³õÊ¼»¯
            data:[],
            defaultIndex:0,
            slideWidth:0,
            slideHeight:0,
            slideDirection:1,//1,left;2,up;3,fadeIn
            speed:"normal",
            stay:5000,
            delay:150,
            maxAmount:null,
            template:null,
            showControls:true
        },option||{});

        var element=$(this),
        elementItems=null,
        elementControls=null,
        elementControlsItems=null,
        mainTimer=null,
        controlTimer=null,
        init=function(){
            var object;
            if(settings.maxAmount&&settings.maxAmount<settings.data.length){
                // settings.data.splice(settings.maxAmount);
                settings.data.splice(settings.maxAmount,settings.data.length-settings.maxAmount);
            }
            if(typeof settings.data=="object"){
                if(settings.data.length){
                    object={};
                    object.json=settings.data;
                }else{
                    object=settings.data;
                }
            }
            var template=settings.template;
            if(settings.reInit){
                var htmlItems,
                    htmlControls=template.controlsContent.process(object);
                object.json=object.json.slice(1);
                htmlItems=template.itemsContent.process(object);
                element.find(".slide-items").eq(0).append(htmlItems);
                element.find(".slide-controls").eq(0).html(htmlControls);
            }else{
                var newTemplate=template.itemsWrap.replace("{innerHTML}",template.itemsContent)+template.controlsWrap.replace("{innerHTML}",template.controlsContent),
                    html=newTemplate.process(object);
                element.html(html);
            }
            elementItems=element.find(".slide-items");
            elementControls=element.find(".slide-controls");
            elementControlsItems=elementControls.find("span");
            bindEvents();
            autoRun();
            if(callback)callback(element);
        },
        bindEvents=function(){
            elementControlsItems.bind("mouseover",function(){
                var index=elementControlsItems.index(this);
                if(index==settings.defaultIndex)return;
                clearTimeout(controlTimer);
                clearInterval(mainTimer);
                controlTimer=setTimeout(function(){
                    play(index);
                },settings.delay);
            }).bind("mouseleave",function(){
                clearTimeout(controlTimer);
                clearInterval(mainTimer);
                autoRun();
            });

            elementItems.bind("mouseover",function(){
                clearTimeout(controlTimer);
                clearInterval(mainTimer);
            }).bind("mouseleave",function(){
                autoRun();
            });
        },
        play=function(index){
            elementControlsItems.each(function(i){
                if(i==index){
                    $(this).addClass("curr");
                }else{
                    $(this).removeClass("curr");
                }
            });
            var left=0,top=0;
            if(settings.slideDirection==3){
                var children=elementItems.children(),
                last=children.eq(settings.defaultIndex),
                current=children.eq(index);
                last.fadeOut(settings.speed,function(){
                    last.css({"zIndex":0});
                    current.css({"zIndex":1});
                });
                current.fadeIn(0);
                settings.defaultIndex=index;
            }else{
                if(settings.slideDirection==1){//ºáÏò
                    elementItems.css({"width":settings.slideWidth*settings.data.length});
                    left=-settings.slideWidth*index
                }else{//×ÝÏò
                    top=-settings.slideHeight*index
                }
                elementItems.animate({
                    top:top+"px",
                    left:left+"px"
                },
                settings.speed,
                function(){
                    settings.defaultIndex=index
                })
            }
        },
        autoRun=function(){
            if(settings.auto){
                mainTimer=setInterval(function(){
                    var v=settings.defaultIndex;
                    v++;
                    if(v==settings.data.length){
                        v=0;
                    }
                    play(v);
                },settings.stay)
            }
        };
        init();
    }
})(jQuery);
(function($) {
    $.fn.Jtab = function(option, callback) {
		if(!this.length)return;
        if (typeof option == "function") {
            callback = option;
            option = {};
        }
        var settings = $.extend({
            type: "static",
            auto: false,
            event: "mouseover",
            currClass: "curr",
            source: "data-tag",
			hookKey:"data-widget",
			hookItemVal: "tab-item",
            hookContentVal: "tab-content",
            stay: 5000,
            delay: 100,
			threshold:null,
            mainTimer: null,
            subTimer: null,
            index: 0,
			compatible:false
        }, option || {});
        var items = $(this).find("*["+settings.hookKey+"="+settings.hookItemVal+"]"),
            contens = $(this).find("*["+settings.hookKey+"="+settings.hookContentVal+"]"),
			isUrl = settings.source.toLowerCase().match(/http:\/\/|\d|\.aspx|\.ascx|\.asp|\.php|\.html\.htm|.shtml|.js/g);
			
        if (items.length != contens.length) {
            return false;
        }

        var init = function(index, tag) {
            settings.subTimer = setTimeout(function() {
				items.eq(settings.index).removeClass(settings.currClass);
				if(settings.compatible){
					contens.eq(settings.index).hide();
				}
                if (tag) {
                    settings.index++;
					//settings.threshold=settings.threshold?settings.threshold:items.length;
                    if (settings.index == items.length) {
                        settings.index = 0;
                    }
                } else {
                    settings.index = index;
                }
                settings.type = (items.eq(settings.index).attr(settings.source) != null) ? "dynamic" : "static";
                rander();
            }, settings.delay);
        };
        var autoRun = function() {
            settings.mainTimer = setInterval(function() {
                init(settings.index, true);
            }, settings.stay);
        };
        var rander = function() {
            items.eq(settings.index).addClass(settings.currClass);
				if(settings.compatible){
					contens.eq(settings.index).show();
				}
            switch (settings.type) {
				default:
				case "static":
					var source = "";
					break;
				case "dynamic":
					var source = (!isUrl) ? items.eq(settings.index).attr(settings.source) : settings.source;
					items.eq(settings.index).removeAttr(settings.source);
					break;
            }
            if (callback) {
                callback(source, contens.eq(settings.index), settings.index);
            }
        };
		//
        items.each(function(i) {
            $(this).bind(settings.event, function() {
                clearTimeout(settings.subTimer);
                clearInterval(settings.mainTimer);
                init(i, false);
            }).bind("mouseleave", function() {
                if (settings.auto) {
                    autoRun();
                } else {
                    return;
                }
            });
        });
        if (settings.type == "dynamic") {
            init(settings.index, false);
        }
        if (settings.auto) {
            autoRun();
        }
    };
})(jQuery);

$(".flow-nav").hover(function(){$(this).find(".tit").addClass("curr-tit");$(this).find(".con").show()},function(){$(this).find(".tit").removeClass("curr-tit");$(this).find(".con").hide()}); 
 // table
$(".grid").each(function() {
    $(this).find("tbody tr").hover(function() {
        $(this).addClass("select");
    }, function() {
        $(this).removeClass("select");
    }), $(this).find("thead th:first-child .checkbox").click(function() {
        $(this).attr("checked") ? $(this).parents(".grid").find("tbody tr").addClass("pitch").find("td:first-child .checkbox").attr("checked", !0) :$(this).parents(".grid").find("tbody tr").removeClass("pitch").find(".checkbox").attr("checked", !1);
    }), $(this).find("tbody td:first-child .checkbox").each(function() {
        $(this).attr("checked") ? $(this).parents("tr").addClass("pitch") :$(this).parents("tr").removeClass("pitch"), 
        $(this).click(function() {
            $(this).attr("checked") ? $(this).parents("tr").addClass("pitch") :($(this).parents("tr").removeClass("pitch"), 
            $(this).parents(".grid").find("thead .checkbox").attr("checked", !1));
        });
    });
});
$(".open-up :checkbox").click(function(){
    $(this).parents(".open-up").toggleClass("open");
})
$(".roll-out").each(
    function(){
        var changecard=$(this).find(".changecard");
        var $ccardlen=$(this).find(".changecard:gt(0)");
        $ccardlen.hide();
        $(".morecard .fore01").click(
            function(){
                $(this).hide();
                $ccardlen.show()
            }
            )
        changecard.click(
            function(){
                $(this).addClass("selectcard").find(".radio").attr("checked","checked");
                $(this).siblings().removeClass("selectcard").find(".radio").removeAttr("checked")

            }
            )

    }
    )
$(".box-word").hover(
function(){
if($(this).find(".list-word ").children("li").length > 3){
$(this).find(".list-word ").addClass("boxhover");
}},function(){
if($(this).find(".list-word ").children("li").length > 3){
$(this).find(".list-word").removeClass("boxhover");
}});


				
//立即买入行在出现滚动条时吸底
var dh=$(document).height();
var wh=$(window).height(); 
var val=dh-wh;
if(val>0)
{
    $(".line-fixed").css({"position":"fixed","bottom":"0"});
}
//鼠标滑过向左滚动     
var timer=null;
$(".memo .line").hover(function(){
    var that=$(this);
    timer=setTimeout(function(){
        that.animate({left:"-120px"})
    },300)
},function(){
    clearTimeout(timer);
    $(this).animate({left:"0px"});
})
//logo下方分类的显示与隐藏   
var timer2=null; 
$(".logo-hover").hover(function(){
    $(this).find(".classify").slideDown(1000);
},function(){
    var ths=$(this);
    timer2=setTimeout(function(){
        ths.find(".classify").slideUp(1000)
    },500)
})
$("#header .con li:last").addClass("last");
function stopBubble(e) {
    if (e && e.stopPropagation)
        e.stopPropagation();
    else
        window.event.cancelBubble = true;
}
function auto_close(timeout) {
  window.setTimeout(function(){
    if($('#mask').length > 0){
      $('#mask').click();
    }
  }, timeout || 2000);
}
function is_logined() {
  return $.cookie('front_identity') !== null;
}
function load_html (url,callback) {
  var cache = window['url_data_cache'] || {};
  if(cache && cache[url]) {
      if($.isFunction(callback)){
        callback(cache[url]);
      }
  }else{
    //show loading
    $('<div style="display:none;"></div>').load(url+'?v='+new Date().getTime(), function (content) {
      cache[url] = content;
      window['url_data_cache'] = cache;
      if($.isFunction(callback)){
        callback(content);
      }
    });
  }
}
function show_win (json) {
  if(json.url){
    load_html(json.url, function (content) {
      json.body = content;
      delete json.url;
      show_win(json);
    });
    return;
  }
  if($('#mask').length === 0 ){
    $(document.body).append('<div id="mask"></div>');
  }
  if($('#dialog').length === 0 ){
    $(document.body).append('<div id="dialog"></div>');
  }
  var mask = $('#mask'), dialog = $('#dialog');
  var part = '';
  if(json.message){
    part += '      <span class="text">'+json.message+'</span>';
  }else if(json.fullbody){
    part += json.fullbody;
  }else{
    part +='      <div class="title opacity90">'+json.title+'<span class="pull-right exit"></span></div>';
    part +='      <div class="body">'+json.body+'</div>';
  }
  dialog.html(part);
  var free_width = $(window).width()-dialog.width(), free_height = $(window).height()-dialog.height();
  dialog.css({left:free_width/2,top:free_height/2}).click(function (evt) {
    stopBubble(evt);
  });
  if($.isFunction(json.ready)){
    json.ready(dialog);
  }
  $(window).resize(function () {
    dialog.css({left:($(window).width()-dialog.width())/2, top:($(window).height()-dialog.height())/2});
  });
  $('#mask, .exit').click(function (evt) {
    dialog.animate({top:-500},200,function(){
      mask.fadeOut(200,function () {
        mask.remove();
      });
      dialog.remove();
    });
    stopBubble(evt);
  });
}
function showtips (msg) {
  show_win({message:msg});
}
function checkval() {
  for (var i = 0; i < arguments.length; i++) {
    if($.trim(arguments[i].val()) === '')
      return arguments[i];
  }
  return false;
}
function showerr(obj, msg) {
  obj.val('').addClass('input_error');
  if(msg){
    obj.attr('placeholder', msg);
  }
}
function init_login() {
  //init
  $('#panel_login').removeClass('hide').addClass('init_login_done');
  $('#top_login_btn').click(ajax_login);
  $('#top_login_uname,#top_login_upwd').keypress(function (keyEvt) {
    $(this).removeClass('input_error');
    if(keyEvt.which == 13){
      ajax_login();
    }
  });
  $('#top_login_uname').focus();
}
function init_register() {
  //init
  $('#panel_register').removeClass('hide').addClass('init_register_done');
  $('#top_reg_btn').click(ajax_register);
  $('#top_reg_uname,#top_reg_email,#top_reg_upwd').keypress(function (keyEvt) {
    $(this).removeClass('input_error');
    if(keyEvt.which == 13){
      ajax_register();
    }
  });
  $('#top_reg_uname').focus();
}

function toggle_login_register() {
    var c = 'hide', login = $('#panel_login'), register = $('#panel_register');
    if(login.hasClass(c)){
      login.removeClass(c).find(':text:first').focus();
      if(!login.hasClass('init_login_done')){
        init_login();
      }
      register.addClass(c);
    }else{
      register.removeClass(c).find(':text:first').focus();
      if(!register.hasClass('init_register_done')){
        init_register();
      }
      login.addClass(c);
    }
    return false;
}
function open_dialog (m, evt) {
    if($('#dialog_body').length === 0){
      $(document.body).append('<div id="dialog_body"></div>');
    }
    if($('#open_login').length === 0){
      load_html('/asset/v2/html/login_html.html', function (content) {
        $('#dialog_body').html(content);
        open_dialog(m, evt);
      });
    } else {
      var dialog = $('#dialog_body'), free_width = $(window).width()-dialog.width();
      dialog.html($('#open_login')).find('.panel').addClass('hide');
      dialog.css({left:free_width/2}).animate({top:150}, 200);
      var func = function () {
        dialog.animate({top:-600}, 200, function(){dialog.remove();});
        $(document.documentElement).unbind('click', func);
      };
      $(document.documentElement).bind('click', func);
      dialog.click(function (evt2) { stopBubble(evt2); });
      stopBubble(evt);

      $(window).resize(function () {
        dialog.css({left:($(window).width()-dialog.width())/2});
      });

      if(m=='login'){
        init_login();
      }else{
        init_register();
      }
  }
  return false;
}

var login_lock = false, regist_lock = false;

function ajax_login() {
  if(login_lock) return;
  var uname = $('#top_login_uname'), upwd = $('#top_login_upwd');
  var obj = checkval(uname,upwd);
  if(obj){
    obj.focus();
    return;
  }
  login_lock = true;
  $.post(
    '/user/ajax/login',
    {uname:uname.val(), upwd:upwd.val(), remember:$('#remember').is(':checked')},
    function (json) {
      login_lock = false;
    if(json.success){
      $(document.documentElement).click();
      location.reload();
    }else{
      if(json.errtype){
        showerr(uname);
      }else{
        showerr(upwd);
      }
    }
  }, 'json');
}

function ajax_register () {
  if(regist_lock) return;
  var uname = $('#top_reg_uname'), email = $('#top_reg_email'), upwd = $('#top_reg_upwd');
  var obj = checkval(uname,email,upwd);
  if(obj){
    obj.focus();
    return;
  }
  regist_lock = true;
  $.post(
    '/user/ajax/register',
    {uname:uname.val(), email:email.val(), upwd:upwd.val()},
    function (json) {
      regist_lock = false;
    if(json.success){
      $(document.documentElement).click();
      showtips('注册成功，请立即前往激活您的帐号。');
    }else{
      if(json.target){
        showerr($('#'+json.target), json.msg);
      }
    }
  }, 'json');
}

function show_forgot_password () {
  show_win({
    title: '找回密码',
    url : '/asset/v2/html/forgot_password.html',
    ready: function (dialog) {
      if(!dialog) return;
      var btn = dialog.find('.btn'), input = dialog.find('#email');
      btn.click(function () {
        var target = $(this);
        if(target.hasClass('loading')) return;
        var obj = checkval(input);
        if(obj){
          obj.focus();
          return;
        }
        target.addClass('loading');
        $.post(
          '/user/ajax/forgot_password',
          {email:input.val()},
          function (json) {
            target.removeClass('loading');
            if(json.success){
              dialog.find('.body').html('<span class="text" style="margin:auto 0;">'+json.msg.replace(/\<([^\>]*)\>/g, '')+"</span>");
            }else{
              showerr(input, json.msg);
            }
        }, 'json');
      });
      input.keypress(function (keyEvt) {
        $(this).removeClass('input_error');
        if(keyEvt.which == 13){
          btn.click();
        }
      });
      input.focus();
    }
  });
}

function show_add_mile_stone (id, evt) {
  if(!is_logined()){
    open_dialog('login', evt);
    return false;
  }
  show_win({
    title: '添加发展里程碑',
    url : '/asset/v2/html/add_mile_stone.html',
    ready: function (dialog) {
      if(!dialog) return;
      var btn = dialog.find('.btn'), com_mil_year = dialog.find('#com_mil_year'), com_mil_month = dialog.find('#com_mil_month'), com_mil_detail = $('#com_mil_detail');
      btn.click(function () {
        var target = $(this);
        if(target.hasClass('loading')) return;
        var obj = checkval(com_mil_year, com_mil_detail);
        if(obj){
          obj.focus();
          return;
        }
        target.addClass('loading');
        $.post(
          '/add/ajax/mile_stone',
          {com_id:id, com_mil_year:com_mil_year.val(), com_mil_month:com_mil_month.val(), com_mil_detail:com_mil_detail.val()},
          function (json) {
            target.removeClass('loading');
            if(json.success){
              dialog.find('.body').html('<span class="text" style="margin:auto 30px;">添加成功，感谢您参与贡献！</span>');
              auto_close();
            }else{
              if(json.msg) { alert(json.msg); }
            }
        }, 'json');
      });
      com_mil_year.focus();
    }
  });
}

function show_claim_company (id, evt) {
  if(!is_logined()){
    open_dialog('login', evt);
    return false;
  }
  show_win({
    title: '认领公司',
    url : '/asset/v2/html/claim_company.html',
    ready: function (dialog) {
      if(!dialog) return;
      var btn = dialog.find('.btn'), 
      claim_name = dialog.find('#claim_name'), 
      claim_des = dialog.find('#claim_des'), 
      claim_mobile = dialog.find('#claim_mobile'), 
      claim_email = dialog.find('#claim_email');

      btn.click(function () {
        var target = $(this);
        if(target.hasClass('loading')) return;
        var obj = checkval(claim_name, claim_des, claim_mobile, claim_email);
        if(obj){
          obj.focus();
          return;
        }
        target.addClass('loading');
        $.post(
          '/add/ajax/claim_company',
          {com_id:id, claim_name:claim_name.val(), claim_des:claim_des.val(), claim_mobile:claim_mobile.val(), claim_email:claim_email.val()},
          function (json) {
            target.removeClass('loading');
            if(json.success){
              dialog.find('.body').html('<span class="text" style="margin:auto 30px;">认领成功，感谢您在IT桔子认领网站！</span>');
              auto_close();
            }else{
              if(json.msg) { alert(json.msg); }
            }
        }, 'json');
      });
      claim_name.focus();
    }
  });
}

function show_add_product (id, evt) {
  if(!is_logined()){
    open_dialog('login', evt);
    return false;
  }
  show_win({
    title: '添加产品',
    url : '/asset/v2/html/add_product.html',
    ready: function (dialog) {
      if(!dialog) return;
      var btn = dialog.find('.btn'), 
      com_pro_name = dialog.find('#com_pro_name'), 
      com_pro_url = dialog.find('#com_pro_url'), 
      com_pro_type_id = dialog.find('#com_pro_type_id'), 
      com_pro_detail = dialog.find('#com_pro_detail');

      $.getJSON('/add/ajax/product',function (json) {
          for(var i=0;i<json.length;i++){
            com_pro_type_id.append('<option value="'+json[i]['com_pro_type_id']+'">'+json[i]['com_pro_type_name']+'</option>');
          }
      });

      btn.click(function () {
        var target = $(this);
        if(target.hasClass('loading')) return;
        var obj = checkval(com_pro_name);
        if(obj){
          obj.focus();
          return;
        }
        target.addClass('loading');
        $.post(
          '/add/ajax/product',
          {com_id:id, com_pro_name:com_pro_name.val(), com_pro_url:com_pro_url.val(), com_pro_type_id:com_pro_type_id.val(), com_pro_detail:com_pro_detail.val()},
          function (json) {
            target.removeClass('loading');
            if(json.success){
              dialog.find('.body').html('<span class="text" style="margin:auto 30px;">产品添加成功，感谢您参与贡献！</span>');
              auto_close();
            }else{
              if(json.msg) { alert(json.msg); }
            }
        }, 'json');
      });
      com_pro_name.focus();
    }
  });
}

function show_add_news (id, evt) {
  if(!is_logined()){
    open_dialog('login', evt);
    return false;
  }
  show_win({
    title: '添加新闻',
    url : '/asset/v2/html/add_news.html',
    ready: function (dialog) {
      if(!dialog) return;
      var btn = dialog.find('.btn'), 
      com_new_name = dialog.find('#com_new_name'), 
      com_new_year = dialog.find('#com_new_year'), 
      com_new_month = dialog.find('#com_new_month'), 
      com_new_day = dialog.find('#com_new_day'),
      com_new_url = dialog.find('#com_new_url'),
      com_new_type_id = dialog.find('#com_new_type_id');

      $.getJSON('/add/ajax/news',function (json) {
          for(var i=0;i<json.length;i++){
            com_new_type_id.append('<option value="'+json[i]['com_new_type_id']+'">'+json[i]['com_new_type_name']+'</option>');
          }
      });

      btn.click(function () {
        var target = $(this);
        if(target.hasClass('loading')) return;
        var obj = checkval(com_new_name, com_new_url);
        if(obj){
          obj.focus();
          return;
        }
        target.addClass('loading');
        $.post(
          '/add/ajax/news',
          {
            com_id:id, 
            com_new_name:com_new_name.val(), 
            com_new_year:com_new_year.val(), 
            com_new_month:com_new_month.val(), 
            com_new_day:com_new_day.val(),
            com_new_url:com_new_url.val(),
            com_new_type_id:com_new_type_id.val()
          },
          function (json) {
            target.removeClass('loading');
            if(json.success){
              dialog.find('.body').html('<span class="text" style="margin:auto 30px;">新闻添加成功，感谢您参与贡献！</span>');
              auto_close();
            }else{
              if(json.msg) { alert(json.msg); }
            }
        }, 'json');
      });
      com_new_name.focus();
    }
  });
}

function add_comment (com_id, evt) {
    if(!is_logined()){
      open_dialog('login',evt);
      return;
    }
    var commont_info = $('#comment_content');
    commont_info.keypress(function () {
      $(this).removeClass('input_error');
    });
    
    if ($.trim(commont_info.val()) == '') {
      commont_info.attr('placeholder', "请输入内容后，再提交您的评论！").addClass('input_error');
      return;
    }
    
    var commont_req        = $.ajax({
      url: window.site_url + "/commont/ajax_add",
      type: "POST",
      data: {com_id : com_id, commont_info: commont_info.val()},
      dataType: "json"
    });
    
    commont_req.done(function(msg) {
      console.log(msg);
      if (msg) {
        if (msg.status         == 'ok') {
          commont_info.val('');
          $('.comment-list').prepend(msg.detail);
        } else if ( msg.status == 'error' ||  msg.status == 'timeout' ) {
          //
        }
      }
    
    });

}



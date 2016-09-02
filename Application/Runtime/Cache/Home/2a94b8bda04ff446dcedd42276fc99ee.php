<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut  icon" type="image/x-icon" href="/Public/Home/images/logo3.ico" media="screen"  />
    <title>未来门资本</title>
    <meta name="keywords" content="未来门,未来门投资,投资管理,资本运作,金融大数据分析">
    <meta name="description" content="未未来门资本2013年在北京成立，是致力于中国三四线城市、专注优质中小微企业孵化的投行机构。2014年6月，先后在河北省秦皇岛市、内蒙古自治区通辽市设立了分公司。新常态下的中国经济正从量的增长转向质的增长，中小微企业在转型升级的进程中，面临资金“融不到、用不起”的困境。未来门资本秉承创新、协调、绿色、开放、共享的发展理念，将一线城市成熟的资本管理经验与三四线城市中小微企业的资金需求无缝对接，为民间资本进入实体经济特别是中小微企业，探索出一条可靠、高效、便捷的新路径。">
    <link href="/Public/Home/css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Home/css/slides.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
  <div class="top">
    <div class="j-row clear1 w1080">
      <div class="nav1">欢迎来到未来门资本官网</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="header clear1" > 
    <div class="logo_menu">
    	<div class="logo"><a href="<?php echo U('Index/index');?>">
		    <img src="/Public/Home/images/logo2.png" height="91" width="210"></a>
      </div>
      <div class="nav">
        <ul>
          <li class="havsub"> <a class="navtt" href="/" title="">首页</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>4));?>">走进未来门</a></li>
          <!-- <li class="havsub"><a target= "_blank" class="navtt" href="http://www.zhifengbao.com/">成功案例</a></li> -->
          <li class="havsub"><a target= "_blank" class="navtt" href="http://sansixianchou.com/">股权投资</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>5));?>">投后服务</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Zhaopin/zhaopin');?>">招贤纳士</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>3));?>">联系我们</a></li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- 首页轮播图 -->
  <div class="main_ad clear1">
	  <div class="banner" >
		  <div class="left_pic" style="width:100%;height:100%;"> 
        <div style= "width: 100%; height:100%;" class="index_conmany_banner"><!--width: 246px;-->
          <ul style= "width: 100%; height:100%;">
  						<li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/01.jpg" "/></li>
  						<li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/02.jpg" /></li>
              <li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/03.jpg" /></li>
              <li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/04.jpg" /></li>
              <li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/05.jpg" /></li>
  						<li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/3.jpg" /></li>
  						<li style="width: 100%; height:100%;"> <img style="width: 100%; height:100%;" src="/Public/Home/images/1.jpg" /></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="clear"></div>
	</div>
 <!-- 首页轮播图 END-->
 <!-- 右侧二维码 -->
  <div class="f_icon clear1">
  	<img class="box" style="width:150px;height:150px;" src="/Public/Home/images/wx.jpg">
  	<p class="zixun"><b>投资咨询：</b>
    <br>微信:未来门资本集团<br>
  	</p>
  </div>
  <!-- 右侧二维码 -->
  <!-- 集团新闻+集团概述START -->
  <div class="content clear1">
  	<!-- 集团新闻START -->
  	<div class="news_col">
    	<div class="news_title">
        <h2 style="padding-top:10px;">
  		  <font style="font-size:22px;color:#006699;">集团资讯</font>
  		  <font style="font-size:12px;margin-left:280px"><a href="<?php echo U('News/newslist');?>">更多</a></font>
  	    </h2>
        </div>
      <div class="news_con">
        <ul>
        	<?php if(is_array($news)): $i = 0; $__LIST__ = array_slice($news,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="width:400px;"><p><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></p><span><?php echo ($vo["create_time"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
  	    </ul>
      </div>
  	</div>
  	<!-- 集团新闻END -->
  	<!-- 集团概述START -->
    <div class="about_box fl clear1">
      <div class="SectionTitle">
        <h2 style="padding-top:10px;">
          <font style="font-size:22px;color:#006699;">未来门介绍</font>
          <font style="font-size:12px;margin-left:492px"><a href="<?php echo U('Article/show',array('type'=>4));?>">更多</a></font>
        </h2>
      </div>
      <div>
        <div style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left:-70px; width: 150px;" class="index_conmany">
          <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 1968px; left: -1230px;">
            <volist>
              <li style="overflow: hidden; float: left; width: 300px; height: 190px;"><img class="icon" src="/Public/Home/images/bj.jpg"></li>
              <li style="overflow: hidden; float: left; width: 300px; height: 190px;"><img class="icon" src="/Public/Home/images/qhd1.jpg"></li>
              <li style="overflow: hidden; float: left; width: 300px; height: 190px;"><img class="icon" src="/Public/Home/images/tongliao.jpg"></li>
            </volist>
           </ul>
        </div>
        <div class = "right_text">
          <p>未来门资本2013年在北京成立，是致力于中国三四线城市、专注优质中小微企业孵化的投行机构。2014年6月，先后在河北省秦皇岛市、内蒙古自治区通辽市设立了分公司。
          新常态下的中国经济正从量的增长转向质的增长，中小微企业在转型升级的进程中，面临资金“融不到、用不起”的困境。未来门资本秉承创新、协调、绿色、开放、共享的发展理念，将一线城市成熟的资本管理经验与三四线城市中小微企业的资金需求无缝对接，为民间资本进入实体经济特别是中小微企业，探索出一条可靠、高效、便捷的新路径。
          </p>
          <a class="about_more" href="<?php echo U('Article/show',array('type'=>4));?>">查看更多</a>
        </div>
      </div>
    </div>
    <!-- 集团概述END -->
    <div class="clear"></div>
  </div>
  <!-- 集团新闻+集团概述END -->
  <!-- 成功案例 -->
  <div class="index_what_box">
    <div class="index_what w1200 clear1">
      <h2>成功案例</h2>
      <div class="what_nr">     
        <div class="tempWrap" style="overflow:hidden; position:relative; height:512px">
          <div style="width: 300px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -1180px;" class="ulWrap2">
          <ul>
          <li>
            <a href="http://www.c-c-c.cn/" target="_blank" >
              <img class="icon" src="/Public/Home/images/sanfang.jpg">
              <h4>三匚创意集团</h4>
              <p>三匚创意产业集团，定位于建设国内一流的创意产业生态链，打造最具中国特色的创意经济产业链和文化旅游产业知名品牌。</p>
            </a>
          </li>  
          <li>  
            <a href="http://www.sansixianchou.com/deal-show/id-167" target="_blank">
              <img class="icon" src="/Public/Home/images/qiming.jpg">
              <h4>启明教育</h4>
              <p>启明教育是秦皇岛课外辅导与托管第一品牌。自主研发的诸葛数学、唯易英语、极速文学等教学产品，竞争力非常突出，深受学生和家长欢迎！</p>
            </a>
          </li> 
          <li>
            <a href="http://www.sansixianchou.com/deal-show/id-170" target="_blank">
              <img class="icon" src="/Public/Home/images/zhaojiaguan.jpg">
              <h4>百年老店赵家馆</h4>
              <p>赵家馆是百年老店，中华老字号、“饺子记忆”省级非物质文化遗产。</p>
            </a>
           </li> 
          <li>
            <a href="http://sansixianchou.com/deal-show/id-183" target="_blank">
              <img class="icon" src="/Public/Home/images/zhongyu.jpg">
              <h4>秦皇岛中宇有限公司</h4>
              <p>中宇安全评价有限公司是一家专业从事安全评价、重大危险源评估等技术服务中介机构。</p>
            </a>
          </li>
          <li>
            <a href="http://www.goichina.com/" target="_blank">
              <img class="icon" src="/Public/Home/images/guoaichuanmei.jpg">
              <h4>国爱传媒集团</h4>
              <p>国爱传媒集团是一家具有专业水准的综合性文化传媒集团公司，是中国电视剧制片委员会会员单位。</p>
            </a>
          </li>
        </ul>
        </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- 成功案例 END -->
  <!-- 新四板挂牌企业 -->
  <div class="siban_bg">
    <div class=" w1080 Inpartner2 siban clear1" id="SBslide">
      <h2 class="SBTitle">新四板挂牌企业</h2>
      <div class="SBTxt">
        <a class="guapainbox" href="/">
            <h2>挂牌总数</h2>
            <h1>11</h1>
        </a>
      </div>
      <div class="siban_img bd clear1">
        <div class="tempWrap" style="overflow:hidden; position:relative; height:205px">
           <div style="width: 4720px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -1180px;" class="ulWrap">
            <volist>
              <ul style="float: left; width: 1200px;" class="clone">
                <li> <a href="/">
                <img src="/Public/Home/images/201603291735141796.jpg">
                <span>广东爽爽挝啡饮品有限公司</span></a> 
                </li>
                <li> <a href="/">
                <img src="/Public/Home/images/201603291658582470.jpg">
                <span>深圳前海华盟互联网金融服务有限公司</span></a> 
                </li>
          
                <li> <a href="/">
                <img src="/Public/Home/images/201603291731232734.jpg">
                <span>宜章裕农林业发展有限公司</span></a> 
                </li>
          
                <li> <a href="/">
                <img src="/Public/Home/images/201603291729078046.jpg">
                <span>湖南猎鹰教育投资管理有限公司</span></a> 
                </li>
              <!-- </ul> -->
              <!-- <ul style="float: left; width: 1200px;" class="clone"> -->
                <li> <a href="/">
                <img src="/Public/Home/images/201603291725548691.jpg">
                <span>深圳市聚橙网络技术有限公司</span></a> </li>
          
                <li> <a href="/">
                <img src="/Public/Home/images/201603291723404687.jpg">
                <span>深圳市联和安业科技有限公司</span></a> </li>
            
                <li> <a href="/">
                <img src="/Public/Home/images/201603291717487246.jpg">
                <span>深圳市丑丑婴儿用品有限公司</span></a> </li>
            
                <li> <a href="/">
                <img src="/Public/Home/images/201603291716347070.jpg">
                <span>深圳市一世纪网络科技有限公司</span></a> </li>
              <!-- </ul> -->
              <!-- <ul style="float: left; width: 1200px;" class="clone"> -->
                <li> <a href="/">
                <img src="/Public/Home/images/201603291714095000.jpg">
                <span>河南蓝湾酒店有限公司</span></a> </li>
          
                <li> <a href="/">
                <img src="/Public/Home/images/201603291711561289.jpg">
                <span>郑州八福商贸有限公司</span></a> </li>
            
                <li> <a href="/">
                <img src="/Public/Home/images/201603291708503466.jpg">
                <span>郑州恒正新能源科技开发有限公司</span></a> 
                </li>
              </ul>  
            </volist>      
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- 新四板挂牌企业 END-->
  <!-- 战略伙伴 -->
  <div class=" w1080 Inpartner clear1" id="slide2">
    <h1 class="SBTitle">战略伙伴</h1>
    <div class="partner_img bd">
      <div class="tempWrap" style="overflow:hidden; position:relative; width:1400px">
        <div style="width: 4720px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -1580px;" class="ulWrap1">
          <ul style="float: left; width: 1200px;" class="clone">
            <li> <a href="http://www.lippoltd.com.hk/index_tc.htm" target="_blank">
            <img src="/Public/Home/images/lb.jpg">
            <span>力宝集团</span></a> </li>
            <li> <a href="http://www.ibm.com/cn-zh/">
            <img src="./Uploads/flash/2015-08-20/55d5dadfbaedc.png">
            <span>IBM</span></a> </li>
            <li> <a href="https://www.sequoiacap.com/china/" target="_blank">
            <img src="./Uploads/flash/2015-08-20/55d5db5abb599.png">
            <span>红杉资本</span></a> </li>
            <li> <a href="http://www.pedaily.cn/" target="_blank">
            <img src="./Uploads/flash/2015-08-22/55d80b4fa3abe.png">
            <span>投资界</span></a> </li>
            <li> <a href="http://www.zhenfund.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-20/55d5d9ca729ed.png">
            <span>真格基金</span></a> </li>
            <li> <a href="http://7970743.czvv.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-20/55d5da008e1a3.png">
            <span>海林股权投资</span></a> </li>
            <li> <a href="http://www.sinosoft.com.cn/" target="_blank">
            <img src="./Uploads/flash/2015-08-20/55d5da6497920.png">
            <span>中科软科技</span></a> </li>
            <li> <a href="http://www.davost.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-26/55dd74d0b287b.png">
            <span>巅峰智业</span></a> </li>
            <li> <a href="http://www.chinabdh.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-22/55d807ff05bf4.jpg">
            <span>北大荒集团</span></a> </li>
            <li> <a href="http://www.chinacf.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-22/55d80522dff65.png">
            <span>中国文化产业投资基金</span></a> </li>
            <li> <a href="http://www.jlzhongdong.com/" target="_blank">
            <img src="./Uploads/flash/2015-08-22/55d800e53502f.png"">
            <span>中东集团</span></a> </li>
            <li> <a href="http://www.cybernaut.com.cn/" target="_blank">
            <img src="./Uploads/flash/2015-08-22/55d8007585bbc.png">
            <span>赛伯乐投资集团</span></a> </li>
            <li> <a href="http://www.jingsh.com/" target="_blank">
            <img src="/Public/Home/images/jingshi.jpg">
            <span>京师律师事务所</span></a> </li>
            <li> <a href="http://www.chinastock.com.cn/" target="_blank">
            <img src="/Public/Home/images/yinhe.jpg">
            <span>中国银河证券</span></a> </li>
            <li> <a href="http://www.zts.com.cn/" target="_blank">
            <img src="/Public/Home/images/zhongtai.jpg">
            <span>中泰证券</span></a> </li>
          </ul>
        </div>
      </div>
    <div class="clear"></div>
    </div>
  </div>
  <!-- 战略伙伴 EMD -->
  <!-- 底部 -->
  <div class="footer clear1">
    <div class="j-row w1080">
      <div class="copyright">
        <div class="footnav"><a href="<?php echo U('Article/show',array('type'=>4));?>">关于我们</a> |　<a href="<?php echo U('Zhaopin/zhaopin');?>">加入我们</a>　｜　<a href="">法律声明</a>　｜　<a href="<?php echo U('Article/show',array('type'=>3));?>">联系我们</a>
        </div>
        <p>地址:北京市朝阳区望京SOHO</p>
        <p>版权所有 2016-2018  未来门（北京）投资管理有限公司   京ICP备15043006号</p>
      </div>
    </div>
  </div>
  <!-- 底部 END -->
  <script src="/Public/Home/js/jquery.js" language="javascript"></script>
  <script src="/Public/Home/js/common.js" language="javascript"></script>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35089061-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script> 
  <script src="/Public/Home/js/slides.js" language="javascript"></script>
  <script src="/Public/Home/js/jc.js" language="javascript"></script>
  <script src="/Public/Home/js/jc_right.js" language="javascript"></script>
  <script>
  $('.news_con').find('li:last').css({'border':'none'});
  /*$('#slides').slides({
  	effect: 'fade, fade',
  	fadeSpeed: 600
  });*/
  $(".index_conmany").jCarouselLite({
    speed:500,
    auto:3000,
    start: 0,
    visible:1,
    circular: true,
    mouseWheel :true
  });
  </script>
  <script type="text/javascript">
  $(".index_conmany_banner").jCarouselLite({
      speed:400,
      auto:6000,
      start: 0,
      visible:1,
      circular: true,
      mouseWheel :true,
      // vertical :true,
    });
  </script>
  <script type="text/javascript">
  $(".ulWrap1").jCarouselLite({
      speed:300,
      auto:2000,
      start: 0,
      visible:4,
      circular: true,
      mouseWheel :true,
      // vertical :true,
      scroll:1,     
    });
    </script>
    <script type="text/javascript">
  $(".ulWrap2").jCarouselLite({
      speed:300,
      auto:5000,
      start: 0,
      visible:4,
      circular: true,
      mouseWheel :true,
      // vertical :true,
      scroll:1,     
    });
    </script>
  <script type="text/javascript">
  $(".success").jCarouselLite({
      speed:300,
      auto:2000,
      start: 0,
      visible:4,
      circular: true,
      mouseWheel :true,
      // vertical :true,
      scroll:1,     
    });
    </script>
  <script type="text/javascript">
  $(".ulWrap").jCarouselLite_right({
      speed:700,
      auto:5000,
      start: 0,
      visible:4,
      circular: true,
      mouseWheel :true,
      // vertical :true,
      scroll:4,     
    });
    </script>
  </body>
</html>
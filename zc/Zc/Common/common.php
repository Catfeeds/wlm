<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:common.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月29日
#++++++++++++++++++++++++++++++++++++++
#Time:下午11:21:50
#++++++++++++++++++++++++++++++++++++++
function getConf($str='SEO_TITLE'){
	$db = M('Conf');
	$map['name'] = $str;
	return $db->where($map)->getField('value');
}
function getNav(){
	$db = M('Nav');
	$list = $db->order('sort')->select();
	$string = '';
// 	foreach ($list as $k=>$v){
// 		$url = U($v['u_module'].'/'.$v['u_action']);
// 		if($v['u_param'] != ''){
// 			$url .= '&'.$v['u_param'];
// 		}
// 		$v['url'] = $url;
// 	}
	return $list;
}
function getDealCate(){
	$db = M('DealCate');
	$list = $db->order('id')->select();
	$string = '';
// 	foreach ($list as $k=>$v){
// 		$url = U('deals/index',array('tid'=>$v['id']));
// 		$string .= '<a href="'.$url.'" title="'.$v['name'].'">'.$v['name'].'</a>';
// 	}
	return $list;
}
function getDealCates(){
	$db = M('DealCate');
	$list = $db->order('id')->select();
	$string = '';
	foreach ($list as $k=>$v){
		$url = U('deals/index',array('tid'=>$v['id']));
		$string .= '<a href="'.$url.'" title="'.$v['name'].'">'.$v['name'].'</a>';
	}
	return $string;
}
function setTga(){
	$string = '';
	$string .= '<a href="'.U('deals/rec').'">推荐项目</a>';
	$string .= '<a href="'.U('deals/news').'">最新上线</a>';
	$string .= '<a href="'.U('deals/nend').'">即将结束</a>';
	$string .= '<a href="'.U('deals/classic').'">经典项目</a>';
	return $string;
}
function setTgas(){
	$string = '';
	$string .= '<li><a href="'.U('deals/rec').'">推荐项目</a></li>';
	$string .= '<li><a href="'.U('deals/news').'">最新上线</a></li>';
	$string .= '<li><a href="'.U('deals/nend').'">即将结束</a></li>';
	$string .= '<li><a href="'.U('deals/classic').'">经典项目</a></li>';
	return $string;
}
/**
 * 筹集资金格式化
 * @param unknown $count
 * @return string
 */
function mFormat($count){
	return number_format($count,0);
}
/**
 * 项目简介格式化
 * @param unknown $string
 * @return string
 */
function bFormat($string){
	return mb_substr($string, 0 ,40,'utf-8').'...';
}
/**
 * 项目剩余时间格式化
 * @param unknown $etime
 * @return string
 */
function endFormat($etime){
	$ntime = time();
	$ytime = $etime - $ntime;
	if($ytime < 0){
		return '&nbsp;已过期';
	}else{
		$yday = $ytime / 24 / 3600;
		$yday = number_format($yday,0);
		return '<font color="green">剩余'.$yday.'天</font>';
	}
}
/**
 * 项目进度百分百
 * @param unknown $count
 * @param unknown $price
 * @return string
 */
function dealPlan($count,$price){
	$string = $count / $price * 100;
	$string = number_format($string,0);
	return $string.'%';
}
/**
 * 统计项目数量
 * @return unknown
 */
function countDeal(){
	$db = M('Deal');
	$count = $db->count();
	return $count;
}
/**
 * 支持人数
 * @return unknown
 */
function countSupport(){
	$db = M('Deal');
	$count = $db->sum("support_count");
	return $count;
}
/**
 * 支持金额
 * @return unknown
 */
function countAmount(){
	$db = M('Deal');
	$count = $db->sum("support_amount");
	return $count;
}
function getHelp(){
	$db = M('Help');
	$list = $db->select();
	$string = '';
	foreach ($list as $k=>$v){
		$title = $v['title'];
		$url = U('Help/'.$v['type']);
		$string .= '<a target="_blank" rel="nofollow" href="'.$url.'">'.$title.' <i>｜</i> </a>';
	}
	return $string;
}
function islogin(){
	$string = '';
	if(session('uid') != '' && session('uname') != ''){
		$string .='<span style="margin-top:20px;">
				<a href="'.U('User/center').'" title="" class="z-register">个人中心</a>
				|
				<a href="'.U('User/out').'" title="安全退出" class="z-register">安全退出</a>
				</span>';
	}else{
		$string .='<span class="z-Login" style="margin-top:20px;">
				<a href="'.U('User/reg').'" title="注册" class="z-register">注册</a>
				|
				<a href="'.U('User/login').'" title="登录" class="z-register">登录</a>
				</span>';
	}
	return $string;
}
function nextPage($id=null){
	$db = M('News');
	$map['id'] = array('lt',$id);
	$map2['id'] = array('gt',$id);
	$vo1 = $db->where($map)->limit('1')->find();#上一篇
	$vo2 = $db->where($map2)->limit('1')->find();
	$string ='上一篇:<a href="'.U('news/html',array('id'=>$vo1['id'])).'">'.$vo1['title'].'</a><br />
				下一篇:<a href="'.U('news/html',array('id'=>$vo2['id'])).'">'.$vo2['title'].'</a><br />';
	return $string;
}
function getDealItem($id){
	$db = M('DealItem');
	$map['deal_id'] = $id;
	$list = $db->where($map)->select();
	$string = '';
	foreach ($list as $k=>$v){
		$string .= '<div class="help">	        			        		
	        		<div class="hd clearfix">
						<h5>支持<i>'. number_format($v['price'],2) .'元</i></h5>                
                        <h5 style="margin-left:15px;"><i>'. $v['support_count'] .'</i>位支持者</h5>
			     	</div>   
		         	<div class="return-person">'.$v['description'].'</div>
                    <div class="return-person">
                    	<p>预计回报发放时间：项目成功结束后'.$v['repaid_day'].'天内</p>
                    </div>
                    <input style="margin-left:16px;" type="button" value="支持'. number_format($v['price'],2) .'元" />
                </div>';
	}
	return $string;
}
function getWeibo($uid){
	$map['user_id'] = $uid;
	$db = M('UserWeibo');
	$v = $db->where($map)->getField('weibo_url');
	return $v;
}
/** 
 * author          肖萌
 * describe	  	判断是否是移动端登陆
 * parameter		 
 * return		 
 */
function isMobile()
{
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
	{
		return true;
	}
	// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA']))
	{
		// 找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	// 脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT']))
	{
		$clientkeywords = array ('nokia',
				'sony',
				'ericsson',
				'mot',
				'samsung',
				'htc',
				'sgh',
				'lg',
				'sharp',
				'sie-',
				'philips',
				'panasonic',
				'alcatel',
				'lenovo',
				'iphone',
				'ipod',
				'blackberry',
				'meizu',
				'android',
				'netfront',
				'symbian',
				'ucweb',
				'windowsce',
				'palm',
				'operamini',
				'operamobi',
				'openwave',
				'nexusone',
				'cldc',
				'midp',
				'wap',
				'mobile'
		);
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
		{
			return true;
		}
	}
	// 协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT']))
	{
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
		{
			return true;
		}
	}
	return false;
}

?>
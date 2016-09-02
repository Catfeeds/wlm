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
	foreach ($list as $k=>$v){
		$url = U($v['u_module'].'/'.$v['u_action']);
		if($v['u_param'] != ''){
			$url .= '&'.$v['u_param'];
		}
		$string .= '<li class="" _t_nav="'.$k.'"><h2><a href="'.$url.'">'.$v['name'].'</a></h2></li>';
	}
	return $string;
}
function getDealCate(){
	$db = M('DealCate');
	$list = $db->order('id')->select();
	for ($i = 0 ; $i < count($list) ; $i ++){
		$url = U('deals/index',array('tid'=>$list[$i]['id']));
		$list[$i]['url'] = $url;
	}
	return $list;
}
function getDealCates(){
	$db = M('DealCate');
	$list = $db->order('id')->select();
	
	return $list;
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
function is_mobile()
{
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$is_pc = (strpos($agent, 'windows nt')) ? true : false;
	$is_mac = (strpos($agent, 'mac os')) ? true : false;
	$is_iphone = (strpos($agent, 'iphone')) ? true : false;
	$is_android = (strpos($agent, 'android')) ? true : false;
	$is_ipad = (strpos($agent, 'ipad')) ? true : false;


	if($is_pc){
		return  false;
	}

	if($is_mac){
		return  true;
	}

	if($is_iphone){
		return  true;
	}

	if($is_android){
		return  true;
	}

	if($is_ipad){
		return  true;
	}
}
?>
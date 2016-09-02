<?php
/**
  * author         肖萌
  * describe	获取栏目
  * parameter
  * return
  */
function getCategory(){
	$category = M('category')->where('isshow=1')->field('id,cname,rec_url,url,pic,mark')->select();
	$num[0] = M('company')->where('isshow=1 and type=2')->field('count(distinct member_id) as num')->find();
	$num[1] = M('company')->where('isshow=1 and type=1')->field('count(distinct member_id) as num')->find();
	$num[2] = M('company')->where('isshow=1 and type=1')->field('count(id) as num')->find();
	$num[3] = M('invest')->field('count(id) as num')->find();
	$num[4] = M('anli')->where('isshow = 1')->field('count(id) as num')->find();
	$num[5] = M('nav_article')->where('isshow=1 and pid = 99')->field('count(id) as num')->find();
	$num[6] = M('news')->where('isshow=1')->field('count(id) as num')->find();
	for ($i = 0 ; $i < count($category) ; $i ++){
		$category[$i]['num'] = $num[$i]['num'];
	}
	return $category;
}

/**
  * author         肖萌
  * describe	  获取领域
  * parameter
  * return
  */
function getDomain(){
	$ability = M('domain')->select();
	return $ability;
}

/**
  * author         肖萌
  * describe	获取导航栏	
  * parameter
  * return
  */
function getNav(){
	$nav = M('nav')->where('isshow=%d',1)->field('name,pic,url')->order('sort')->select();
	return $nav;
}

/**
  * author         肖萌
  * describe	  获取能力
  * parameter
  * return
  */
function getAbility(){
	$ability = M('ability')->select();
	return $ability;
}

/**
  * author         肖萌
  * describe	  获取目的
  * parameter
  * return
  */
function getObiective(){
	$objective = M('objective')->select();
	return $objective;
}

/**
  * author         肖萌
  * describe	  获取融资领域	
  * parameter
  * return
  */
function getFinance(){
	$finance = M('finance')->select();
	return $finance;
}

/**
  * author         肖萌
  * describe	  获取省
  * parameter
  * return
  */
function getProvince(){
	$province = M('province')->where('id <> 0')->field('code as id,name as pname')->select();
	return $province;
}

function getSystem(){
	$system = M('system')->find();
	return $system;
}

function getAtricle(){
	$where['isshow'] = 1;
	$where['pid'] = 1;
	$art1 = M('article')->where($where)->select();
	$where['pid'] = 2;
	$art2 = M('article')->where($where)->select();
	$art[1] = $art1;
	$art[2] = $art2;
	return $art;
}
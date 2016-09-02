<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:function.php
#++++++++++++++++++++++++++++++++++++++
#Function:后台公共方法
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-7
#++++++++++++++++++++++++++++++++++++++
#Time:下午05:32:48
#++++++++++++++++++++++++++++++++++++++
/**
 * 管理员状态
 */
function admin_status($num=0){
	if($num == 1){
		$str = '<font color="green">正常</font>';
	}else{
		$str = '<font color="red">锁定</font>';
	}
	echo $str;
}
/**
 * 管理员操作
 */
function admin_action($num=0){
	if($num == 1){
		$str = '锁定';
	}else{
		$str = '解锁';
	}
	echo $str;
}
/**
 * 管理员等级
 */
function admin_level($num=0){
	if($num == 1){
		$str = '<font color="red">超级管理员</font>';
	}else{
		$str = '普通管理员';
	}
	echo $str;
}

/**
 * 表单过滤
 */
function _htmlhandle($arr){
	if(is_array($arr)){
		foreach ($arr  as $k=>$v){
			$str=trim($v);
			$arr[$k] = htmlspecialchars($str);
		}
	}else{
		$arr = trim($arr);
		$arr = htmlspecialchars($arr);		
	}
	return $arr;
}

/**
 * 导航状态
 */
function nav_status($num=0){
	if($num == 1){
		$str = '<font color="green">是</font>';
	}else{
		$str = '<font color="red">否</font>';
	}
	echo $str;
}
/**
 * 导航操作
 */
function nav_action($num=0){
	if($num == 0){
		$str = '显示';
	}else{
		$str = '不显示';
	}
	echo $str;
}

/**
 * 会员角色[模版调用]
 */
function member_role($num=0){
	switch ($num){
		case 0:
			$str = '未知';
		break;
		case 1:
			$str = '创业者';
		break;
		case 2:
			$str = '投资者';
		break;
		default:
			$str = '其他';
		break;
	}
	echo $str;
}
/**
 * 会员角色[控制器调用]
 */
function member_role1($num=0){
	switch ($num){
		case 0:
			$str = '未知';
		break;
		case 1:
			$str = '创业者';
		break;
		case 2:
			$str = '投资者';
		break;
		default:
			$str = '其他';
		break;
	}
	return $str;
}
/**
 * 会员状态【控制器调用】
 */
function member_status($num=0){
	if($num == 1){
		$str = '<font color="green">正常</font>';
	}else{
		$str = '<font color="red">锁定</font>';
	}
	return $str;
}

/**
 * 获取省名
 */
function getProvinceName($id=0){
	$Province=M('Province');
	return $Province->where(array('code'=>$id))->getField('name');
}

/**
 * 获取市名
 */
function getCityName($id=0){
	$City=M('City');
	return $City->where(array('code'=>$id))->getField('name');
}

/**
 * 组合能力
 */
function getAbilityName($str){
	if($str == ''){
		return ;
	}
	$str=str_replace('|',',',$str);
	$Ability=M('Ability');
	$list=$Ability->where("id in($str)")->Field('aname')->select();
	foreach ($list as $v){
		$string .= $v['aname'].' ';
	}
	return $string;
}
/**
 * 组合目的
 */
function getObjectiveName($str){
	if($str == ''){
		return ;
	}
	$str=str_replace('|',',',$str);
	$Objective=M('Objective');
	$list=$Objective->where("id in($str)")->Field('oname')->select();
	foreach ($list as $v){
		$string .= $v['oname'].' ';
	}
	return $string;
}
/**
 * 组合领域
 */
function getDomainName($str){
	if($str == ''){
		return ;
	}
	$str=str_replace('|',',',$str);
	$Domain=M('Domain');
	$list=$Domain->where("id in($str)")->Field('dname')->select();
	foreach ($list as $v){
		$string .= $v['dname'].' ';
	}
	return $string;
}

/**
 * 获取会员名称
 */
function getMemberName($id){
	$Member=M('Member');
	echo $Member->where(array('id'=>$id))->getField('username');
}
/**
 * 公司状态
 */
function company_status($num){
	switch ($num){
		case 1:
			echo '运营中';
		break;
		case 2:
			echo '未上线';
		break;
		case 3:
			echo '已关闭';
		break;
		case 4:
			echo '已转型';
		break;
		default:
			echo '未知';
		break;
	}
}
/**
 * 运营阶段
 */
function phase_status($num){
	switch ($num){
		case 1:
			echo '初创期';
		break;
		case 2:
			echo '成长发展期';
		break;
		case 3:
			echo '上市公司';
		break;
		default:
			echo '未知';
		break;
	}
}
/**
 * 公司信息显示
 */
function is_show($num=0){
	if($num == 0){
		$str = '<font color="red">不显示</font>';
	}else{
		$str = '<font color="green">显示</font>';
	}
	echo $str;
}
/**
 * 机构添加者身份
 */
function roleName($num=0){
	switch ($num){
		case 1:
			echo '创始人';
		break;
		case 2:
			echo '员工';
		break;
		case 3:
			echo '投资者';
		break;
		case 4:
			echo '用户';
		break;
		case 5:
			echo '发现者';
		break;
		default:
			echo '未知';
		break;
	}
}

/**
 * 机构投资阶段
 */
function investName($str){
	if($str == ''){
		return ;
	}
	$str=str_replace('|',',',$str);
	$Invest=M('Invest_type');
	$list=$Invest->where("id in($str)")->Field('name')->select();
	foreach ($list as $v){
		$string .= $v['name'].' ';
	}
	return $string;
}
/**
 * 国内国外
 */
function country($num){
	switch ($num){
		case 1:
			echo '国内';
		break;
		case 2:
			echo '国外';
		break;
		default:
			echo '未知';
		break;
	}
}
/**
 * 机构所属类型
 */
function getTypes($num){
	switch ($num){
		case 1:
			echo '投资机构';
			break;
		case 2:
			echo '公司';
			break;
		default:
			echo '未知';
			break;
	}
}

/**
 * 获取公司名称
 */
function getCompany($id){
	$Company=M('Company');
	$list=$Company->find($id);
	echo $list['name'];
}

/**
 * 获取新闻类型
 */
function getNewsType($id){
	$NewsType=M('NewsType');
	$list=$NewsType->find($id);
	echo $list['name'];
}

/**
 * 获取导航名称
 */
function getNavName($id=null){
	$Nav = M('Nav');
	$map['id'] = $id;
	return $Nav->where($map)->getField('name');
}

/**
 * 是否推荐
 */
function is_rec($num=null){
	if($num == 1){
		return '是';
	}else{
		return '否';
	}
}

/**
 * 评论标题
 */
function getTitle($id=null){
	$NavArticle = M('NavArticle');
	$vo = $NavArticle->field('title')->find($id);
	return $vo['title'];
}

function deleteHtml($str){
	$str = trim($str);
	$str = strip_tags($str,"");
	$str = ereg_replace("\t","",$str);
	$str = ereg_replace("\r\n","",$str);
	$str = ereg_replace("\r","",$str);
	$str = ereg_replace("\n","",$str);
	$str = ereg_replace(" "," ",$str);
	return trim($str);
}
?>















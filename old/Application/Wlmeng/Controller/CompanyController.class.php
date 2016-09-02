<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class CompanyController extends ParentController{
	/**
	  * author         肖萌
	  * describe	  跳转到添加公司页面
	  * parameter
	  * return
	  */
	public function goAddCompany(){
		$isLogin = A('Common')->checkLogin();
		if (!$isLogin) {
			$this->redirect("Member/goLogin");
			exit;
		}
		
		$domain = getDomain();
		$finance = getFinance();
		$province = getProvince();
		
		$this->assign('domain',$domain);
		$this->assign('finance',$finance);
		$this->assign('province',$province);
		$this->display('Company/company');
	}
	
	/**
	  * author         肖萌
	  * describe	  添加新公司
	  * parameter
	  * return
	  */
	public function doAddCompany(){
		if (!IS_POST) {
			exit;
		}
		
		$isLogin = A('Common')->checkLogin();
		if (!isLogin) {
			$this->redirect("Member/goLogin");
			exit;
		}
		
		$re = $this->checkReCompany(trim(I('post.com_name')));
		if (!$re) {
			echo "<script>window.parent.addCompanyRes('','4');</script>";
			exit;
		}
		
		if ($_FILES['com_photo']['size'] > 0) {
			$back = A('Common')->uploadImages('company');
			if ($back['result'] == 0) {
				$src = "./Uploads".$back[0]['url'].$back[0]['name'];
				$src_s = "./Uploads".$back[0]['url'].'s_'.$back[0]['name'];
				
				$width = '200';
				$height = '200';
				$sname = 's_';
				
				A('Common')->createThumb($back[0]['url'],$back[0]['name'],$width,$height,'s_');
				if (file_exists($src)) {
					unlink($src);
				}
				
				$company['company_pic'] = $src_s;
			}
			else{
				echo "<script>window.parent.addCompanyRes('".$back[0]['error']."','1');</script>";
				exit;
			}
		}
		
		$company = array(
			'company_pic'	=>	$src_s,
			'name' 			=> 	trim(I('post.com_name')),
			'company_url'	=>	trim(I('post.com_url')),
			'intro'			=>	trim(I('post.com_des')),
			'year'			=>	trim(I('post.com_born_year')),
			'month'			=>	trim(I('post.com_born_month')),
			'province_id'	=>	trim(I('post.prov')),
			'city_id'		=>	trim(I('post.city')),
			'status'		=>	trim(I('post.com_status_id')),
			'phase'			=>	trim(I('post.com_stage_id')),
			'domain_id'		=>	trim(I('post.com_scope_id')),
			'type'			=>  trim(I('post.com_type')),
			'member_id'		=>	$_SESSION['memberid'],
			'member_role'	=>	trim('(post.per_role_id)'),
			'addtime'		=>	time()
		);
		
		$em_name = I('post.per_item_name');
		$em_position = I('post.per_item_com_des');
		$em_intro = I('post.per_item_des');
		$em_blogurl = I('post.per_item_weibo');
		$em_email = I('post.per_item_email');
		$em_tel = I('post.per_item_mobile');
		$j = 0;
		
		for ($i = 0 ; $i < count($em_name) ; $i ++){
			
			if ($em_name[$i] != null || $em_position[$i] != null || $em_intro[$i] != null || $em_blogurl[$i] != null || $em_email[$i] != null || $em_tel[$i] != null) {
				$employee[$j] = array(
					'name'		=>		$em_name[$i],
					'position'	=>		$em_position[$i],
					'intro'		=>		$em_intro[$i],
					'blogurl'	=>		$em_blogurl[$i],
					'email'		=>		$em_email[$i],
					'tel'		=>		$em_tel[$i],
				);
				$j ++;
			}
		}
		
		if ($employee == null) {
			echo "<script>window.parent.addCompanyRes('','2');</script>";
			exit;
		}
		
		$result = D('Company')->addCompany($company,$employee);
		if ($result) {
			echo "<script>window.parent.addCompanyRes('','0');</script>";
		}
		else{
			echo "<script>window.parent.addCompanyRes('','3');</script>";
		}
	}
	
	/** 
	 * author          肖萌
	 * describe	  	验证公司名是否重复
	 * parameter		 
	 * return		 
	 */
	private function checkReCompany($name,$type){
		$result = M('company')->where("name='%s' and type=%d",$name,$type)->find();
		if ($result == null) {
			return true;
		}
		else{
			return false;
		}
	}
	
	/** 
	 * author          肖萌
	 * describe	 	 跳转到添加机构页面
	 * parameter		 
	 * return		 
	 */
	public function goAddInvest(){
		$isLogin = A('Common')->checkLogin();
		if (!$isLogin) {
			$this->redirect("Member/goLogin");
			exit;
		}
		
		$domain = getDomain();
		$finance = getFinance();
		$province = getProvince();
		
		$this->assign('domain',$domain);
		$this->assign('finance',$finance);
		$this->assign('province',$province);
		$this->display('Company/addinvest');
	}
	/** 
	 * author          肖萌
	 * describe	  	添加机构
	 * parameter		 
	 * return		 
	 */
	public function addInvest(){
		if (!IS_POST) {
			exit;
		}
		$isLogin = A('Common')->checkLogin();
		if (!$isLogin) {
			$this->redirect("Member/goLogin");
			exit;
		}
		
		$re = $this->checkReCompany(trim(I('post.com_name')));
		if (!$re) {
			echo "<script>window.parent.addInvestRes('','2');</script>";
			exit;
		}
		$back_pic = A('Common')->uploadImages('invest');
		$src_i = "./Uploads".$back_pic[0]['url'].$back_pic[0]['name'];
		$domain = I('post.inv_dom_id');
		$domain = A('Common')->changetoStr_1($domain);
		
		$inv = array(
			'member_id'		=>		$_SESSION['memberid'],
			'name'			=>		trim(I('post.com_name')),
			'type'			=>		1,
			'company_url'	=>		trim(I('post.com_url')),
			'intro'			=>		I('post.com_des'),
			'domain_id'		=>		A('Common')->changetoStr_1(I('post.inv_dom_id')),
			'addtime'		=>		time(),
			'isshow'		=>		1,
			'phase'			=>		trim(I('post.com_stage_id')),
			'member_role'	=>		trim(I('post.per_role_id')),
			'domain_id'		=>		$domain,
			'company_pic'	=>		$src_i
		);

		$comname = I('post.per_item_name');
		$finance = I('post.com_fund_status_id');
		$price = I('post.per_item_price');
		$domain = I('post.inv_dom_id');
		$people = I('post.per_item_inv');
		$intro = I('post.inv_des');
		
		dump($_POST);
		exit;
		
		$back_pic_2 = A('Common')->uploadImagesMore('invest','com_photo');
		$time = date("Y.m.d");
		$j = 0;
		for ($i = 0 ; $i < count($comname) ; $i++){
			$src = "./Uploads".$back_pic_2[$i]['url'].$back_pic_2[$i]['name'];
			if ($comname[$i] != null && $finance[$i] != null && $price[$i] != null && $domain[$i] != null) {
				$inv_j[$j] = array(
					'company'		=>		$comname[$i],
					'round'			=>		$finance[$i],
					'money'			=>		$price[$i]."W",
					'domain_id'		=>		$domain[$i],
					'addtime'		=>		$time,
					'isshow'		=>		1,
					'investor'		=>		$people[$i],
					'intro'			=>		$intro[$i],
					'pic'			=>		$src,
				);
				$j ++;
			}
			else{
				unlink($src);
			}
		}
		$result = D('Company')->addInvest($inv,$inv_j);
		if ($result) {
			echo "<script>window.parent.addInvestRes('','0');</script>";
		}
		else{
			echo "<script>window.parent.addInvestRes('','1');</script>";
		}
		
	}
	
	/**
	  * author         肖萌
	  * describe	获取一个公司	
	  * parameter
	  * return
	  */
	public function getOneCompany(){
		if (!IS_GET) {
			exit;
		}
		$company_id = trim(I('get.id'));
		$where['c.id'] = $company_id;
		$where['c.isshow'] = 1;
		$company = M('company')->alias('c')
				   ->join('th_province p on p.id= c.province_id')
				   ->join('th_city ci on ci.id = c.city_id')
				   ->where($where)
				   ->field('c.id,c.name,c.company_pic,c.company_url,c.intro,c.year,c.month,c.phase,c.domain_id,p.name as pname,ci.name as cname')
				   ->find();
		if ($company == null) {
			$company = M('company')->alias('c')
				   	   ->join('th_province p on p.code= c.province_id')
				   	   ->join('th_city ci on ci.code = c.city_id')
				   	   ->where($where)
				   	   ->field('c.id,c.name,c.company_pic,c.company_url,c.status,c.intro,c.year,c.month,c.phase,c.domain_id,p.name as pname,ci.name as cname')
				   	   ->find();
		}
		$status = $company['status'];
		if ($status == 1) {
			$company['status'] = "运营中";
		}
		else if($status == 2){
			$company['status'] = "未上线";
		}
		else if($status == 3){
			$company['status'] = "已关闭";
		}
		else if($status == 4){
			$company['status'] = "已转型";
		}
		
		$phase = $company['phase'];
		switch ($phase){
			case 1:
				$company['phase'] = "初创期";
				break;
			case 2:
				$company['phase'] = "成长发展期";
				break;
			case 3:
				$company['phase'] = "上市公司";
				break;
		}

		$domain_id = str_replace("|", ",", $company['domain_id']);
		if ($domain_id != "") {
			$domain = M('domain')->where("id in (%s)",$domain_id)->field('dname')->select();
			for ($i = 0 ; $i < count($domain) ; $i ++){
				$domain_str .= $domain[$i]['dname'].",";
			}
		}
		else{
			$domain_str = "";
		}
		
		$domain_str = substr($domain_str,0,-1);
		$company['domain'] = $domain_str;
		
		$emplyee = M('employee')->where('company_id=%d',$company_id)->select();
		$this->assign('company',$company);
		$this->assign('emplyee',$emplyee);
		$this->display('companyInfo');
	}
	
	/**
	  * author         肖萌
	  * describe	投资机构列表	
	  * parameter
	  * return
	  */
	public function goInvest($keyword=""){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		if ($keyword == "") {
			$keyword = trim(I('get.keyword'));
		}
		$where = array(
				'type'		=>		1,
				'isshow'	=>		1,
				'name'		=>		array('like','%'.$keyword.'%'),
		);
		$allnum = M('Company')->where($where)->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($allnum['num'],5,$page_this);

		$invest = M('Company')->where($where)->limit(($page-1)*5,5)->order('addtime desc')->select();
		for($i = 0 ; $i < count($invest) ; $i ++){
			$phase = $invest[$i]['phase'];
			switch ($phase){
				case 1:
					$invest[$i]['phase'] = "初创期";
					break;
				case 2:
					$invest[$i]['phase'] = "成长发展期";
					break;
				case 3:
					$invest[$i]['phase'] = "上市公司";
					break;
			}
			
			$domain_id = str_replace("|", ",", $invest[$i]['domain_id']);
			$domain = M('domain')->where("id in (%s)",$domain_id)->field('dname')->select();
			$domain_str = "";
			for ($j = 0 ; $j < count($domain) ; $j ++){
				$domain_str .= $domain[$j]['dname'].",";
			}
			$domain_str = substr($domain_str,0,-1);
			$invest[$i]['domain_id'] = $domain_str;
		}
		
		$this->assign('invest',$invest);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',end($page_show));
		$this->assign('keyword',$keyword);
		$this->display('Company/investfirm');
	}
	
	public function getOneInvest(){
		if (!IS_GET) {
			exit;
		}
		$company_id = trim(I('get.id'));
		$where['c.id'] = $company_id;
		$where['c.isshow'] = 1;
		$company = M('company')->alias('c')
				   ->join('th_member m on c.member_id = m.id')
				   ->join('th_person p on p.member_id = m.id')
				   ->join('th_province pr on pr.id= c.province_id')
				   ->join('th_city ci on ci.id = c.city_id')
				   ->where($where)
				   ->field('c.id,c.name,c.company_pic,c.company_url,c.intro,c.year,c.status,c.month,c.phase,c.domain_id,m.username,m.face,m.blogurl,p.intro as pintro,pr.name as pname, ci.name as cname,p.education')
				   ->find();
		if ($company == null) {
			$company = M('company')->alias('c')
				   	   ->join('th_member m on c.member_id = m.id')
				   	   ->join('th_person p on p.member_id = m.id')
				   	   ->join('th_province pr on pr.code= c.province_id')
				  	   ->join('th_city ci on ci.code = c.city_id')
				   	   ->where($where)
				   	   ->field('c.id,c.name,c.company_pic,c.company_url,c.intro,c.year,c.month,c.phase,c.status,c.domain_id,m.username,m.face,m.blogurl,p.intro as pintro,pr.name as pname, ci.name as cname,p.education')
				   	   ->find();
		}
		
		$status = $company['status'];
		if ($status == 1) {
			$company['status'] = "运营中";
		}
		else if($status == 2){
			$company['status'] = "未上线";
		}
		else if($status == 3){
			$company['status'] = "已关闭";
		}
		else if($status == 4){
			$company['status'] = "已转型";
		}
		
		$phase = $company['phase'];
		switch ($phase){
			case 1:
				$company['phase'] = "初创期";
				break;
			case 2:
				$company['phase'] = "成长发展期";
				break;
			case 3:
				$company['phase'] = "上市公司";
				break;
		}
		
		
		$domain_id = str_replace("|", ",", $company['domain_id']);
		$domain = M('domain')->where("id in (%s)",$domain_id)->field('dname')->select();
		for ($i = 0 ; $i < count($domain) ; $i ++){
			$domain_str .= $domain[$i]['dname'].",";
		}
		$domain_str = substr($domain_str,0,-1);
		$company['domain'] = $domain_str;
		
		
		$inv = M('invest')->alias('i')
			   ->join('th_domain d on i.domain_id = d.id')->where('i.inv_id=%d',$company_id)->select();
		
		$this->assign('company',$company);
		$this->assign('inv',$inv);
		$this->display('investorIntro');
	}
}
<?php
namespace Wlmeng\Model;
use Think\Model;
class MemberModel extends ParentModel{
	/** 
		* author          肖萌
		* describe		添加用户  
		* parameter		 
		* return		 
		*/
	public function addMember($member){
		$db = new Model();
		$db->startTrans();
		$result1 = M('member')->add($member);
		
		$person['member_id'] = $result1;
		$result2 = M('person')->add($person);
		
		if ($result1 && $result2) {
			$db->commit();
			return true;
		}
		else{
			$db->rollback();
			return false;
		}
	}
	
	/**
	  * author         肖萌
	  * describe	  修改个人信息
	  * parameter
	  * return
	  */
	public function updateMember($memberid,$person,$member){
		$db = new Model();
		$db->startTrans();
		
		$result1 = M('member')->where('id=%d',$memberid)->data($member)->save();
		
		$result2 = M('person')->where('member_id=%d',$memberid)->data($person)->save();
		
		if ($result1 !== false && $result2 !== false) {
			$this->commit();
			return true;
		}
		else{
			$this->rollback();
			return false;
		}
	}
}
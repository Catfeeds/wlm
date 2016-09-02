<?php
namespace Wlmeng\Model;
use Wlmeng\Model\ParentModel;
use Think\Model;
class CompanyModel extends ParentModel{
	/**
	  * author         肖萌
	  * describe	  添加公司
	  * parameter
	  * return
	  */
	public function addCompany($company,$employee){
		$db = new Model();
		$db -> startTrans();
		
		$result1 = M('company')->add($company);
		
		if ($employee != null) {
			for ($i = 0 ; $i < count($employee) ; $i ++){
				$employee[$i]['company_id'] = $result1;
			}
		}
		
		$result2 = M('employee')->addAll($employee);
		
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
	 * author          肖萌
	 * describe	  	添加机构
	 * parameter		 
	 * return		 
	 */
	public function addInvest($inv,$inv_j){
		$db = new Model();
		$db->startTrans();
		
		$result1 = M('company')->add($inv);
		if ($inv_j != null) {
			for ($i = 0 ; $i < count($inv_j) ; $i ++){
				$inv_j[$i]['inv_id'] = $result1;
				$inv_j[$i]['country'] = 1;
			}
		}
		$result2 = M('invest')->addAll($inv_j);
		
		if ($result1 && $result2) {
			$this->commit();
			return true;
		}
		else{
			$this->rollback();
			return false;
		}
	}
}
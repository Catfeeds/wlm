<?php
namespace Wlmeng\Model;
use Think\Model;
class ParentModel extends Model{
	public function _initialize() {
		header("Content-Type:text/html; charset=utf-8");
	}
}
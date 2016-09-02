<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class CommentController extends ParentController{
	/**
	  * author         肖萌
	  * describe	  添加评论
	  * parameter
	  * return
	  */
	public function addComment(){
		if (!IS_AJAX) {
			exit;
		}
		$member_name = M('member')->where('id=%d',$_SESSION['memberid'])->field('username')->find();
		$company_name = M('company')->where('id=%d',I('post.company'))->field('name')->find();
		$comment = array(
			'member_id'		=>		$_SESSION['memberid'],
			'member_name'	=>		$member_name['username'],
			'company_id'	=>		I('post.company'),
			'company'		=>		$company_name['name'],
			'content'		=>		I('post.comment'),
			'addtime'		=>		time(),
			'isshow'		=>		1,
		);
		$result = M('Comment')->add($comment);
		if ($result) {
			$data = 0;
		}
		else {
			$data = 1;
		}
		$this->ajaxReturn($data);
	}
}
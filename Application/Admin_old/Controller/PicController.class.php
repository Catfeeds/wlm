<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class PicController extends ParentController{
	/** 
	 * author          肖萌
	 * describe	  	跳转到首页轮播图片列表页面
	 * parameter		 
	 * return		 
	 */
	public function picList(){
		$list = M('flash')->select();
		$this->assign('list',$list);
		$this->display('Pic/piclist');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	上传首页幻灯片轮播图片
	 * parameter		 
	 * return		 
	 */
	public function uploadImg(){
			$back = A('Common')->uploadImages('flash');
		
			$flash['img'] = "./Uploads".$back[0]['url'].$back[0]['name'];
			$result = M('flash')->add($flash);
		
		echo "<script>window.parent.location.href='".U('Pic/picList')."';</script>";
	}
	
	/** 
	 * author          肖萌
	 * describe	  	删除选中幻灯片
	 * parameter		 
	 * return		 
	 */
	public function delFlash(){
		$where['id'] = I('id');
		$img = M('flash')->where($where)->find();
		unlink($img);
		$result = M('flash')->where($where)->delete();
		$this->redirect('Pic/picList');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	图片排序
	 * parameter		 
	 * return		 
	 */
	public function sort(){
		$where['id'] = I('post.id');
		$update['sort'] = trim(I('post.sort'));
		
		$result = M('flash')->where($where)->save($update);
		$this->redirect('Pic/picList');
		
	}
	
	/** 
	 * author          肖萌
	 * describe	  	图片连接
	 * parameter		 
	 * return		 
	 */
	public function url(){
		$where['id'] = I('post.id');
		$update['url'] = trim(I('post.url'));
		
		M('flash')->where($where)->save($update);
		$this->redirect('Pic/picList');
	}
}
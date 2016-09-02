<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class ImgController extends ParentController{
	/**
	 * author          肖萌
	 * describe	  	跳转到首页轮播图片列表页面
	 * parameter
	 * return
	 */
	public function imgList(){
		$list = M('img')->select();
		$this->assign('list',$list);
		$this->display('Img/imglist');
	}
	
	/**
	 * author          肖萌
	 * describe	  	上传首页幻灯片轮播图片
	 * parameter
	 * return
	 */
	public function uploadImg(){
		$back = A('Common')->uploadImages('img');
	
		$flash['img'] = "./Uploads".$back[0]['url'].$back[0]['name'];
		$result = M('img')->add($flash);
	
		echo "<script>window.parent.location.href='".U('Img/imgList')."';</script>";
	}
	
	/**
	 * author          肖萌
	 * describe	  	删除选中幻灯片
	 * parameter
	 * return
	 */
	public function delFlash(){
		$where['id'] = I('id');
		$img = M('img')->where($where)->find();
		unlink($img);
		$result = M('img')->where($where)->delete();
		$this->redirect('Img/imgList');
	}
}
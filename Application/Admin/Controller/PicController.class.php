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




	public function moidfyBigPage(){

		$this->assign('error',false);
		$this->assign('msg',null);
		$this->display('Pic/bigimg');
	}


	public function modifyBigImg(){


		if (!empty($_FILES["img"]["name"])) { //提取文件域内容名称，并判断 
		$path=dirname(dirname(dirname(dirname(__file__)))).'/Public/Home/images/'; //上传路径 
		//允许上传的文件格式 
		$tp = array("image/pjpeg","image/jpeg"); 
		//检查上传文件是否在允许上传的类型 
		if(!in_array($_FILES["img"]["type"],$tp)) 
		{ 
			$this->assign('error',true);
			$this->assign('errorMsg','图片格式不对');
			$this->display('Pic/bigimg');
			return;
		}//END IF 

		$filepath = $path.'index_banner.jpg'; 

		$result=move_uploaded_file($_FILES["img"]["tmp_name"],$filepath); 

		if($result){
			$this->assign('error',false);
			$this->assign('msg','上传成功');
			$this->display('Pic/bigimg');
			return; 
		}else{
			$this->assign('error',true);
			$this->assign('errorMsg','上传失败，请重试');
			$this->display('Pic/bigimg');
			return;
		}

		//特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件 
		}else{
			$this->assign('error',true);
			$this->assign('errorMsg','请选择一个图片');
			$this->display('Pic/bigimg');
			return;
		}




	}

}
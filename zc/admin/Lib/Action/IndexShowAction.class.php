<?php
class IndexShowAction extends CommonAction{
	public function index(){
		$index = M('showindex')->select();
		$this->assign('index',$index);
		$this->display();
	}
	
	public function pic(){
		$id = $_POST['id'];
		
		$group = $_POST['group'];
		$seat = $_POST['seat'];
		
		$img = $_POST['img'];
		$pic = $_POST['pic'];

		import('zc.Action.COM.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->saveRule = uniqid;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './public/attachment/showindex/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			echo "<script>window.parent.uploadIndex(1,1,1)</script>";
		}else{// 上传成功
			$info =  $upload->getUploadFileInfo();
			$url = $info[0]['savepath'].$info[0]['savename'];
			
			$model = new Model();
			$sql = "update fanwe_showindex set ".$pic."='".$url."' where id=".$id." and `group`=".$group." and seat=".$seat;
			$result = $model->execute($sql);

			echo "<script>window.parent.uploadIndex(0,'".$url."','".$img."')</script>";
		}	
	}
	
	public function text(){
		$id = $_POST['id'];	
		$group = $_POST['group'];
		$seat = $_POST['seat'];
		$title = $_POST['title'];
		
		$sql = "update fanwe_showindex set title='".$title."' where id=".$id." and `group`=".$group." and seat=".$seat;
		$model = new Model();
		$result = $model->execute($sql);
		if (!$result) {
			echo "<script>window.parent.alert('修改失败')</script>";
		}
	}
	
	public function url(){
		$id = $_POST['id'];
		$group = $_POST['group'];
		$seat = $_POST['seat'];
		$title = $_POST['title'];
	
		$sql = "update fanwe_showindex set url='".$title."' where id=".$id." and `group`=".$group." and seat=".$seat;
		
		$model = new Model();
		$result = $model->execute($sql);
		if (!$result) {
			echo "<script>window.parent.alert('修改失败')</script>";
		}
	}
}
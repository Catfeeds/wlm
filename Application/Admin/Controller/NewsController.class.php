<?php

namespace Admin\Controller;

use Admin\Controller\ParentController;

class NewsController extends ParentController{

	/** 

	 * author          肖萌

	 * describe	  	  动态列表

	 * parameter		 

	 * return		 

	 */

	public function newslist(){

		$list = M('News')->order('create_time desc')->select();

		for ($i = 0 ; $i < count($list) ; $i ++){

			$list[$i]['create_time'] = date("Y-m-d H:i:s",$list[$i]['create_time']);

		}

		$this->assign('list',$list);

		$this->display('newslist');

	}

	

	public function add(){

		$this->display();

	}

	

	public function insert(){

	    $time = I('time_year','0').'-'.I('time_month','0').'-'.I('time_day','0').' '.I('time_hour','0').':'.I('time_minute','0').':'.I('time_second','0');

		$insert['title'] 		= I('post.title');

		$insert['content']		= I('post.content');

		$insert['create_time']	= strtotime($time);

		

		$result = M('news')->add($insert);

		$this->redirect('News/newsList');

		

	}

	

	public function del(){

		$id = I('get.id');

		

		$result = M('news')->where('id=%d',$id)->delete();

		$this->redirect('News/newsList');

	}

	

	public function save(){

		$id = I('get.id');

		$news = M('news')->where('id=%d',$id)->find();

		$news['time_year'] = date('Y',$news['create_time']);
		$news['time_month'] = date('m',$news['create_time']);
		$news['time_day'] = date('d',$news['create_time']);
		$news['time_hour'] = date('H',$news['create_time']);
		$news['time_minute'] = date('i',$news['create_time']);
		$news['time_second'] = date('s',$news['create_time']);


		$this->assign('news',$news);

		$this->display();

	}

	

	public function update() {

	    $time = I('time_year','0').'-'.I('time_month','0').'-'.I('time_day','0').' '.I('time_hour','0').':'.I('time_minute','0').':'.I('time_second','0');


	    $id = I('id');

	    $insert['title'] 		= I('post.title');

		$insert['content']		= I('post.content');

		$insert['create_time']	= strtotime($time);

		

		M('news')->where('id=%d',$id)->save($insert);

		$this->redirect('News/newsList');

	}

}
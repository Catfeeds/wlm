<?php

namespace Home\Controller;

use Home\Controller\ParentController;

class IndexController extends ParentController {

    public function index(){

        $news = M('news')->order('create_time desc')->select();

        for($i = 0 ; $i < count($news) ; $i ++){

            $news[$i]['create_time'] = date('Y-m-d',$news[$i]['create_time']);

            if (strlen($news[$i]['title']) > 23) {

            	$news[$i]['title'] = mb_substr($news[$i]['title'], 0,20, 'utf-8')."...";

            }

            $news[$i]['url']   = U('News/show',array('id'=>$news[$i]['id']));

        }

        $com = M('article')->where('type=%d',4)->where('id = 24')->find();

        

        $img = M('img')->select();

        

        $pic = M('flash')->select();

        

        $this->assign('com',$com);

        $this->assign('news',$news);

        $this->assign('img',$img);

        $this->assign('pic',$pic);

    	$this->display('Index/index');

    }

}
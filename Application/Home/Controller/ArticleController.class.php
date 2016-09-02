<?php

namespace Home\Controller;

use Home\Controller\ParentController;

class ArticleController extends ParentController{

    public function show() {

        $type = I('type');

        $id = I('id');

        if ($id == null){

            $show = M('article')->where('type=%d',$type)->order('time desc')->find();

        }

        else{

            $show = M('article')->where('id=%d',$id)->find();

        }

        

        $list = M('article')->limit('10')->order('time desc')->where('type=%d',$type)->select();

        for($i = 0 ; $i < count($list) ; $i ++){

            $list[$i]['url'] = U('Article/show',array('id'=>$list[$i]['id'],'type'=>$type));

        }

        

        $this->assign('show',$show);

        $this->assign('list',$list);

        $this->display('Show/show1');

    }

}
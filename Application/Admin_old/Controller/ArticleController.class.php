<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class ArticleController extends ParentController{
    public function articlelist() {
        $this->display();
    }
    
    public function lists(){
        $type = I('type');
        
        $list = M('article')->where('type=%d',$type)->select();
        $this->assign('type',$type);
        $this->assign('list',$list);
        $this->display();
    }
    
    public function add() {
        $type = I('get.type');
        
        $this->assign('type',$type);
        $this->display();
    }
    
    public function insert() {
        $insert['type']     = I('post.type');
        $insert['title']    = I('post.title');
        $insert['content']  = I('content');
        
        $result = M('article')->add($insert);
        $this->redirect('Article/articlelist');
    }
    
    public function save(){
        $id = I('id');
        $article = M('article')->where('id=%d',$id)->find();
        $this->assign('art',$article);
        $this->display();
    }
}
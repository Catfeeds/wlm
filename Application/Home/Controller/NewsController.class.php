<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class NewsController extends Controller{
    public function newslist() {
        $p = new Page ($count,10); 
        $news = M('news')->where($where)->order('create_time desc')->limit('18')->select();

        // $news = M('news')->order('create_time desc')->select();
        // $count = count($new);
       

        for($i = 0 ; $i < count($news) ; $i ++){
            $news[$i]['create_time'] = date('Y-m-d',$news[$i]['create_time']);
            $news[$i]['url']   = U('News/show',array('id'=>$news[$i]['id']));
        }
        $this->assign('title','集团新闻');
        $this->assign('news',$news);
        $this->display('List/list');
    }
    
    public function show() {
        $id = I('get.id');

        if ($id == null){
            $show = M('news')->order('id desc')->find();
        }
        else{
            $show = M('news')->where('id=%d',$id)->find();
        }
        $list = M('news')->limit('5')->order('create_time desc')->select();
        
        for($i = 0 ; $i < count($list) ; $i ++){
            $list[$i]['url'] = U('News/show',array('id'=>$list[$i]['id']));
            if (strlen($list[$i]['title']) > 23) {
            	$list[$i]['title'] = mb_substr($list[$i]['title'], 0,15, 'utf-8')."...";
            }
        }
        $this->assign('title','集团新闻');
        $this->assign('list',$list);
        $this->assign('show',$show);
        $this->display('Show/show1');

    }
}
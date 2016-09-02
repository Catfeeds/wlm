<?php
class TradeAction extends CommonAction{
    /**
    * 买
    * @param unknowtype
    * @return return_type
    * @author 肖萌
    * @date 2015年9月7日下午5:38:01
    */
    public function buy() {
        $deal_id    = $_POST['deal_id'];
        $price      = $_POST['price'];
        $num        = $_POST['deal_num'];
        
        $order['deal_id']       =   $deal_id;
        $order['user_id']       =   $_SESSION['uid'];
        $order['total_price']   =   $price*$num;
        $order['num']           =   $num;
        $order['price']         =   $price;
        $order['create_time']   =   time();
        
        M('deal_order')->add($order);
        
        $now['deal_id'] =   $deal_id;
        $now['uid']     =   $_SESSION['uid'];
        $now['num']     =   $num;
        $now['price']   =   $price;
        
        M('deal_now')->add($now);
        $this->success('订单创建成功',U('Index/index'));
    }
    
    /**
    * 股仓
    * @param unknowtype
    * @return return_type
    * @author 肖萌
    * @date 2015年9月8日上午10:59:26
    */
    public function gucang() {
        $userid = $_SESSION['uid'];
        
        $where['n.uid']   =   $userid;
        
        $list = M('deal_now')->alias('n')
                ->join('fanwe_deal d on n.deal_id=d.id')
                ->field('n.num,d.name,d.image,n.id')
                ->where($where)
                ->select();
        
        $this->assign('list',$list);
        $this->display('Trade/gucang');
    }
    
    public function gozr(){
        $id = I('now_id');
        
        $where['n.id'] = $id;
        $show = M('deal_now')->alias('n')
                ->join('fanwe_deal d on n.deal_id=d.id')
                ->field('n.num,d.name,d.image,n.id')
                ->where($where)
                ->find();
        $this->assign('show',$show);
        $this->display('zhuanranglist');
    }
    
    /**
    * 转让
    * @param unknowtype
    * @return return_type
    * @author 肖萌
    * @date 2015年9月8日上午11:15:09
    */
    public function zhuanrang() {
        $now_id = I('now_id');
        $userid = $_SESSION['uid'];
        
        $num = I('num');
        $price = I('price');
        
        $where['id'] = $now_id;
        $where['uid'] = $userid;
        $where['price'] = $price;
        $now = M('deal_now')->where('id=%d',$now_id)->find();
        
        if ($now['num'] < $num) {
            $this->error('数量有误',U('Trade/gucang'));
            exit;
        }
        
        $add['now_id'] = $now['id'];
        $add['num']    = $num;
        $add['create_time'] =  time();
        
        $result = M('zhuanrang')->add($add);
        
        $update['num'] = array('exp','num-{$num}');
        
        M('deal_now')->save($update);
        
        $this->redirect('Trade/gucang');
    }
}
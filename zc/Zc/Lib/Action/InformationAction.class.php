<?php
class InformationAction extends CommonAction{
	/**
	  * author         肖萌
	  * describe	  发送短信
	  * parameter
	  * return
	  */
	public function sendMsg($telphone,$msg){
		$url = C('msgURL');
		$userName = C('msgUsername');
		$userPass = C('msgPassword');
		$subid = C('msgSubid');
		$params = 'UserName='.$userName.'&UserPass='.$userPass.'&subid='.$subid.'&Mobile='.$telphone.'&Content='.$msg;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
		curl_setopt($ch, CURLOPT_TIMEOUT,3);
		$data = curl_exec($ch);
		curl_close ($ch);
		
		$add['telphone'] = $telphone;
		$add['msg'] = $msg;
		$add['result'] = $data;
		M('codelog')->add($add);
		return $data;
	}
}
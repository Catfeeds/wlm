function add_check(){
	var investor = $('#investor').val();
	if(investor == ''){
		layer.alert('请填写投资者',8);
		return false;
	}
	var company = $('#company').val();
	if(company == ''){
		layer.alert('请填写投资对象',8);
		return false;
	}
	var round = $('#round').val();
	if(round == ''){
		layer.alert('请填写轮次',8);
		return false;
	}
	var money = $('#money').val();
	if(money == ''){
		layer.alert('请填写金额',8);
		return false;
	}
	return true;
};
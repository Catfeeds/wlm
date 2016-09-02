var jq = jQuery.noConflict();
var k="tab0";
function news_mouseover(el){
	if(el.className==el.id+"_n"){
		el.className=el.id+"_h";
    }
}
function news_click(el){
	var _k=document.getElementById(k);
	_k.className=k+"_n";
	var m=k+"_c";
	none(m);
	el.className=el.id+"_a"
	var n=el.id+"_c"
	block(n);
	k=el.id;
}

function news_mouseout(el){
	if(el.className==el.id+"_h"){
		el.className=el.id+"_n";
	}
}




// 创建logo墙 
//onStart, onEnd, onReturn 

function LogoWall (options) {	
	this.id = options.id;
	this.gap = options.gap;
	this.showTime = options.showTime;	
	this.hd = null;
	this.logos = [];	
	this.count = 8;
	this.current = 0;	
	this.onStart = options.onStart;
	this.onEnd = options.onEnd;	
	this.onReturn = options.onReturn;
	this.onEnter = options.onEnter;
}
LogoWall.logoId = 1;

LogoWall.getId = function() {	
	return this.logoId++;
}

LogoWall.getIndex = function(index) {
	if (index == 0) {	
		return [0];
	}
	else if (index == 4) {		
		return [7];
	}
	else {
		return [index, index + 3];
	}
};



// 添加一个logo
// @param {String} logoSrc logo URL地址 

LogoWall.prototype.addLogo = function(logoSrc) {	
	var index = LogoWall.getId();	
	this.logos.push({	
		index : index,
		src	: logoSrc
		});
}
LogoWall.prototype.initialize = function() {	
	var container = document.getElementById(this.id);	
	var logoGroup = [];	
	if (container) {		
		for (var i = 0; i < this.logos.length; i++) {	
			var logo = this.logos[i];
			var index = i%this.count;
			if (!logoGroup[index]) { logoGroup[index] = []; }		
			logoGroup[index].push(logo);	
		};
		for (var i = 0; i < this.count; i++) {	
			var logobox = document.createElement("DIV");
			logobox.className = "logo";		
			logobox.id="logobox"+i;
			logobox.setAttribute("logoindex", "0");		
			for (var j = 0; j < logoGroup[i].length; j++) {			
				var img = document.createElement("IMG");	
				img.id ="logo"+logoGroup[i][j].src;			
				img.src = logoGroup[i][j].src;
				if (j != 0) {				
					img.style.opacity="0";	
				}			
				logobox.appendChild(img);
			};
			container.appendChild(logobox);
		};
	}
}
function disappear (el){
	var opacity = 100;
	var h = window.setInterval(function() {
			if (opacity >= 0) {
			el.style.filter = "alpha(opacity=" + opacity +  ")";
			opacity -= 10;
			}
			else {
			window.clearInterval(h);
			}
			}, 50);
}
function appear (el){
	var opacity = 0;
	var h = window.setInterval(function() {
			if (opacity <100) {
			el.style.filter = "alpha(opacity=" + opacity +  ")";
			opacity += 10;
			}
			else {
			window.clearInterval(h);
			}
			}, 50);
}
LogoWall.changeLogo = function(el) {	
	var index = parseInt(el.getAttribute("logoindex"));
	var images = el.getElementsByTagName("IMG");	
	var target = images[index];	
	if(typeof(Worker)!=="undefined"){
		target.style.opacity = "0";
		window.setTimeout(function() {	
				if (index + 1 == images.length) {		
				var nextTarget = images[0];
				el.setAttribute("logoindex", 0);
				} else {	
				var nextTarget = images[index + 1];		
				el.setAttribute("logoindex", index + 1);
				}	
				nextTarget.style.opacity = "1";
		}, 500);
	}
	else{
		disappear(target);
		window.setTimeout(function() {	
				if (index + 1 == images.length) {		
				var nextTarget = images[0];
				el.setAttribute("logoindex", 0);
				} else {	
				var nextTarget = images[index + 1];		
				el.setAttribute("logoindex", index + 1);
				}	
			//	nextTarget.style.opacity = "1";
				appear(nextTarget);
		}, 500);
	}
};


LogoWall.prototype.startAnimation = function() {	
	if (this.onStart) {	
		var fun = this.onStart;
		fun.call(this);	
	}	
	var t = this;
	if(this.hd){window.clearInterval(this.hd)}
	this.hd = window.setInterval(function() {		
			t.turnPage();
			},t.showTime);
};

LogoWall.prototype.stopAnimation = function() {	
	if (this.onStop) {		
		var fc = this.onStop;
		fc();
	}
	var t=this;
	if (t.hd) {	
		window.clearInterval(t.hd);	
	}
};

LogoWall.prototype.turnPage = function() {	
	var target = this;	
	var hd = window.setInterval(function() {	
			index = target.current++;	
			var indexes = LogoWall.getIndex(index);
			var boxes=target.getBoxes();
			for (var i = 0; i < indexes.length; i++) {	
				var el =boxes[indexes[i]];
				LogoWall.changeLogo(el);	
			};	
			if (target.current > 4) {			
				var index = target.current = 0;
				window.clearInterval(hd);			
				if (target.onReturn) {		
					target.onReturn();	
				}	
			}
		},target.gap);
};
LogoWall.prototype.getBoxes=function(){
	var container = document.getElementById(this.id);
	var boxes = container.getElementsByTagName("DIV");	
	return boxes;

};

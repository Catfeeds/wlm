// JavaScript Document
var int;
var index;
var prevIndex;
var lastIndex;
var clientWidth=document.documentElement.clientWidth;
var clientHeight=document.documentElement.clientHeight; 
window.onload=function(){
	var navHeight=clientHeight-238;
	var markHeight=clientHeight-243;
	var navbgHeight=clientHeight-103;
	$(".whole").css({"width":clientWidth,"height":clientHeight});
	$(".navbg ul li").css("height",navbgHeight);
	$(".topmark").css("height",markHeight);
	$(".topmark").slideDown("slow").delay(500).slideUp("slow");
	$(".index_nav ul li").each(function(i) {
		$($(".navbg ul li").eq(i)).width($(this).width());
    });
	$(".navbg ul li").each(function(i) {
        $($($(".navbg ul li").eq(i).find("img")).css({"width":$(this).width(),"height":navHeight}))
    });
	$(".index_nav ul li").mouseover(function(){
		//alert(lastIndex);
		if ($.isNumeric(prevIndex)) {
			$(".navbg ul li").eq(prevIndex).css("opacity",0.8);
		if ($.isNumeric(lastIndex)) {
			//$(".navbg ul li").eq(prevIndex).delay(1000).css("opacity",0);
			$(".navbg ul li").eq(lastIndex).css("opacity",0.8).delay(1000).animate({"opacity":0},1000);
		}

	}
		var index1=$(".index_nav ul li").index(this);
		$($(".navbg ul li").eq(index1)).css("opacity",1);
		});
	$(".index_nav ul li").bind("mouseout",function(){
		index=$(".index_nav ul li").index(this);
		$(".navbg ul li").mouseenter(function(){
			var i=$(".navbg ul li").index(this);
			/*console.log(i);
			console.log(index);*/
			if(i==index){
				$($(".navbg ul li").eq(i)).css("opacity",1);
				}
			});
	$($(".navbg ul li").eq(index)).mouseleave(function(){
		$($(".navbg ul li")).css("opacity",0);
		index=null;
			});
			$($(".navbg ul li")).css("opacity",0);
			console.log(prevIndex);
			lastIndex=prevIndex;
			prevIndex=index;
		});
		$(".header a").click(function(){
			$(".topbar").slideUp();
			$(".topjt").css("display","block");
			});
		$(".topjt").hover(function(){
			$(".topbar").slideDown("slow");
			$(this).css("display","none");
			});
		imgSlide();
}



function biggerBackground(multiple){
	var index=$(".bigImg ul li").index($(".bigImg ul li:visible"));
	var imgWidth=$(".bigImg ul li:visible img").width();
	var imgHeight=$(".bigImg ul li:visible img").height();
	$(".bigImg ul li:visible img").css({"width":(imgWidth*(1+multiple)),"height":(imgHeight*(1+multiple))});
	//console.log(imgWidth);
	//console.log(clientWidth);
	if(imgWidth>1.1*clientWidth){
		//console.log(index);
		clearInterval(int);
		if(index==$(".bigImg ul li").length-1){
			$(".bigImg ul li").eq(0).removeClass("hide");
		}else{
		$(".bigImg ul li:visible").next().removeClass("hide");
		}
		$($(".bigImg ul li").get(index)).addClass("hide");
		$($(".bigImg ul li").get(index)).children("img").width(clientWidth);
		$($(".bigImg ul li").get(index)).children("img").height(clientHeight);
		//alert($($(".bigImg ul li").get(index)).children("img").width());
		imgSlide();
		}
	}

function imgSlide(){
		int=setInterval("biggerBackground(1/1000)",60);	
	});
		}
	}

function imgSlide(){
		int=setInterval("biggerBackground(1/1000)",60);	
	}
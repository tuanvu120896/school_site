/* ===============================================
# 検索窓の設定
=============================================== */
$(document).ready(function(){
var nav = $('#gnavi');
$('li', nav).hover(function(){
$('ul',this).stop().slideDown('fast',function(){
	$(this).css("height","");
});
},
function(){
$('ul',this).stop().slideUp('fast');
});
	$('#searchBox')
		.blur(function(){
			var $$=$(this);
			if($$.val()==''){
				$$.css('background-image', 'url(http://demo.coremobile.co.jp/nihongo/common/img/search_bk.gif)')
					.css('background-repeat', 'no-repeat')
					.css('background-position', '5px center');
			}
		})
		.focus(function(){
			var $$=$(this);
			if($$.val()==''){
				$$.css('background-image', 'none');
			}
		})
		.blur();
});

/* ===============================================
# class="imgover" の要素に、マウスオーバーで
　"_o.gif" の画像と入れ替える
=============================================== */
function initRollovers() {
	if (!document.getElementById) return
	
	var aPreLoad = new Array();
	var sTempSrc;
	var aImages = document.getElementsByTagName('img');

	for (var i = 0; i < aImages.length; i++) {		
		if (aImages[i].className == 'imgover') {
			var src = aImages[i].getAttribute('src');
			var ftype = src.substring(src.lastIndexOf('.'), src.length);
			var hsrc = src.replace(ftype, '_o'+ftype);

			aImages[i].setAttribute('hsrc', hsrc);
			
			aPreLoad[i] = new Image();
			aPreLoad[i].src = hsrc;
			
			aImages[i].onmouseover = function() {
				sTempSrc = this.getAttribute('src');
				this.setAttribute('src', this.getAttribute('hsrc'));
			}	
			
			aImages[i].onmouseout = function() {
				if (!sTempSrc) sTempSrc = this.getAttribute('src').replace('_o'+ftype, ftype);
				this.setAttribute('src', sTempSrc);
			}
		}
	}
}
window.onload = initRollovers;
try{
	window.addEventListener("load",initRollovers,false);
}catch(e){
	window.attachEvent("onload",initRollovers);
}

/* ===============================================
# 印刷
=============================================== */
$(document).ready(function(){
	$(".printer").click(function(){
		$("body").addClass("print");
			window.print();
			var timeout = setTimeout(function(){
				$("body").removeClass("print");
			}, 1000);
		return false;
	});
});

/* ===============================================
# pageTop スムーズスクロール
=============================================== */
$(function(){
		// #で始まるアンカーをクリックした場合に処理
		$('a[href^=#]').click(function() {
			// スクロールの速度
			var speed = 400;// ミリ秒
			// アンカーの値取得
			var href= $(this).attr("href");
			// 移動先を取得
			var target = $(href == "#" || href == "" ? 'html' : href);
			// 移動先を数値で取得
			var position = target.offset().top;
			// スムーススクロール
      $($.browser.safari ? 'body' : 'html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});
});

/* ===============================================
# wordBreak
=============================================== */
new function(){
	if(window.opera || navigator.userAgent.indexOf("Firefox") != -1){
		var wordBreak = function() {
			var wordBreakClass = "wordBreak";
			var table = document.getElementsByTagName("table");
			for(var i=0,len=table.length ; i<len ; i++){
				var tbClass = table[i].className.split(/\s+/);
				for (var j = 0; j < tbClass.length; j++) {
					if (tbClass[j] == wordBreakClass) {
						recursiveParse(table[i])
					}
				}
			}
		}
		var recursiveParse = function(pNode) {
			var childs = pNode.childNodes;
			for (var i = 0; i < childs.length; i++) {
				var cNode = childs[i];
				if (childs[i].nodeType == 1) {
					recursiveParse(childs[i]);
				}else if(cNode.nodeType == 3) {
					if(cNode.nodeValue.match("[^\n ]")){
						var plTxt = cNode.nodeValue.replace(/\t/g,"")
						var spTxt = plTxt.split("");
						spTxt = spTxt.join(String.fromCharCode(8203));
						var chNode = document.createTextNode(spTxt);
						cNode.parentNode.replaceChild(chNode,cNode)
					}
				}
			}
		}

	}else{
		var wordBreak = function() {
			if( document.styleSheets[0].addRule ){
				document.styleSheets[0].addRule(".wordBreak","word-break:break-all");
			}else if( document.styleSheets[0].insertRule ){
				document.styleSheets[0].insertRule(".wordBreak{word-break:break-all}", document.styleSheets[0].cssRules.length );
			}else{
				return false;
			}
		}
	}
	var addEvent = function(elm,listener,fn){
		try{
			elm.addEventListener(listener,fn,false);
		}catch(e){
			elm.attachEvent("on"+listener,fn);
		}
	}
	addEvent(window,"load",wordBreak);
}
/*************************
デバッグ変数コンストラクタ
*************************/
/*
var p        = console.log;
var print    = console.log;
var var_dump = console.dir;
var trace    = console.trace;
var time     = console.time;
var count    = console.count;
*/
/*****************
ブラウザ・機種判別
*****************/
var UA_tool = function(){
    var os = 'other';
    var browser = 'other';
    var version = 1;
    var mobile = '';
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.indexOf('win')!=-1){
        this.os = 'win';
    }else if(ua.indexOf('mac')!=-1){
        this.os = 'mac';
    }
    if(ua.indexOf('msie')!=-1){
        this.browser = 'ie';
        var av = window.navigator.appVersion.toLowerCase();
        if(av.indexOf('msie 6.')!=-1){
            this.version = 6;
        }else if(av.indexOf('msie 7.')!=-1){
            this.version = 7;
        }else if(av.indexOf('msie 8.')!=-1){
            this.version = 8;
        }else if(av.indexOf('msie 9.')!=-1){
            this.version = 9;
        }else{
            this.version = 999;
        }
    }else if(ua.indexOf('chrome')!=-1){
        this.browser = 'chrome';
    }else if(ua.indexOf('safari')!=-1){
        this.browser = 'safari';
    }else if(ua.indexOf('firefox')!=-1){
        this.browser = 'firefox';
    }
    if(ua.indexOf('iphone')!=-1){
        this.mobile = 'iphone';
    }else if(ua.indexOf('ipad')!=-1){
        this.mobile = 'ipad';
    }else if(ua.indexOf('android')!=-1){
        this.mobile = 'android';
    }
};
var ua = new UA_tool();
var uaa = window.navigator.userAgent.toLowerCase();

/*************
グローバル変数
*************/
	if(navigator.userAgent.indexOf("Opera") != -1) { // 文字列に「Opera」が含まれている場合
		var user_browser = 'Opera';
	}
		else if(navigator.userAgent.indexOf("MSIE") != -1) { // 文字列に「MSIE」が含まれている場合
			var user_browser = 'MSIE';
	;	}
			else if(navigator.userAgent.indexOf("Firefox") != -1) { // 文字列に「Firefox」が含まれている場合
				var user_browser = 'Firefox';
			}
				else if (navigator.userAgent.indexOf('Chrome') != -1) { // 文字列に「Chrome」が含まれている場合
					var user_browser = 'Chrome';
				}
					else if(navigator.userAgent.indexOf("Netscape") != -1) { // 文字列に「Netscape」が含まれている場合
						var user_browser = 'Natscape';
					}
						else if(navigator.userAgent.indexOf("Safari") != -1) { // 文字列に「Safari」が含まれている場合
							var user_browser = 'Safari';
						}
							else {
								var user_browser = '';
							}
/***********
http切り替え
***********/
if (location.host == 'localhost') {
	var http = 'http://localhost/zodiac/';
}
	else if (location.host == 'zodiac.ninja') {
		var http = 'http://zodiac.ninja/';
	}
		else if (location.host == 'www.zodiac.ninja') {
			var http = 'http://zodiac.ninja/';
		}
//----------------
//読み込み後の処理
//----------------
$(function() {
	//-------------------------------------------------------
	//全ページトップでトップにスクロールするボタン表示 非表示
	//-------------------------------------------------------
 $(window).scroll(function() {
	 if($(window).width() > 319 && $(this).scrollTop() > 700) {
			$('.scroll_top').fadeIn();
	 }
	 		else {
				$('.scroll_top').fadeOut();
	 		}
 });
	//----------------------------------------------------
	//全ページトップでトップにスクロールするボタンクリック
	//----------------------------------------------------
	$('.scroll_top').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	});









}); // $(function() {
/*******************
HTML読み込み後に処理
*******************/
$(window).load(function(){

});









$(function() {
	//----------------------------------
	//slideshareスライドレスポンシブ表示
	//----------------------------------
	if($('.slideshare')) {
		if($(window).width() <= 320) {
			var w              = $('.detail_press').width();
			var y_w            = $('.slideshare iframe').attr('width');
			var y_h            = $('.slideshare iframe').attr('height');
			var ratio          = (y_h / y_w);
			var responsive_y_h = (ratio * w);
			$('.slideshare iframe').attr( {
				width: '100%',
				height: '234'});
		}
	}
	//-----------------------
	//youtubeレスポンシブ表示
	//-----------------------
	if($('.youtube')) {
		if($(window).width() <= 560) {			
			var w              = $('.detail_press').width();
			var y_w            = $('.youtube iframe').attr('width');
			var y_h            = $('.youtube iframe').attr('height');
			var ratio          = (y_h / y_w);
			var responsive_y_h = (ratio * w);
			// 変更
			$('.youtube iframe').attr( {
				width: '100%',
				height: responsive_y_h});
			// ウインドウがリサイズされたら
			$( window ).resize(function() {
				var w_r              = $('.detail_press').width();
				var responsive_y_h_r = (ratio * w_r);
				$('.youtube iframe').attr( {
					width: '100%',
					height: responsive_y_h_r});
			});
		}
	}
	});
/*
//----------------
//ブラウザの大きさ
//----------------
$(window).width();
$(window).height();
//----------------------
//スクロールしている数値
//----------------------
$(window).scrollTop();
//------------
//一番底の数値
//------------
$('html').height()
*/
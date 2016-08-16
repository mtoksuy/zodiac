<?php 

/**
 * インフォ関連のクラス
 * 
 * 
 * 
 * 
 */

class Model_Info_Basis extends Model {
	//----------------
	//ユーザー情報取得
	//----------------
	static function user_data_get() {
		// エラー回避
		error_reporting(0);
		ini_set('display_errors', 1);

		$user_data_array = array();
		$httpvars = array(
		'REMOTE_ADDR'          => 'IPアドレス',
		'REMOTE_HOST'          => 'ホスト名',
		'REMOTE_PORT'          => 'ポート番号',
		'HTTP_USER_AGENT'      => 'ユーザーエージェント',
		'HTTP_REFERER'         => '参照ページアドレス',
		'HTTP_ACCEPT_LANGUAGE' => '言語',
		'HTTP_CONNECTION'      => 'コネクションヘッダ',
		);
		//REMOTE_HOSTがなければgethostbyaddrで取得
		if(!isset($_SERVER['REMOTE_HOST']) || $_SERVER['REMOTE_HOST'] == '') {
//			var_dump($_SERVER);
			$_SERVER['REMOTE_HOST'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//			var_dump($_SERVER['REMOTE_HOST']);
			foreach($httpvars as $key => $value) {
//				var_dump($key);
//				var_dump($_SERVER[$key]);
				$user_data_array[$key] = $_SERVER[$key];
			}
//		var_dump($user_data_array);
		}
		return $user_data_array;
	}
	//------------------------------------------
	//モバイルからのアクセスなのかどうかを調べる
	//------------------------------------------
	static function mobil_is_access_check() {
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
		$user_is_mobil = ((strpos($user_agent, 'iPhone') !== false) || (strpos($user_agent, 'iPod') !== false) || (strpos($user_agent, 'iPad') !== false) || (strpos($user_agent, 'Windows Phone') !== false) || (strpos($user_agent, 'BlackBerry') !== false) || (strpos($user_agent, 'Symbian') !== false));
		if($user_is_mobil == true) {

		}
// 参考にするサイト http://www.openspc2.org/userAgent/
		return $user_is_mobil;
	}
	//-----------------------------------------------------
	//モバイル判別するPHPクラスライブラリを利用した機種判別
	//-----------------------------------------------------
	static function mobile_detect_create() {
		// モバイル判別するPHPクラスライブラリ
		require_once PATH.'assets/library/Mobile-Detect-2.8.5/'.'Mobile_Detect.php';
		$detect = new Mobile_Detect;
/*
		var_dump($detect);
		var_dump($detect->isMobile());
		var_dump($detect->isTablet());
		var_dump($detect->isiOS());
		var_dump($detect->isAndroidOS());
		var_dump($detect->is('Chrome'));
		var_dump($detect->is('iOS'));
		var_dump($detect->is('UC Browser'));
if($detect->isMobile() || $detect->isTablet()) {
    // モバイル・タブレット
}
	else {
	    // PC
	}
*/
		return $detect;
	}
	//--------------------
	//現在の時間表記を取得
	//--------------------
	public static function now_date_get($denoted = 'Y-m-d H:i:s') {
		$now_time          = time();
		$now_date          = date($denoted, $now_time);
		return $now_date;
	}
	//--------------------------------------
	//現在の時間表記をマイクロ秒も含めて取得
	//--------------------------------------
	public static function now_micro_date_get() {
		$arrTime = explode('.',microtime(true));
		return date('Y-m-d H:i:s', $arrTime[0]) . '.' .$arrTime[1];
	}
}
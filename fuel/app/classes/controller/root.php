<?php
/*
* Rootコントローラー
*
* トップページをコントロール
*
*/
class Controller_Root extends Controller_Basic_Template {
	// 親のbefore実行
	public function before() {
		parent::before();
	}
	// 基本アクション
	public function action_index() {
		// メタセット
		$this->basic_template->view_data['meta'] = View::forge('root/meta');
		// cssセット
		$this->basic_template->view_data['external_css'] = View::forge('root/externalcss');



//var_dump(View::forge('root/externalcss'));

		if($_POST) {
			// セキュリティーポスト取得
			$post = Model_Security_Basis::post_security();
		}
		// 今年の干支を取得
		$this_yrar_zodiac_array = Model_Zodiac_Basis::this_yrar_zodiac_array_get(Model_Info_Basis::now_date_get('Y'));
		// 干支のフォームHTML生成
		$eto_form_html = Model_Zodiac_Html::zodiac_form_html_create($post);
		// トップページのセクションHTML生成
		$root_section_html = Model_Zodiac_Html::root_section_html_create($this_yrar_zodiac_array, $eto_form_html);


/*
１２支に関するエピソードなどは様々で数多くあり、書店やネット上で真相などを探してみるのも面白いです♪
何故十二支の干支に猫が入っていないのか？とかネズミは牛をだましてズルをしたとかｗ
*/



/*
干支-年齢早見表
http://www.nenrei-hayami.net/eto.html



年・月・日の干支(No.0020)
http://koyomi8.com/reki_doc/doc_0020.htm
http://koyomi8.com/

ネコが十二支に入れなかったお話
http://www2.tba.t-com.ne.jp/blue.turtle/zatugaku23.html


干支の動物の順番が決まったある伝説エピソード
http://the5seconds.com/eto-episode-780.html


干支（えと）の順番の由来とは？ 面白いけどナゾだらけ!?
http://kenyu.red/archives/1850.html


十二支の話
http://www.eto12.com/junishi02.html

干支の由来
http://www.eto12.com/junishi08.html

ウィキ
https://ja.wikipedia.org/wiki/%E5%8D%81%E4%BA%8C%E6%94%AF

干支の順番の覚え方※由来やレースした理由＆各漢字の読み
http://読めばなるほど.com/archives/2964.html


*/


		// コンテンツデータセット
		$this->basic_template->view_data['content']->set('content_data', array(
			'content_html' => $root_section_html,
		), false);
	}
}

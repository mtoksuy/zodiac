<?php
/*
* 
* 干支HTML関連クラス
* 
* 
* 
*/

class Model_Zodiac_Html extends Model {
	//----------------------
	//干支のフォームHTML生成
	//----------------------
	public static function zodiac_form_html_create($post) {
		// バースデイイヤー取得
		if($post) { $birthday_year = $post['birthday_year']; } else { $birthday_year = '1982'; }
		// option_html生成
		for($i = 1900; 2100 >= $i; $i++) {
			if($birthday_year == $i) {
				$option_html .= '<option value="'.$i.'" selected="">'.$i.'</option>';
			}
				else {
					$option_html .= '<option value="'.$i.'">'.$i.'</option>';
				}
		}// for($i = 1900; 2100 >= $i; $i++) {
		$eto_form_html = '
			<form class="zodiac_check_form" name="" action="" method="post">
				<p>
					<select class="birthday_year" name="birthday_year">
						'.$option_html.'
					</select>
					<span>年</span>

					<!-- 誕生日 月 -->
			<!--
					<select class="birthday_month" name="birthday_month">
						<option value="--">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option selected="" value="10">10</option><option value="11">11</option><option value="12">12</option>
					</select>
					<span>月</span>
			-->
					<!-- 誕生日 日 -->
			 <!--
					<select class="birthday_day" name="birthday_day">
						<option value="--">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option selected="" value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
					</select>
					<span>日</span>								
			-->
				</p>
				<input class="o_8" type="submit" value="干支を調べる">
			</form>';
		return $eto_form_html;
	}
	//--------------------------------
	//トップページのセクションHTML生成
	//--------------------------------
	public static function root_section_html_create($this_yrar_zodiac_array, $eto_form_html) {
		if($_POST) {
			// セキュリティーポスト取得
			$post = Model_Security_Basis::post_security();
			// 干支結果取得
			$zodiac_result_array = Model_Zodiac_Basis::zodiac_result_array_get($post);
			$zodiac_result_html = $zodiac_result_array['zodiac_year'].'年生まれの人は
「
<span class="this_bold">'.$zodiac_result_array['zodiac_result'].'('.$zodiac_result_array['zodiac_hiragana'].')</span>」です。';
		}
			else {
				$zodiac_result_html = '';
			}

		$root_section_html = 
			'<section class="section_block today_this_year_zodiac_data">
				<p class="m_0">今日は'.Model_Info_Basis::now_date_get('Y年m月d日').'</p>
				<p>今年は「<span class="this_bold">'.$this_yrar_zodiac_array['zodiac_result'].'('.$this_yrar_zodiac_array['zodiac_hiragana'].')</span>」です。</p>
			</section>
			<section class="section_block">
				<h2><span class="typcn typcn-leaf"></span>年で干支を調べる</h2>
				<p>年で干支を調べられます。</p>
			'.$eto_form_html.'
			'.$zodiac_result_html.'
			</section>
			<section class="section_block">
				<h2><span class="typcn typcn-leaf"></span>干支・十二支の早見表</h2>
				<pre>干支早見表・十二支の一覧表です。

干支は、ねずみ年から始まっていのしし年まで十二年をかけて十二支を一周します。
※子・丑・寅・卯・辰・巳・午・未・申・酉・戌・亥
※ね・うし・とら・う・たつ・み・うま・ひつじ・さる・とり・いぬ・い</pre>
				<div class="zodiac_table_content clearfix">
					<div class="zodiac_table_left">
						<table class="table_type_1">
						  <tbody>
							<tr>
						    <th abbr="西暦">西暦</th>
						    <th abbr="和暦">和暦</th>
						    <th abbr="干支">干支</th>
						  </tr>
						  <tr>
						    <td>1915年</td>
						    <td>大正4年</td>
						    <td class="td3">卯年[うさぎ]</td>
						  </tr>
						  <tr>
						    <td>1916年</td>
						    <td>大正5年</td>
						    <td class="td3">辰年[たつ]</td>
						  </tr>
						  <tr>
						    <td>1917年</td>
						    <td>大正6年</td>
						    <td class="td3">巳年[へび]</td>
						  </tr>
						  <tr>
						    <td>1918年</td>
						    <td>大正7年</td>
						    <td class="td3">午年[うま]</td>
						  </tr>
						  <tr>
						    <td>1919年</td>
						    <td>大正8年</td>
						    <td class="td3">未年[ひつじ]</td>
						  </tr>
						  <tr>
						    <td>1920年</td>
						    <td>大正9年</td>
						    <td class="td3">申年[さる]</td>
						  </tr>
						  <tr>
						    <td>1921年</td>
						    <td>大正10年</td>
						    <td class="td3">酉年[とり]</td>
						  </tr>
						  <tr>
						    <td>1922年</td>
						    <td>大正11年</td>
						    <td class="td3">戌年[いぬ]</td>
						  </tr>
						  <tr>
						    <td>1923年</td>
						    <td>大正12年</td>
						    <td class="td3">亥年[いのしし]</td>
						  </tr>
						  <tr>
						    <td>1924年</td>
						    <td>大正13年</td>
						    <td class="td3">子年[ねずみ]</td>
						  </tr>
						  <tr>
						    <td>1925年</td>
						    <td>大正14年</td>
						    <td class="td3">丑年[うし]</td>
						  </tr>
						  <tr>
						    <td>1926年</td>
						    <td>大正15年</td>
						    <td class="td3">寅年[とら]</td>
						  </tr>
						  <tr>
						    <td>1927年</td>
						    <td>昭和2年</td>
						    <td class="td3">卯年[うさぎ]</td>
						  </tr>
						  <tr>
						    <td>1928年</td>
						    <td>昭和3年</td>
						    <td class="td3">辰年[たつ]</td>
						  </tr>
						  <tr>
						    <td>1929年</td>
						    <td>昭和4年</td>
						    <td class="td3">巳年[へび]</td>
						  </tr>
						  <tr>
						    <td>1930年</td>
						    <td>昭和5年</td>
						    <td class="td3">午年[うま]</td>
						  </tr>
						  <tr>
						    <td>1931年</td>
						    <td>昭和6年</td>
						    <td class="td3">未年[ひつじ]</td>
						  </tr>
						  <tr>
						    <td>1932年</td>
						    <td>昭和7年</td>
						    <td class="td3">申年[さる]</td>
						  </tr>
						  <tr>
						    <td>1933年</td>
						    <td>昭和8年</td>
						    <td class="td3">酉年[とり]</td>
						  </tr>
						  <tr>
						    <td>1934年</td>
						    <td>昭和9年</td>
						    <td class="td3">戌年[いぬ]</td>
						  </tr>
						  <tr>
						    <td>1935年</td>
						    <td>昭和10年</td>
						    <td class="td3">亥年[いのしし]</td>
						  </tr>
						  <tr>
						    <td>1936年</td>
						    <td>昭和11年</td>
						    <td class="td3">子年[ねずみ]</td>
						  </tr>
						  <tr>
						    <td>1937年</td>
						    <td>昭和12年</td>
						    <td class="td3">丑年[うし]</td>
						  </tr>
						  <tr>
						    <td>1938年</td>
						    <td>昭和13年</td>
						    <td class="td3">寅年[とら]</td>
						  </tr>
						  <tr>
						    <td>1939年</td>
						    <td>昭和14年</td>
						    <td class="td3">卯年[うさぎ]</td>
						  </tr>
						  <tr>
						    <td>1940年</td>
						    <td>昭和15年</td>
						    <td class="td3">辰年[たつ]</td>
						  </tr>
						  <tr>
						    <td>1941年</td>
						    <td>昭和16年</td>
						    <td class="td3">巳年[へび]</td>
						  </tr>
						  <tr>
						    <td>1942年</td>
						    <td>昭和17年</td>
						    <td class="td3">午年[うま]</td>
						  </tr>
						  <tr>
						    <td>1943年</td>
						    <td>昭和18年</td>
						    <td class="td3">未年[ひつじ]</td>
						  </tr>
						  <tr>
						    <td>1944年</td>
						    <td>昭和19年</td>
						    <td class="td3">申年[さる]</td>
						  </tr>
						  <tr>
						    <td>1945年</td>
						    <td>昭和20年</td>
						    <td class="td3">酉年[とり]</td>
						  </tr>
						  <tr>
						    <td>1946年</td>
						    <td>昭和21年</td>
						    <td class="td3">戌年[いぬ]</td>
						  </tr>
						  <tr>
						    <td>1947年</td>
						    <td>昭和22年</td>
						    <td class="td3">亥年[いのしし]</td>
						  </tr>
						  <tr>
						    <td>1948年</td>
						    <td>昭和23年</td>
						    <td class="td3">子年[ねずみ]</td>
						  </tr>
						  <tr>
						    <td>1949年</td>
						    <td>昭和24年</td>
						    <td class="td3">丑年[うし]</td>
						  </tr>
						  <tr>
						    <td>1950年</td>
						    <td>昭和25年</td>
						    <td class="td3">寅年[とら]</td>
						  </tr>
						  <tr>
						    <td>1951年</td>
						    <td>昭和26年</td>
						    <td class="td3">卯年[うさぎ]</td>
						  </tr>
						  <tr>
						    <td>1952年</td>
						    <td>昭和27年</td>
						    <td class="td3">辰年[たつ]</td>
						  </tr>
						  <tr>
						    <td>1953年</td>
						    <td>昭和28年</td>
						    <td class="td3">巳年[へび]</td>
						  </tr>
						  <tr>
						    <td>1954年</td>
						    <td>昭和29年</td>
						    <td class="td3">午年[うま]</td>
						  </tr>
						  <tr>
						    <td>1955年</td>
						    <td>昭和30年</td>
						    <td class="td3">未年[ひつじ]</td>
						  </tr>
						  <tr>
						    <td>1956年</td>
						    <td>昭和31年</td>
						    <td class="td3">申年[さる]</td>
						  </tr>
						  <tr>
						    <td>1957年</td>
						    <td>昭和32年</td>
						    <td class="td3">酉年[とり]</td>
						  </tr>
						  <tr>
						    <td>1958年</td>
						    <td>昭和33年</td>
						    <td class="td3">戌年[いぬ]</td>
						  </tr>
						  <tr>
						    <td>1959年</td>
						    <td>昭和34年</td>
						    <td class="td3">亥年[いのしし]</td>
						  </tr>
						  <tr>
						    <td>1960年</td>
						    <td>昭和35年</td>
						    <td class="td3">子年[ねずみ]</td>
						  </tr>
						  <tr>
						    <td>1961年</td>
						    <td>昭和36年</td>
						    <td class="td3">丑年[うし]</td>
						  </tr>
						  <tr>
						    <td>1962年</td>
						    <td>昭和37年</td>
						    <td class="td3">寅年[とら]</td>
						  </tr>
						  <tr>
						    <td>1963年</td>
						    <td>昭和38年</td>
						    <td class="td3">卯年[うさぎ]</td>
						  </tr>
						  <tr>
						    <td>1964年</td>
						    <td>昭和39年</td>
						    <td class="td3">辰年[たつ]</td>
						  </tr>
						  <tr>
						    <td>1965年</td>
						    <td>昭和40年</td>
						    <td class="td3">巳年[へび]</td>
						  </tr>
						</tbody>
						</table>
					</div>


	
					<div class="zodiac_table_right">
					<table class="table_type_1">
					  <tbody><tr>
					    <th abbr="西暦">西暦</th>
					    <th abbr="和暦">和暦</th>
					    <th abbr="干支">干支</th>
					  </tr>
					  <tr>
					    <td>1966年</td>
					    <td>昭和41年</td>
					    <td class="td3">午年[うま]</td>
					  </tr>
					  <tr>
					    <td>1967年</td>
					    <td>昭和42年</td>
					    <td class="td3">未年[ひつじ]</td>
					  </tr>
					  <tr>
					    <td>1968年</td>
					    <td>昭和43年</td>
					    <td class="td3">申年[さる]</td>
					  </tr>
					  <tr>
					    <td>1969年</td>
					    <td>昭和44年</td>
					    <td class="td3">酉年[とり]</td>
					  </tr>
					  <tr>
					    <td>1970年</td>
					    <td>昭和45年</td>
					    <td class="td3">戌年[いぬ]</td>
					  </tr>
					  <tr>
					    <td>1971年</td>
					    <td>昭和46年</td>
					    <td class="td3">亥年[いのしし]</td>
					  </tr>
					  <tr>
					    <td>1972年</td>
					    <td>昭和47年</td>
					    <td class="td3">子年[ねずみ]</td>
					  </tr>
					  <tr>
					    <td>1973年</td>
					    <td>昭和48年</td>
					    <td class="td3">丑年[うし]</td>
					  </tr>
					  <tr>
					    <td>1974年</td>
					    <td>昭和49年</td>
					    <td class="td3">寅年[とら]</td>
					  </tr>
					  <tr>
					    <td>1975年</td>
					    <td>昭和50年</td>
					    <td class="td3">卯年[うさぎ]</td>
					  </tr>
					  <tr>
					    <td>1976年</td>
					    <td>昭和51年</td>
					    <td class="td3">辰年[たつ]</td>
					  </tr>
					  <tr>
					    <td>1977年</td>
					    <td>昭和52年</td>
					    <td class="td3">巳年[へび]</td>
					  </tr>
					  <tr>
					    <td>1978年</td>
					    <td>昭和53年</td>
					    <td class="td3">午年[うま]</td>
					  </tr>
					  <tr>
					    <td>1979年</td>
					    <td>昭和54年</td>
					    <td class="td3">未年[ひつじ]</td>
					  </tr>
					  <tr>
					    <td>1980年</td>
					    <td>昭和55年</td>
					    <td class="td3">申年[さる]</td>
					  </tr>
					  <tr>
					    <td>1981年</td>
					    <td>昭和56年</td>
					    <td class="td3">酉年[とり]</td>
					  </tr>
					  <tr>
					    <td>1982年</td>
					    <td>昭和57年</td>
					    <td class="td3">戌年[いぬ]</td>
					  </tr>
					  <tr>
					    <td>1983年</td>
					    <td>昭和58年</td>
					    <td class="td3">亥年[いのしし]</td>
					  </tr>
					  <tr>
					    <td>1984年</td>
					    <td>昭和59年</td>
					    <td class="td3">子年[ねずみ]</td>
					  </tr>
					  <tr>
					    <td>1985年</td>
					    <td>昭和60年</td>
					    <td class="td3">丑年[うし]</td>
					  </tr>
					  <tr>
					    <td>1986年</td>
					    <td>昭和61年</td>
					    <td class="td3">寅年[とら]</td>
					  </tr>
					  <tr>
					    <td>1987年</td>
					    <td>昭和62年</td>
					    <td class="td3">卯年[うさぎ]</td>
					  </tr>
					  <tr>
					    <td>1988年</td>
					    <td>昭和63年</td>
					    <td class="td3">辰年[たつ]</td>
					  </tr>
					  <tr>
					    <td>1989年</td>
					    <td>昭和64年</td>
					    <td class="td3">巳年[へび]</td>
					  </tr>
					  <tr>
					    <td>1990年</td>
					    <td>平成2年</td>
					    <td class="td3">午年[うま]</td>
					  </tr>
					  <tr>
					    <td>1991年</td>
					    <td>平成3年</td>
					    <td class="td3">未年[ひつじ]</td>
					  </tr>
					  <tr>
					    <td>1992年</td>
					    <td>平成4年</td>
					    <td class="td3">申年[さる]</td>
					  </tr>
					  <tr>
					    <td>1993年</td>
					    <td>平成5年</td>
					    <td class="td3">酉年[とり]</td>
					  </tr>
					  <tr>
					    <td>1994年</td>
					    <td>平成6年</td>
					    <td class="td3">戌年[いぬ]</td>
					  </tr>
					  <tr>
					    <td>1995年</td>
					    <td>平成7年</td>
					    <td class="td3">亥年[いのしし]</td>
					  </tr>
					  <tr>
					    <td>1996年</td>
					    <td>平成8年</td>
					    <td class="td3">子年[ねずみ]</td>
					  </tr>
					  <tr>
					    <td>1997年</td>
					    <td>平成9年</td>
					    <td class="td3">丑年[うし]</td>
					  </tr>
					  <tr>
					    <td>1998年</td>
					    <td>平成10年</td>
					    <td class="td3">寅年[とら]</td>
					  </tr>
					  <tr>
					    <td>1999年</td>
					    <td>平成11年</td>
					    <td class="td3">卯年[うさぎ]</td>
					  </tr>
					  <tr>
					    <td>2000年</td>
					    <td>平成12年</td>
					    <td class="td3">辰年[たつ]</td>
					  </tr>
					  <tr>
					    <td>2001年</td>
					    <td>平成13年</td>
					    <td class="td3">巳年[へび]</td>
					  </tr>
					  <tr>
					    <td>2002年</td>
					    <td>平成14年</td>
					    <td class="td3">午年[うま]</td>
					  </tr>
					  <tr>
					    <td>2003年</td>
					    <td>平成15年</td>
					    <td class="td3">未年[ひつじ]</td>
					  </tr>
					  <tr>
					    <td>2004年</td>
					    <td>平成16年</td>
					    <td class="td3">申年[さる]</td>
					  </tr>
					  <tr>
					    <td>2005年</td>
					    <td>平成17年</td>
					    <td class="td3">酉年[とり]</td>
					  </tr>
					  <tr>
					    <td>2006年</td>
					    <td>平成18年</td>
					    <td class="td3">戌年[いぬ]</td>
					  </tr>
					  <tr>
					    <td>2007年</td>
					    <td>平成19年</td>
					    <td class="td3">亥年[いのしし]</td>
					  </tr>
					  <tr>
					    <td>2008年</td>
					    <td>平成20年</td>
					    <td class="td3">子年[ねずみ]</td>
					  </tr>
					  <tr>
					    <td>2009年</td>
					    <td>平成21年</td>
					    <td class="td3">丑年[うし]</td>
					  </tr>
					  <tr>
					    <td>2010年</td>
					    <td>平成22年</td>
					    <td class="td3">寅年[とら]</td>
					  </tr>
					  <tr>
					    <td>2011年</td>
					    <td>平成23年</td>
					    <td class="td3">卯年[うさぎ]</td>
					  </tr>
					  <tr>
					    <td>2012年</td>
					    <td>平成24年</td>
					    <td class="td3">辰年[たつ]</td>
					  </tr>
					  <tr>
					    <td>2013年</td>
					    <td>平成25年</td>
					    <td class="td3">巳年[へび]</td>
					  </tr>
					  <tr>
					    <td>2014年</td>
					    <td>平成26年</td>
					    <td class="td3">午年[うま]</td>
					  </tr>
					  <tr>
					    <td>2015年</td>
					    <td>平成27年</td>
					    <td class="td3">未年[ひつじ]</td>
					  </tr>
					  <tr>
					    <td>2016年</td>
					    <td>平成28年</td>
					    <td class="td3">申年[さる]</td>
					  </tr>
					</tbody></table>
				</div>
			</div>
		</section>

		<section class="section_block">
			<h2><span class="typcn typcn-leaf"></span>干支のエピソード</h2>
			<div class="zodiac_episorde clearfix">
				<ul>


					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>子年(ねずみどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>


					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>丑年(うしどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>

					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>寅年(とらどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>


					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>卯年(うさぎどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>

					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>辰年(たつどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>



					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>巳年(へびどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>


					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>午年(うまどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>



					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>未年(ひつじどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>

					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>申年(さるどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>



					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>酉年(とりどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>

					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>戌年(いぬどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>



					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" alt="" title="" src="'.HTTP.'assets/img/zodiac/test_2.png">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>亥年(いのししどし)のエピソード</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>

				</ul>
			</div>
		</section>















		
		
		<section class="section_block">
			<h2><span class="typcn typcn-leaf"></span>干支の相性占い</h2>
			<div class="zodiac_episorde clearfix">
				<ul>
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>子年(ねずみどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>丑年(うしどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>寅年(とらどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>卯年(うさぎどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>辰年(たつどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>巳年(へびどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>午年(うまどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>未年(ひつじどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>申年(さるどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>酉年(とりどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>戌年(いぬどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
		
					<li class="o_8">
						<a href="">
							<div class="zodiac_episorde_contents clearfix">
								<figure>
									<img width="240" height="150" src="'.HTTP.'assets/img/zodiac/test_2.png" title="" alt="">
								</figure>
								<div class="zodiac_episorde_contents_bottom">
									<h1>亥年(いのししどし)との相性ランキング</h1>
									<div class="zodiac_episorde_contents_summary">ねずみのサマリー</div>
								</div>
							</div>
						</a>
					</li>
		
		
		
		
				</ul>
			</div>
		</section>
		

















';
		return $root_section_html;
	}










}
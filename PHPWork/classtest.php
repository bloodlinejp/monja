<?php
// 簡単なカウンタクラス
class MyBasicCounter
{
	var $cnt;
	
	function  MyBasicCounter($inital_val = 0) {
		$this->cnt = $inital_val;
	}
	function  count_up() {
		$this->cnt++;
	}
	function  count_down() {
		$this->cnt--;
	}
	function  get_cint() {
		return $this->cnt;
	}
}

$cnt = new MyBasicCounter(10);
printf("%d\n",$cnt->get_cint());

$cnt->count_up();
printf("%d\n",$cnt->get_cint());

$cnt->count_down();
printf("%d\n",$cnt->get_cint());

class MySecondCounter extends MyBasicCounter
{
	function set_cnt($val) {
		$this->cnt = $val;
	}
}

?>
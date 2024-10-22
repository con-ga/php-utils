<?php
class Testable
{
	function __construct($func, $cmp = null)
	{
		$this->func = $func;
		//echo $this->func([2,3]);
		if ($cmp != null)
		    $this->cmp = $cmp;
		else
		    $this->cmp = function ($a, $b) {
			    return $a == $b;
			};
	}
	function testItem($item, &$pass)
	{
		//$html = "<div class=test-group>"
		$row = "<div class=row><span class=input>";
		foreach ($item[0] as $ind => $arg) {
			if ($ind != 0) $row .= " | ";
			$row .= $arg;
		}
		$row .= "</span> || <span class=expect>";
		$res = ($this->func)($item[0]);
		$row .= $item[1] . "</span> || <span class=result>" . $res . "</span> || ";
		$eq = ($this->cmp)($item[1], $res) ;
		if ($eq) $pass++;
		$row .= "<span class=equal-or-not>" . ($eq? "==" : "!=") . "</span>";
		$row .= "</div>";
		echo $row;
	}
	function test($data)
	{
		$pass = 0;
		echo "<div><b>" . $this->func . "</b></div>";
		foreach ($data as $item) {
			$this->testItem($item, $pass);
		}
		echo $pass . " / " . count($data) . " passed. <hr >";
	}
}
?>
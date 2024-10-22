<?php
//require "../testable/testable.php";
$type_regexp = array(
    "i" => "/^[0-9]+$/",
    "d" => "/^[+-]?([0-9]*([.][0-9]+)?|[0-9]+[.])$/",
    "s" => "/^\"([^\"\\\\]+|(\\\\.|\"\")+)*\"$/"
);
function checkDataType($type, $data)
{
	global $type_regexp;
	//echo $type_regexp[$type];
	return preg_match($type_regexp[$type], $data);
}
function isInt($data)
{
	return checkDataType("i", $data[0]);
}
/*function testIntData()
{
	return [
	    [["123"], 1],
	    [["0123"] ,1],
	    [[""] , 0],
	    [["123d" ],0],
	    [[".123"] ,0],
	    [["1.23"] , 0],
	    [["123."] , 0],
	    [["abcd1"] , 0]
	];
}*/
function isFloat($data)
{
	return checkDataType("d", $data[0]);
}
/*function testFloatData()
{
	return [
	    [["1.234"],1],
	    [[".1234"],1],
	    [["1234."],1],
	    [["+1234"],1],
	    [["-.1234"],1],
	    [["1.234e5"], 0]
	];
}*/
function isString($data)
{
	return checkDataType("s", $data[0]);
}
/*function testStringData()
{
	return [
	    [["\"qsdf1234_&-\""],1],
	    [["\"dfg245':;dfgg"],0],
	    [["dfg234_&-\""],0],
	    [["\"df34\"\"\"\"dfggg\""],1],
	    [["\"345_&-:;!?\\\"\\\"&-\""],1],
	    [["\"4&-\\\\\\\\¢°π√\""],1],
	    [["\"45&_':\"\"\"dfg\""],0],
	    [["\"':;&_\\\"&-+\""],1],
	    [["\"_&-55\\4&&\""],1],
	    [["\"dgg\\\\\\\""],0],
	    [["\"456\" or 1=1;select \"\""],0]
	];
}
function testInt()
{
	$data = testIntData();
	$pass = 0;
	foreach ($data as $s => $r) {
		$r2 = isInt($s);
		echo $s . " | " . $r . " | " . $r2 . " | " . ($r == $r2 ? "==" : "!=") . "<br>";
		$pass += $r == $r2 ? 1 : 0;
	}
	echo $pass . "/" . count($data) . "passed.<br>";
}
//testInt();


$testable = new Testable("isInt");
$testable->test(testIntData());
$testable = new Testable("isFloat");
$testable->test(testFloatData());
$testable = new Testable("isString");
$testable->test(testStringData());
*/
?>
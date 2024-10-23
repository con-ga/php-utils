<?php
return (function () {
	$type_regexp = array(
        "i" => "/^[0-9]+$/",
        "f" => "/^[+-]?([0-9]*([.][0-9]+)?|[0-9]+[.])$/",
        "s" => "/^\"([^\"\\\\]+|(\\\\.|\"\")+)*\"$/"
    );
	$checkType = function ($type, $data) use ($type_regexp) {
	    return preg_match($type_regexp[$type], $data);
	};
	return new class ($checkType) {
		function __construct($checkType) {
			$this->checkType = $checkType;
		}
        function isInt($data) {
        	return ($this->checkType)("i", $data);
        }
        function isFloat($data) {
        	return ($this->checkType)("f", $data);
        }
        function isString($data) {
        	return ($this->checkType)("s", $data);
        }
    };
})();

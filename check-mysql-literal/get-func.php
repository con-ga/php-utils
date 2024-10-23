<?php
$check = require("check-type.php");
echo "(", $check->isInt("12"),")";
echo "(", $check->isInt("12.3"), ")";

<?php

require_once("classes/Frontend.class.php");
require_once("classes/Mod.class.php");

$app = new Frontend($db);

include("res/php/head.php");
include("res/php/between.php");

$app->modShow();

include("res/php/foot.php");

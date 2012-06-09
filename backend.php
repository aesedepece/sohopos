<?php

require_once("classes/Backend.class.php");
require_once("classes/Cnt.class.php");

$app = new Backend($db);

$app->controllerRun();

#!/usr/bin/env php
<?php

include 'bootstrap.php';

$tool = isset($argv[1]) ? $argv[1] : 'help';

loadTool($tool);

$ret = call_user_func_array($tool, array_slice($argv, 2));
print_r($ret);
<?php

require_once 'core.inc.php';

session_destroy();

header('Location: '.$http_referer);
?>
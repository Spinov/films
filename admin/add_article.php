<?php
include_once '../.base.php';

ob_start();
include_once PATH_TPL.'/add_articles.php';
$content = ob_get_contents();
ob_end_clean();

include_once PATH_TPL.'/page.php';
//phpinfo(INFO_VARIABLES);

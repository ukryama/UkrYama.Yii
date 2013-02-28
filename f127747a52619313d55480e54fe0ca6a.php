<?php 
     define('_SAPE_USER', 'f127747a52619313d55480e54fe0ca6a');
     require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
     $sape_articles = new SAPE_articles();
     echo $sape_articles->process_request();
?>

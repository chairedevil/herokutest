<?php
    require_once "GoogleTranslate.php";
    $word = $_REQUEST['word'];
    $GT = NEW GoogleTranslate();
    $response = $GT->translate('ja','en',$word);
    echo $word."   =   ".$response;
?>
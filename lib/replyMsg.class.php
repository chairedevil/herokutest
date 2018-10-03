<?php
    require_once ('./vendor/autoload.php');
    use \Dejurin\GoogleTranslateForFree;

    class replyMsg
    {
        public function translate($msg){

            $tr = new GoogleTranslateForFree();
            $returnMsg = $tr->translate('ja', 'en', $msg);

            return $returnMsg;
        }
    }

?>
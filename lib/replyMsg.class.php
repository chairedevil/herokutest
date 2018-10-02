<?php
    require_once ('./vendor/autoload.php');
    use \Dejurin\GoogleTranslateForFree;

    class replyMsg
    {
        public function gen($msg){

            if($msg[0] == "#"){
                $tr = new GoogleTranslateForFree();
                $tranText = substr($msg, 1);
                $returnMsg = $tr->translate('ja', 'en', $tranText);
            }

            return $returnMsg;
        }
    }

?>
<?php
    require_once ('./vendor/autoload.php');
    use \Dejurin\GoogleTranslateForFree;

    class replyMsg
    {
        public function translate($msg){

            $tr = new GoogleTranslateForFree();
            $returnMsg = $tr->translate('ja', 'en', $msg);

            if($msg == $returnMsg){
                $returnMsg = $tr->translate('en', 'ja', $msg);
            }

            return $returnMsg;
        }

        public function getLastInstra($userId){

            $cache = new Instagram\Storage\CacheManager('instragram_cache');

            $api = new Instagram\Api($cache);
            $api->setUserName($userId);

            try {

                $feed = $api->getFeed();
                $thumSrc = $feed->getMedias()[0]->getThumbnailSrc();
                $imgSrc = $feed->getMedias()[0]->getDisplaySrc();
                $img = array();
                $img['thumSrc'] = $thumSrc;
                $img['imgSrc'] = $imgSrc;

            } catch (Exception $exception) {
                print_r($exception->getMessage());
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                print_r($exception->getMessage());
            }


            return $img;
        }
    }

?>
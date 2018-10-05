<?php
    require_once ('./vendor/autoload.php');
    use \Dejurin\GoogleTranslateForFree;
    use \DetectLanguage\DetectLanguage;

    class replyMsg
    {
        public function translate($msg){

            $tr = new GoogleTranslateForFree();
            
            DetectLanguage::setApiKey("87bd89dad3e829243777382a605b2dc2");
            $languageCode = DetectLanguage::simpleDetect($msg);

            if($languageCode == 'ja'){
                $returnMsg = $tr->translate('ja', 'en', $msg);
            }else{
                $returnMsg = $tr->translate('auto', 'ja', $msg);
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
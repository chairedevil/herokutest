<?php
    require_once('lib/replyMsg.class.php');

    $message['type'] = "text";
    $message['text'] = "#こんばんは";

    echo "<pre>";
    print_r($message);
    echo "</pre>";

    $rm = new replyMsg();

    if($message['type'] == "text"){

        echo $rm->gen($message['text']);

    }



    function rudr_instagram_api_curl_connect( $api_url ){
        $connection_c = curl_init(); // initializing
        curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
        curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
        curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
        $json_return = curl_exec( $connection_c ); // connect and get json data
        curl_close( $connection_c ); // close connection
        return json_decode( $json_return ); // decode and return
    }

    $access_token = '1650237.6615052.2df86910def041519e66ed6cf97d15c8';
    $username = 'jpanpanpan';
    $user_search = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $access_token);
    // $user_search is an array of objects of all found users
    // we need only the object of the most relevant user - $user_search->data[0]
    // $user_search->data[0]->id - User ID
    // $user_search->data[0]->first_name - User First name
    // $user_search->data[0]->last_name - User Last name
    // $user_search->data[0]->profile_picture - User Profile Picture URL
    // $user_search->data[0]->username - Username
     
    //$user_id = $user_search->data[0]->id; // or use string 'self' to get your own media
    $user_id = 'self';
    $return = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent?access_token=" . $access_token);
     
    //var_dump( $return ); // if you want to display everything the function returns
     
    foreach ($return->data as $post) {
        echo '<a href="' . $post->images->standard_resolution->url . '" class="fancybox"><img src="' . $post->images->thumbnail->url . '" /></a>';
    }

    //instagram Access Token : 1650237.6615052.2df86910def041519e66ed6cf97d15c8
?>
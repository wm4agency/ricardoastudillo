<?php

/*

1.- Create an App.

2.- Go to: https://developers.facebook.com/tools/explorer/

  + Select your new created app on the right top.
  + Select "Get App Token"

3.- Copy this "{ACCESS-TOKEN}" (is in the form: number|hash)

IMPORTANT: (This are not app_id|app_secret!!!)

4.- Query the URL:

  + https://graph.facebook.com/{PAGE-ID}}/posts?access_token={ACCESS-TOKEN}

(5).- Equivalent URL

  + https://graph.facebook.com/{PAGE-ID}}/feed?access_token={ACCESS-TOKEN}

*/

function curl_helper($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data);
}

// Facebook Page: take the last post from here.

$page_ID = '1598653583496620';

// Hardcode the App Acces token obtained in point 3. (Server Side Please.)

$access_token = '167165777296908|0_gajIP189C4Zz9TrIt80oywol8';

$posts = curl_helper('https://graph.facebook.com/'.$page_ID.'/posts?access_token='.$access_token);

$latest_post =  $posts->data[0];

$the_post = curl_helper('https://graph.facebook.com/v2.9/'.$latest_post->id.'?fields=message%2Cstory%2Cfull_picture&access_token='.$access_token);

list($pageID, $postID) = preg_split('/_/', $latest_post->id);

$post_url = 'https://www.facebook.com/'.$pageID.'/posts'.'/'.$postID;

//$text = '<a href="'.$post_url.'">'.$latest_post->message.'</a>';
//$text = $latest_post->id;

//echo $text;
//print_r($the_post);
echo json_encode($the_post);
//curl -i -X GET \
//    "https://graph.facebook.com/v2.9/245853432526391_295189760926091?fields=message%2Cstory%2Cfull_picture&access_token=1424598507563593%7C8WoecKTk5nb-GVBn-faCx1WMQoQ"

?>

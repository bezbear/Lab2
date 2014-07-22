<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setup(){
    
    require('../twitteroauth/twitteroauth.php');
    
    $consumerkey = 'x8ljYgClK8hMtzKNojVwcxrzu';
    $consumersecret = 'q6LTdi1JOkF0dZHjIB0h4qayrBUX1Xci0U9vrhsH5L8NkYELBc';
    $accesstoken = '120867394-6kIAsBvfc2qixRUqCrLIp5NXc99SiXOSj9NDB05c';
    $accesstokensecret = '0d6J3AJn3cb2qhnla3YjD9hYL69Dw4DH465btiIDkE2jp';
    
    $twitter=new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    return $twitter;
    
    
}
//Serch User Time line function
function searchUserTimeLine($twitter,$screen_name){
    
    //Get Twitter user timeline data
    $tweets=$twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?'.'screen_name='.$screen_name.'&count=10');
    return $tweets;
       
}

//Search Keyword function 
function searchKeyword($twitter,$query,$since){
    if(strlen($since)>0){
        $since='&since='.$since;
    }
    $result_type='&result_type=mixed';
    $count='&count=20';
    $Q='https://api.twitter.com/1.1/search/tweets.json?q='.urlencode($query).$since.$result_type.$count;
    $tweets=$twitter->get($Q);
    $objs=$tweets->statuses;
    return $objs;
   
}


//$twitter=setup();
//$tweets=searchUserTimeline($twitter,'EdisonLao');
//$obj=$tweets[0];
//echo $obj->text;


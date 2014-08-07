<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../model/user.php';
require '../model/Tweet.php';

function showArray($tweets) {
    foreach ($tweets as $obj) {
        echo $obj->created_at . '<br>';
        echo $obj->user->screen_name . '<br>';
        echo $obj->text . '<br>';
        echo '<b>Friends</b>: ' . $obj->user->friends_count . ' I ';
        echo '<b>Followers</b>: ' . $obj->user->followers_count . ' I ';
        echo '<b>Retweeted</b>: ' . $obj->retweet_count . '<br>';
        echo '<img src=' . $obj->user->profile_image_url . '/><br>';
        echo '<b>Location</b>: ' . $obj->user->location . '<br>';
        echo '<hr>';
    }
}

function showArray2($tweets) {
    foreach ($tweets as $obj) {
        $i++;
        $user = new User($obj->user->screen_name,
            $obj->user->friends_count,
            $obj->user->followers_count,
            $obj->user->profile_image_url,
            $obj->user->location
            );
        $twt = new Tweet($obj->created_at, $user, $obj->text, $obj->retweet_count);
        $twt->display();
    }
}


// Takes an array of Tweet objects and displays them. 
function showArray3($allTweets) {
    
    $tweetsFound = sizeof($allTweets);
    echo "Tweets found: $tweetsFound<br><br><br>";
    if ($tweetsFound > 0) {
        echo '<table>';
        foreach ($allTweets as $theTweet) {
            echo '<tr><td>';
            $theTweet->display();
            echo '</td></tr>';
        }
        echo '</table>';
    } else {
        echo "No tweets found<br>";
    }
}

<?php
/**
 * YourHusbandoBot
 *
 * @author @vampire__
 * @author @alvaroveliz
 * @version 1.0
 */

require_once 'libs/twitteroauth.php';
require_once 'config.php';
include 'husbando.php';

// configuring twitter
$twitter = new twitteroauth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);

// getting user mentions
$mentions_url = 'https://api.twitter.com/1.1/statuses/mentions_timeline.json';
$statuses_url = 'https://api.twitter.com/1.1/statuses/update.json';

$mentions_params = array();
$mentions = $twitter->get($mentions_url, $mentions_params);

// using while because foreach and for uses more memory :3
$m = 0;
while ($m < count($mentions)) {
    $user_to_reply = $mentions[$m]->user->screen_name;
    $husbando = what_is_my_husbando($user_to_reply);

    $status = '@'.$user_to_reply.' your husbando is '.$husbando['name'].' : '.$husbando['picture'];

    $tweet_params = array(
        'status' => $status,
        'in_reply_to_status_id' => $mentions[$m]->id
    );
    //$twitter->post($statuses_url, $tweet_params);

    $m++;
    exit;
}

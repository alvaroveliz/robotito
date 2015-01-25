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
$upload_url   = 'https://upload.twitter.com/1.1/media/upload.json';

$mentions_params = array();
$mentions = $twitter->get($mentions_url, $mentions_params);

// using while because foreach and for uses more memory :3
$m = 0;

echo '<pre>';
if (array_key_exists('errors', $mentions)) {
    print_r($mentions);
} else {
    while ($m < (count($mentions)-1)) {
        $user_to_reply = $mentions[$m]->user->screen_name;
        $husbando = what_is_my_husbando($user_to_reply);

        if ($husbando !== false) {
            // first we upload the photo
            $image_path   = 'husbandos/'.$husbando['picture'];

            $uploaded_image = '';
            if (file_exists($image_path)) {
                echo "Uploading husbando picture : ".$image_path."\r\n";
                $media_base64 = base64_encode(file_get_contents($image_path));
                $image_params = array(
                    'media' => $media_base64
                );
                $uploaded_image = $twitter->post($upload_url, $image_params);
            }

            $status = '@'.$user_to_reply.' Your husbando is '.$husbando['name'];

            echo date('Y-m-d H:i:s') . ' -- '. $status."\r\n";

            $tweet_params = array(
                'status' => $status,
                'in_reply_to_status_id' => $mentions[$m]->id,
            );

            if (is_object($uploaded_image)) {
                $tweet_params['media_ids'] = "$uploaded_image->media_id_string";
            }

            $twitter->post($statuses_url, $tweet_params);
        } else {
            echo "Husbando already sent to ".$user_to_reply."\r\n";
        }

        $m++;
    }
}
echo '</pre>';

exit;

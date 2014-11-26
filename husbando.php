<?php
/**
 * Husbando core
 */

function what_is_my_husbando($screen_name)
{
    // Detect if this user already have a husbnado for today
    $husbandos = array(
        array(
            'name' => 'Killua Zoldyck',
            'picture' => 'http://media-cache-ak0.pinimg.com/236x/4a/de/0b/4ade0b88ea69ee5b507ce1a904fd42a4.jpg'
        ),
    );

    return $husbandos[array_rand($husbandos)];
}

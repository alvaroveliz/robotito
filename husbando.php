<?php
/**
 * Husbando core
 */

function what_is_my_husbando($screen_name)
{
    // Detect if this user already have a husbnado for today
    $husbandos = array(
        array(
        'name' => 'Akihiko Sanada'
        'picture' => 'akihiko_sanada.jpg'
        ),
        array(
        'name' => 'Makoto Tachinaba',
        'picture' => 'makoto_tachinaba.jpg'
        ),
        array(
        'name' => 'Rukawa Kaede',
        'picture' => 'rukawa_kaede.jpg'
        ),
    );

    return $husbandos[array_rand($husbandos)];
}

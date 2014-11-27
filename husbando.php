<?php
/**
 * Husbando core
 */

function what_is_my_husbando($screen_name)
{
    // Detect if this user already have a husbnado for today
    $husbandos = array(
        array(
        'name' => 'husbando 1'
        'picture' => 'akihiko_sanada.jpg'
        ),
        array(
        'name' => 'husbando 2',
        'picture' => 'makoto_tachinaba.jpg'
        ),
        array(
        'name' => 'husbando 3',
        'picture' => 'rukawa_kaede.jpg'
        ),
    );

    return $husbandos[array_rand($husbandos)];
}

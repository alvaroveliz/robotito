<?php
/**
 * Husbando core
 */

function what_is_my_husbando($screen_name)
{
    $dbh = new PDO('sqlite:data/husbandos.sqlite');

    // Detect if this user already have a husbnado for today
    $sql = "SELECT COUNT(*) as 'count' FROM husbandos WHERE username = '".$screen_name."' AND married_at BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'";
    $result = $dbh->query($sql, PDO::FETCH_ASSOC);
    $rows = $result->fetchAll();

    if ($rows[0]['count'] == 0) {

        $husbandos = array(
            array(
                'name'    => 'Akihiko Sanada',
                'picture' => 'akihiko_sanada.png'
            ),
            array(
                'name'    => 'Aomine Daiki',
                'picture' => 'aomine_daiki.jpg'
            ),
            array(
                'name'    => 'Hak',
                'picture' => 'hak.png'
            ),
            array(
                'name'    => 'Haruka Nanase',
                'picture' => 'haruka_nanase.png'
            ),
            array(
                'name'    => 'Hijirikawa Masato',
                'picture' => 'hijirikawa_masato.png'
            ),
            array(
                'name'    => 'Hisoka',
                'picture' => 'Hisoka.png'
            ),
            array(
                'name'    => 'Ittoki Otoya',
                'picture' => 'ittoki_otoya.png'
            ),
            array(
                'name'    => 'Makoto Tachinaba',
                'picture' => 'makoto_tachinaba.jpg'
            ),
            array(
                'name'    => 'Rukawa Kaede',
                'picture' => 'rukawa_kaede.jpg'
            ),
            array(
                'name'    => 'Ryoga Hibiki',
                'picture' => 'ryoga_hibiki.jpg'
            ),
            array(
                'name'    => 'Sanosuke Sagara',
                'picture' => 'sanosuke_sagara.jpg'
            ),
        );

        $husbando = $husbandos[array_rand($husbandos)];

        // Registering a husbando for user
        $dbh->query("INSERT INTO husbandos (username, husbando, married_at) VALUES ('".$screen_name."', '".$husbando['name']."', '".date('Y-m-d H:i:s')."')");

        return $husbando;
    } else {
        return false;
    }
}

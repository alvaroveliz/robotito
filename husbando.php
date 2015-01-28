<?php
/**
 * Husbando core
 */

function what_is_my_husbando($screen_name, $tweet_id)
{
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);

    // Detect if this user already have a husbnado for today
    $sql = "
    SELECT COUNT(*) as 'count' 
    FROM husbandos 
    WHERE username = '".$screen_name."' 
      AND (
            tweet_id = '".$tweet_id."'
        OR  married_at BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'
      )
    ";

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
                'name'    => 'Aquarius Camus',
                'picture' => 'aquarius_camus.jpg'
                
            ),
             array(
                'name'    => 'Dio Brando',
                'picture' => 'dio_brando.jpg'
                
            ),
             array(
                'name'    => 'Fuuma Monou',
                'picture' => 'fuuma_monou.jpg'
                
            ),
             array(
                'name'    => 'Gaara',
                'picture' => 'gaara.png'
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
                'picture' => 'Hisoka.jpg'
                
            ),
            array(
                'name'    => 'Hiei',
                'picture' => 'hiei.jpg'
            ),
            array(
                'name'    => 'Ittoki Otoya',
                'picture' => 'ittoki_otoya.png'
            ),
            array(
                'name'    => 'Kou Mabuchi',
                'picture' => 'kou_mabuchi.jpg'
            ),
            array(
                'name'    => 'Kurapika',
                'picture' => 'kurapika.jpg'
                
            ),
            array(
                'name'    => 'Kogami Shinya',
                'picture' => 'kogami_shinya.jpg'
            ),
            array(
                'name'    => 'Makoto Tachinaba',
                'picture' => 'makoto_tachinaba.png'
            ),
            array(
                'name'    => 'Mamoru Chiba',
                'picture' => 'mamoru_chiba.png'
                
            ),
            array(
                'name'    => 'Mitsuyoshi Anzai',
                'picture' => 'mitsuyoshi_anzai.png'
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
            array(
                'name'    => 'Shinji Ikari',
                'picture' => 'shinji_ikari.jpg'
                
            ),
             array(
                'name'    => 'Spike Spiegel',
                'picture' => 'spike_spiegel.jpg'

            ),
             array(
                'name'    => 'Touya Kinomoto',
                'picture' => 'touya_kinomoto.jpg'

            ),
             array(
                'name'    => 'Tooru Oikawa',
                'picture' => 'tooru_oikawa.jpg'
                
            ),
             array(
                'name'    => 'Trunks',
                'picture' => 'trunks.jpg'
            ),
            array(
                'name'    => 'Wakasa',
                'picture' => 'Wakasa.jpg'
            ),
            array(
                'name'    => 'Yosuke Hanamura',
                'picture' => 'yosuke_hanamura.png'
            ),
        );

        $husbando = $husbandos[array_rand($husbandos)];

        // Registering a husbando for user
        $insert = "INSERT INTO husbandos (username, husbando, married_at, tweet_id) VALUES ('".$screen_name."', '".$husbando['name']."', '".date('Y-m-d H:i:s')."', '".$tweet_id."')";
        $result = $dbh->exec($insert);

        return $husbando;
    } else {
        return false;
    }
}

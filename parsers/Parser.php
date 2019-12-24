<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/db.php';

class Parser extends Db
{
    public function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/libs/phpQuery.php';
    }

    public function get_html($url, $referer = 'http://www.google.com')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36");
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
}
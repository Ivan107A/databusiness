<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/parsers/Parser.php';

class oldiParser extends Parser
{
    public function get_all_categories()
    {
        $html = $this->get_html('https://www.oldi.ru/catalog/all/');
        $document = phpQuery::newDocument($html);

        $categories = $document->find('.clearfix:eq(1)');
        $strlinks = $categories->find('a');
        $all_links = explode('"', $strlinks);

        $good_links = array();
        $bad_links = require_once $_SERVER['DOCUMENT_ROOT'] . '/files/oldiUrlsList.php';

        foreach($all_links as $link)
        {
            if(preg_match('!^/catalog!', $link) == 1 && in_array($link, $bad_links) == 0)
            {
                array_push($good_links, 'https://www.oldi.ru'.$link);
            }
        }

        phpQuery::unloadDocuments($document);

        return $good_links;
    }

    public function get_count_pages($url)
    {
        $html = $this->get_html($url);
        $document = phpQuery::newDocument($html);
        $numbs = $document->find('.numbs a:last()')->text();
        phpQuery::unloadDocuments($document);

        if($numbs == "")
        {
            $numbs = 1;
        }

        return $numbs;
    }

    public function get_items($url)
    {
        $pages = $this->get_count_pages($url);
        $items = array();
        for($i = 1; $i <= $pages; $i++)
        {
            $html = $this->get_html($url . '#page' . $i);
            $document = phpQuery::newDocument($html);
            $items[] = $document->find('.catalog-list-wrapper');
            phpQuery::unloadDocuments($document);
        }

        return $items;
    }
}

$oldiParser = new oldiParser();
foreach ($oldiParser->get_items('https://www.oldi.ru/catalog/6849/') as $item)
{
    echo $item . "<hr><hr><hr>";
}


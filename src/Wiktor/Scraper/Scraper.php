<?php

namespace Wiktor\Scraper;


use Symfony\Component\DomCrawler\Crawler;

class Scraper
{
    private $baseUrl;
    private $indexUrl;
    private $itemsData;

    function __construct($baseUrl, $indexUrl)
    {
        $this->baseUrl = $baseUrl;
        $this->indexUrl = $indexUrl;
    }

    public function loadData() {
        $this->loadIndex();

        foreach($this->itemsData as $data) {
            $this->loadDetails($data);
        }

        return $this->itemsData;

    }

    private function loadIndex() {
        $rawBody = file_get_contents($this->baseUrl. $this->indexUrl);
        $crawler = new Crawler($rawBody);
        $elements = $crawler->filterXPath(".//*[@id='cid1349263518137']/div[2]/ul/li/h3/a");

        $this->itemsData = $elements->each(function($node, $i){
                $item = new ItemDetails();
                $item->setName($node->text());
                $item->setUrl($node->extract('href')[0]);
                return $item;
            });
    }

    private function loadDetails($itemData) {
        $rawBody = file_get_contents($this->baseUrl. $itemData->getUrl());
        $crawler = new Crawler($rawBody);
        $elements = $crawler->filterXPath(".//*[@id='rooms']/ul/li/a");

        foreach($elements as $element) {
            $crawler->clear();
            $crawler->add($element);

            $priceFrom = $crawler->filter('span')->first()->text();
            $allRoomsInfo = $crawler->filter('span')->first()->parents()->text();

            $roomType = trim(str_replace($priceFrom, '' , $allRoomsInfo));
            $cleanPrice = trim(str_replace('From ', '', $priceFrom));

            $itemData->addRoom($roomType, $cleanPrice);
        }
    }

} 
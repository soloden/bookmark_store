<?php

namespace App\Services;

use Goutte\Client;

class ScrapService
{

    protected $url;
    protected $googleS2 = 'http://www.google.com/s2/favicons?domain=';

    public function __construct($url = null)
    {
        if ($url !== null) {
            $this->url = $url;
        }
    }

    public function getS2Google()
    {
        return $this->googleS2;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function scrabb()
    {
        $title = $favicon = $description = $keyword = null;
        $client = new Client();
        $crawler = $client->request('GET', $this->getUrl());
        $title = $crawler->filterXPath('//title')->text();

        if ($crawler->filterXPath('//meta[@name="description"]')->count() > 0) {
            $description = $crawler->filterXPath('//meta[@name="description"]')->attr('content');
        }

        if ($crawler->filterXPath('//meta[@name="keywords"]')->count() > 0) {
            $keyword = $crawler->filterXPath('//meta[@name="keywords"]')->attr('content');
        }

        $explodeUrl = parse_url($this->getUrl());
        $favicon = $this->getS2Google() . $explodeUrl['host'];
        return compact('favicon', 'title', 'description', 'keyword');
    }
}

<?php

namespace App\Scraper;

use App\Models\Product;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class phoneData {

    public function scrape() {
        $url = 'https://www.thegioididong.com/laptop#i:2';

        $client = new Client();

        $crawler = $client->request('GET', $url);
        $crawler->filter('ul.homeproduct li.item')->each(function($node) {

            $name = $node->filter('h3')->text();
            $price = $node->filter('.price span')->text();
            $promotion_price = $node->filter('.price strong')->text();
            $ram = $node->filter('.props span')->first()->text();
            $rom = $node->filter('.props span')->last()->text();

            $product = new Product();
            $product->name = $name;
            $product->price= $price;
            $product->ram= $ram;
            $product->rom= $rom;
            $product->promotion_price= $promotion_price;
            $product->save();
        });
    }

}
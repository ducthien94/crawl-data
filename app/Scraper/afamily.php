<?php

namespace App\Scraper;

use App\Models\Post;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class afamily {

    public function scrape() {

        $client = new Client();

        $crawler = $client->request('GET', 'https://afamily.vn/');
        $crawler->filter('.list_afnews-mid li')->each(function($node) {

            $title = $node->filter('.afnews_total h3 a.afnews_title')->text();
            $category= $node->filter('.afnews_total > a')->text();
            $url = $node->filter('.afnews_total h3 a.afnews_title')->attr('href');
            $short_content = $node->filter('.afnews_total p.afnews_sapo')->text();
            $posting_time = $node->filter('.time')->attr('title');

            $post = new Post();
            $post->title = $title;
            $post->category = $category;
            $post->short_content = $short_content;
            $post->posting_time = $posting_time;
            $post->url = 'https://afamily.vn'.$url;
            $post->save();
        });
    }

}
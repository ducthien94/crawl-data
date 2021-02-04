<?php

namespace App\Scraper;

use App\Models\Post;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class kenh14 {

    public function scrape() {

        $client = new Client();

        $crawler = $client->request('GET', 'https://kenh14.vn/');
        $crawler->filter('.knsw-list .knswli')->each(function($node) {

            $title = $node->filter('.knswli-title a')->text();
            $url = $node->filter('.knswli-title a')->attr('href');
            $category = $node->filter('.knswli-meta a')->text();
            $short_content = $node->filter('span.knswli-sapo')->text();
            $posting_time = $node->filter('.knswli-time')->attr('data-second');

            $post = new Post();
            $post->title = $title;
            $post->category = $category;
            $post->short_content = $short_content;
            $post->url = 'https://kenh14.vn/'.$url;
            $post->posting_time = $posting_time;
            $post->save();
        });
    }

}
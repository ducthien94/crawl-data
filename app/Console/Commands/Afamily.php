<?php

namespace App\Console\Commands;

use App\Scraper\afamily as ScraperAfamily;
use Illuminate\Console\Command;

class Afamily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:afamily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl data from Afamily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot = new ScraperAfamily();
        $bot->scrape();
    }
}
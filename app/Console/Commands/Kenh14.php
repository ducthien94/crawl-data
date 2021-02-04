<?php

namespace App\Console\Commands;

use App\Scraper\kenh14 as ScraperKenh14;
use Illuminate\Console\Command;

class Kenh14 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:kenh14';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kenh14';

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
        $bot = new ScraperKenh14();
        $bot->scrape();
    }
}
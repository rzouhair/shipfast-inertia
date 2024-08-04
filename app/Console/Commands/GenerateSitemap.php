<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Or you can use Spatie's SitemapGenerator
        // SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        $smg = new \App\Helpers\SitemapGenerator();
        $smg->GenerateSitemap();
    }
}
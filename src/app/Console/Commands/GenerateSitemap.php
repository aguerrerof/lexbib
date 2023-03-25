<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Podcast;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating sitemap';

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
     * @return void
     */
    public function handle(): void
    {
        $sitemap = Sitemap::create();
        Post::get()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(
                Url::create("/post/{$post->uuid}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
            );
        });
        Podcast::get()->each(function (Podcast $podcast) use ($sitemap) {
            $sitemap->add(
                Url::create("/post/{$podcast->uuid}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER)
            );
        });
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}

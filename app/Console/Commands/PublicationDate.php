<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublicationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publication:date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to publish posts on a specific date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $publications = Post::where('status', 'en_attente')
        ->where('publication_date', '<=', Carbon::now())
        ->get();

foreach ($publications as $publication) {
$publication->status = 'Publié';
$publication->save();
}
    }
}

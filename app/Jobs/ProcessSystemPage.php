<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Log;

class ProcessSystemPage implements ShouldQueue
{
    use Queueable;
    public $tries = 25;
    public $page;
    /**
     * Create a new job instance.
     */
    public function __construct($page)
    {
        //Takes a page number calls the system endpoint adds all the data to the database.
        $this->page = $page;
    }

    public function middleware(): array
    {
        return [new RateLimited('systemCollection')];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::alert("Job page " . $this->page . " Completed!");
    }
}

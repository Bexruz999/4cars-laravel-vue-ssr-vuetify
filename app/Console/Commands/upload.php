<?php

namespace App\Console\Commands;

use App\Services\UploadService;
use Illuminate\Console\Command;

class upload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:xlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(UploadService $uploadService)
    {
        //$uploadService->upload();
        $uploadService->generate();
    }
}

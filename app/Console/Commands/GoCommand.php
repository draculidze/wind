<?php

namespace App\Console\Commands;

use App\Models\Log;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Console\Command;
use PHPUnit\Framework\Exception;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My command for testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump(Role::getRoles());
    }
}

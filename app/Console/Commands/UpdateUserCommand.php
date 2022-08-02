<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Events\UpdateUser;
use Illuminate\Console\Command;

class UpdateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will update the user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::find(1);

        $user->update([
            'name' => 'parham',
            'email' => 'sina@gmail.com',
            'city' => 'Hamedan',
            'mobile' => '09031368939'
        ]);

    broadcast(new UpdateUser(User::first()));
        
    }
}

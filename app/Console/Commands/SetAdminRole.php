<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SetAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:admin {email : Email of the user} {--undo : Revert user role to employee}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the role of a user to admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email '{$email}' not found.");
            return;
        }

        if ($this->option('undo')) {
            $user->roles = 'employee';
            $user->save();
            $this->info("User '{$user->name}' with email '{$email}' role has been reverted back to employee.");
        } else {
            $user->roles = 'admin';
            $user->save();
            $this->info("User '{$user->name}' with email '{$email}' has been set as an admin.");
        }
    }
}

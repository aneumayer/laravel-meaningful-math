<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use function Laravel\Prompts\confirm;

class CreateUserCommand extends Command
{
    protected $signature   = 'user:create';
    protected $description = 'Create an admin user interactively';

    public function handle()
    {
        $name          = text('Enter the name of the admin user');
        $username      = text('Enter the username');
        $plainPassword = password('Enter the password');

        $confirm = confirm("Create user with username '{$username}'?");

        if (! $confirm) {
            $this->info('User creation cancelled.');
            return;
        }

        $user = User::create([
            'name'     => $name,
            'username' => $username,
            'password' => bcrypt($plainPassword),
        ]);

        $this->info("Admin user '{$user->username}' created successfully!");
    }
}

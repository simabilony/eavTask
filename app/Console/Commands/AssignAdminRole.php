<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AssignAdminRole extends Command
{
    protected $signature = 'assign:admin-role {user_id}';
    protected $description = 'Assign admin role to a user';

    public function handle()
    {
        $userId = $this->argument('user_id');
        $user = User::find($userId);

        if ($user) {
            $user->assignRole('admin');
            $this->info('Admin role assigned successfully.');
        } else {
            $this->error('User not found.');
        }
    }
}

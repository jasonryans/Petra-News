<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DowngradeExpiredRoles extends Command
{
    protected $signature = 'roles:downgrade-expired';
    protected $description = 'Downgrade penyelenggara yang role-nya sudah expired';

    public function handle()
    {
        $now = Carbon::now();

        $users = User::where('role', 'penyelenggara')
            ->whereNotNull('role_expired_at')
            ->where('role_expired_at', '<', $now)
            ->get();

        foreach ($users as $user) {
            $user->role = 'user';
            $user->role_expired_at = null;
            $user->save();

            $this->info("Role {$user->email} berhasil diturunkan menjadi 'user'.");
        }

        $this->info("Selesai. Total pengguna yang diubah: " . $users->count());
    }
}

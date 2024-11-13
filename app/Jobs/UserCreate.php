<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class UserCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i = 0; $i < 10000; $i++) {   
            User::create([
                "name" => $this->data["name"] . $i,
                "email" => $i.$this->data["email"],
                "password" => Hash::make($this->data["password"]),
            ]);
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Mail\DeadlineReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;

class SendDeadlineReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-deadline-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = Category::whereDate('deadline', '=', now()->addDay())->get();

        foreach ($categories as $category) {
            Mail::to($category->user->email)->send(new DeadlineReminder($category, $category->deadline));
        }
    }
}

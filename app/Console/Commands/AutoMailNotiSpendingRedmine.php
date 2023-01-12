<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\MailSpendingRedmine;
use App\Models\User;

class AutoMailNotiSpendingRedmine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MailSpendingRedmine';

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
    public function handle()
    {
        $users = User::get();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new MailSpendingRedmine($user));
            }
        }
  
        return 0;
    }
}

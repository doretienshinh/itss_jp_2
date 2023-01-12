<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SpendingNoti;
use App\Models\User;
use App\Models\Spending;
use App\Models\Wallet;
use Illuminate\Support\Carbon;

class AutoSpendingNoti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SpendingNoti';

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
                $results = Wallet::where("owner", $user->id)->with('spendings', function ($query) {
                    $query->with('spendingType')->where('created_at', ">=", Carbon::today());
                    // $query->get();
                })->get();
                // $results = Wallet::where("owner", $user->id)->with('spendings')->get();
                Mail::to($user)->send(new SpendingNoti($user, $results));
            }
        }
  
        return 0;
    }
}

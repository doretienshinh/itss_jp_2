<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class spendingNoti extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $results)
    {
        $this->user = $user; 
        $this->results = $results;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        $today = Carbon::now()->toDateTimeString();

        return $this->subject('Thống kê thu chi ngày hôm nay ('.  $today . ') - '. $this->user->name)
                    ->view('mails.MailSpendingListDaily', [
                        "user" => $this->user,
                        "results" => $this->results
                    ]);
    }
}

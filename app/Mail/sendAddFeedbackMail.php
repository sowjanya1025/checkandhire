<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendAddFeedbackMail extends Mailable
{
    use Queueable, SerializesModels;
    public $ids;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A feedback on you, please check')->view('web.mail.add_feedback');
         
    }
}
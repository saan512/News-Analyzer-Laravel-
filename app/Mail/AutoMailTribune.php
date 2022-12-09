<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutoMailTribune extends Mailable
{
    use Queueable, SerializesModels;
    public $tribune_all;
    public $tribune_all_negative;
    public $tribune_all_positive;
    public $tribune_all_neutral;
    public $tribuneU_all;
    public $tribuneU_all_negative;
    public $tribuneU_all_neutral;
    public $tribuneU_all_positive;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tribune_all,$tribune_all_negative, $tribune_all_positive, $tribune_all_neutral, $tribuneU_all,$tribuneU_all_negative, $tribuneU_all_neutral, $tribuneU_all_positive)
    {
        $this->tribune_all = $tribune_all;
        $this->tribune_all_negative = $tribune_all_negative;
        $this->tribune_all_positive = $tribune_all_positive;
        $this->tribune_all_neutral = $tribune_all_neutral;
        $this->tribuneU_all = $tribuneU_all;
        $this->tribuneU_all_negative = $tribuneU_all_negative;
        $this->tribuneU_all_neutral = $tribuneU_all_neutral;
        $this->tribuneU_all_positive = $tribuneU_all_positive;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('News Analyzer Daily Report, Tribune')
                    ->view('emails.AutoMailTribune')->with([
                        'tribune_all' => $this->tribune_all,
                        'tribune_all_negative' => $this->tribune_all_negative,
                        'tribune_all_positive' => $this->tribune_all_positive,
                        'tribune_all_neutral' => $this->tribune_all_neutral,
                        'tribuneU_all' => $this->tribuneU_all,
                        'tribuneU_all_negative' => $this->tribuneU_all_negative,
                        'tribuneU_all_neutral' => $this->tribuneU_all_neutral,
                        'tribuneU_all_positive' => $this->tribuneU_all_positive,
                    ]);
    }
}

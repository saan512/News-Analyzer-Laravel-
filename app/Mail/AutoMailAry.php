<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutoMailAry extends Mailable
{
    use Queueable, SerializesModels;
    public $ary_all;
    public $ary_all_negative;
    public $ary_all_neutral;
    public $ary_all_positive;
    public $aryu_all;
    public $aryu_all_negative;
    public $aryu_all_neutral;
    public $aryu_all_positive;

    /**
     * Create a new message instance.
     * 
     *
     * @return void
     */
    public function __construct($ary_all,$ary_all_negative, $ary_all_neutral, $ary_all_positive, $aryu_all,$aryu_all_negative, $aryu_all_neutral, $aryu_all_positive)
    {
        $this->ary_all = $ary_all;
        $this->ary_all_negative = $ary_all_negative;
        $this->ary_all_neutral = $ary_all_neutral;
        $this->ary_all_positive = $ary_all_positive;
        $this->aryu_all = $aryu_all;
        $this->aryu_all_negative = $aryu_all_negative;
        $this->aryu_all_neutral = $aryu_all_neutral;
        $this->aryu_all_positive = $aryu_all_positive;

        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('News Analyzer Daily Report, Ary News')
                    ->view('emails.AutoMailAry')->with([
                        'ary_all' => $this->ary_all,
                        'ary_all_negative' => $this->ary_all_negative,
                        'ary_all_neutral' => $this->ary_all_neutral,
                        'ary_all_positive' => $this->ary_all_positive,
                        'aryu_all' => $this->aryu_all,
                        'aryu_all_negative' => $this->aryu_all_negative,
                        'aryu_all_neutral' => $this->aryu_all_neutral,
                        'aryu_all_positive' => $this->aryu_all_positive,
                    ]);
    }
}

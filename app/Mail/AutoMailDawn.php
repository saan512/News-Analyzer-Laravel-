<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutoMailDawn extends Mailable
{
    use Queueable, SerializesModels;

   
    public $dawnu_all_positive;
    public $dawnu_all_negative;
    public $dawnu_all_neutral;
    public $dawnu_all;
    public $dawn_all;
    public $dawn_all_neutral;
    public $dawn_all_negative;
    public $dawn_all_positive;
    public $dawn_users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dawnu_all_positive, $dawnu_all_negative, $dawnu_all_neutral, $dawnu_all , $dawn_all , $dawn_all_neutral, $dawn_all_negative, $dawn_all_positive, $dawn_users)
    {
        //
        $this->all_dawnu_p = $dawnu_all_positive;
        $this->all_dawnu_n = $dawnu_all_negative;
        $this->all_dawnu_neu = $dawnu_all_neutral;
        $this->all_dawnu = $dawnu_all;
        $this->all_dawn = $dawn_all;
        $this->all_dawn_neu = $dawn_all_neutral;
        $this->all_dawn_n = $dawn_all_negative;
        $this->all_dawn_p = $dawn_all_positive;
        $this->dawn_users = $dawn_users;        
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
           
            return $this->subject('News Analyzer Daily Report, Dawn News')
                        ->view('emails.AutoMailDawn')->with([
                            'all_dawn' => $this->all_dawn,
                            'all_dawn_p' => $this->all_dawn_p,
                            'all_dawn_n' => $this->all_dawn_n,
                            'all_dawn_neu' => $this->all_dawn_neu,
                            'all_dawnu' => $this->all_dawnu,
                            'all_dawnu_p' => $this->all_dawnu_p,
                            'all_dawnu_n' => $this->all_dawnu_n,
                            'all_dawnu_neu' => $this->all_dawnu_neu,
                            'dawn_users' => $this->dawn_users,
                            
                        ]);
                
    }
}

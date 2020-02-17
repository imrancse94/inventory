<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $data;
    public $subject;
    public $from;
    public $attachment;
    public $template;


    public function __construct($data, $subject,$from, $attachment, $template)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->from = $from;
        $this->attachment = $attachment;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(!empty($this->attachment)){
         return $this->subject($this->subject)
                    ->from($this->from)
                    ->attach($this->attachment)
                    ->markdown('email.'.$this->template)
                    ->with(['data' => $this->data]);
        }else{
          
           return $this->subject($this->subject)
                    ->from($this->from)
                    ->markdown('email.'.$this->template)
                    ->with(['data' => $this->data]); 
        }
        
        
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KiFound extends Mailable
{
    use Queueable, SerializesModels;
    public $total = 30;
    public $title ='';
    public $text ='';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $text)
    {
        $this->setTitle($title);
        $this->setText($text);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'pichyn7@gmail.com';
        $name = 'Кафедра комп\'ютерної інженерії';
        $subject = 'Інформація для абітурієнтів';

        return $this->view('emails.ki-found')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }

    private function setTitle($title)
    {
        $this->title = $title;
    }

    private function setText($text)
    {
        $this->text = $text;
    }
}

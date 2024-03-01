<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    // ->to('med.developer00@gmail.com')
                    // ->from($this->data['email'])
                    ->subject('Goal.ma - ' . $this->data['subject'])
                    ->view('mail.contact', [
                        'nom_complet' => $this->data['nom_complet'],
                        'email' => $this->data['email'],
                        'subject' => $this->data['subject'],
                        'telephone' => $this->data['telephone'],
                        'body' => $this->data['body'],
                    ]);

                    // return $this
                    
                    // ->subject($this->subject)
                    // ->view('email.contact', $data);
    }
}

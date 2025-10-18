<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data; // Pass the contact form data
    }

    /**
     * Build the message.
     */
    public function build()
    {
        /*return $this
            ->from($this->data['email']) // Dynamically set sender email and name
            ->subject('New Contact Form Submission') // Email subject
            ->view('frontend.emails.contact-form') // Email view file
            ->with('data', $this->data); // Pass data to the view
        */
        return $this->from('razibdeveloper634@gmail.com', 'Tairot') // Use your authenticated email here
                ->replyTo($this->data['email'], $this->data['first_name']) // Add Reply-To header
                ->to($this->data['email'])
                ->subject($this->data['subject'])
                ->view('frontend.emails.contact-form')
                ->with('data', $this->data);
    }
}

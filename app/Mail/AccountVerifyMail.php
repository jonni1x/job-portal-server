<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $id;
    /**
     * Create a new message instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Account Verify Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function build() {
        return $this->from("jonzylfiu5@gmail.com", 'Verify Your Account!')
                ->subject($this->email)
                ->view("mail.accountverify")->with('email', $this->email);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

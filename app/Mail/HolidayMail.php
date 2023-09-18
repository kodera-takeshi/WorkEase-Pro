<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HolidayMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($param)
    {
        $this->mail_name = $param['name'];
        $this->mail_from = $param['from'];
        $this->mail_to = $param['to'];
        $this->mail_cc = $param['cc'];
        $this->mail_bcc = $param['bcc'];
        $this->mail_date = $param['date'];
        $this->mail_time = $param['time'];
        $this->mail_reason = $param['reason'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $contents = [
            'name' => $this->mail_name,
            'date' => $this->mail_date,
            'time' => $this->mail_time,
            'reason' => $this->mail_reason
        ];

        return $this->from($this->mail_from)
            ->to( $this->mail_to)
            ->cc( $this->mail_cc)
            ->bcc( $this->mail_bcc)
            ->subject('【有給休暇申請】' . $this->mail_date . 'の勤務について')
            ->view('user.mail.holiday')
            ->with($contents);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Holiday Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
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

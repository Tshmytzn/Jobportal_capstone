<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use SerializesModels;

    /**
     * The data for the email.
     *
     * @var string
     */
    public $content;

    /**
     * Create a new message instance.
     *
     * @param string $content
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mails.test') // The view for the email body
                    ->with([
                        'content' => $this->content, // Pass dynamic content
                    ])
                    ->subject('Test Email from Laravel')
                    ->from('kailahleyva02@gmail.com', 'Peso Job Portal');
    }
}

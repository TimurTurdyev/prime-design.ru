<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmit extends Mailable
{
    use Queueable, SerializesModels;

    private $formData;

    /**
     * Create a new message instance.
     * @param $formData
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.form_submit' )->with('formData', $this->formData);
    }
}

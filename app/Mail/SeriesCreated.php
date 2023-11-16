<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    public string $nomeSerie = '';
    public string $qntSeasons = '';
    public int $episodiosPorTemporada = 0;
    public int $id = 0;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $nomeSerie,
        $qntSeasons,
        $episodiosPorTemporada,
        $id
    )
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.series-created');
    }
}

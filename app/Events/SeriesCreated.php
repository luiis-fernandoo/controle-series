<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $serieNome = '';
    public int $serieId = 0;
    public int $serieSeasonsQnt = 0;
    public int $serieEpisodesPerSeason = 0;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        $serieNome,
        $serieId,
        $serieSeasonsQnt,
        $serieEpisodesPerSeason
    )
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php

namespace App\Events;

use App\Models\Kendaraan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class KendaraanUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $kendaraan;

    // Constructor
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;

        // Log informasi saat event KendaraanUpdated dibuat
        Log::info('KendaraanUpdated event dibuat', [
            'kendaraan_id' => $kendaraan->id,
            'status' => $kendaraan->status,
            'updated_at' => $kendaraan->updated_at->format('Y-m-d H:i:s'),
        ]);
    }

    // Broadcast channel
    public function broadcastOn()
    {
        // Log channel yang digunakan untuk broadcasting
        Log::info('Broadcasting ke channel kendaraan.' . $this->kendaraan->id);

        return new Channel('kendaraan.' . $this->kendaraan->id);
    }

    // Data yang akan dibroadcast
    public function broadcastWith()
    {
        // Log data yang akan dikirimkan saat broadcast
        Log::info('Data yang akan dibroadcast', [
            'id' => $this->kendaraan->id,
            'status' => $this->kendaraan->status,
            'updated_at' => $this->kendaraan->updated_at->format('Y-m-d H:i:s'),
        ]);

        return [
            'id' => $this->kendaraan->id,
            'status' => $this->kendaraan->status,
            'updated_at' => $this->kendaraan->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    // Nama event untuk broadcast
    public function broadcastAs()
    {
        return 'KendaraanUpdated';
    }
}
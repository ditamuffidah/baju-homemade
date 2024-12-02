<?php

namespace App\Notifications;

use App\Models\Pemesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PesananSelesaiNotification extends Notification
{
    use Queueable;

    protected $pemesanan;

    /**
     * Create a new notification instance.
     *
     * @param Pemesanan $pemesanan
     * @return void
     */
    public function __construct(Pemesanan $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        // Pilihan kanal notifikasi, bisa email, database, atau broadcast
        return ['database', 'mail'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Pesanan Anda dengan nomor ID' . $this->pemesanan->id . ' telah selesai.',
            'pemesanan_id' => $this->pemesanan->id,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pesanan Anda Telah Selesai')
                    ->line('Pesanan Anda dengan nomor ID ' . $this->pemesanan->id . ' telah selesai.')
                    ->action('Lihat Pesanan', route('pemesanan.show', $this->pemesanan->id))
                    ->line('Terima kasih telah menggunakan layanan kami');
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\BroadcastMessage
     */
    public function toBroadCast($notifiable)
    {
        return new BroadcastMessage([
            'message' => 'Pesanan Anda dengan nomor ID' . $this->pemesanan->id . ' telah selesai.',
        ]);
    }
}

<?php

namespace App\Console\Commands;

use DateTimeZone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
use Twilio\Rest\Client;
use App\Models\data_peminjaman;

require 'autoload.php';

class SendWhatsappMessages extends Command
{
    protected $signature = 'send:whatsapp-messages';
    protected $description = 'Send WhatsApp messages based on schedule from database';

    public function handle()
    {
        // Ambil jadwal pengiriman pesan WhatsApp dari database
        $schedules = data_peminjaman::all();
        
        $tz = 'Asia/Jakarta';
        $current_date = new DateTime("now", new DateTimeZone($tz));
        $waktu = $current_date->format('H:i:s');
        $tanggal = $current_date->format('Y-m-d');
        
        foreach($schedules as $x){
            // return $x->tanggalpinjam;
            if($x->tanggalpinjam == $tanggal){
                $jadwal = strtotime($x->waktuawalpinjam);
                $now = strtotime($current_date);
 
                $diff  = $jadwal - $now;

                $jam   = floor($diff / (60 * 60));
                $menit = $diff - ( $jam * (60 * 60) );

                // return $jam;

                if($jam == 1){
                    // Twilio account SID and auth token
                    $sid = 'ACab827cf905cc8965f02840b5447e8639';
                    $token = '7ff480e191d4e00148300872a87113ca';
                    $client = new Client($sid, $token);

                    // WhatsApp Sandbox sender number
                    $sender = 'whatsapp:+14155238886';

                    // Your phone number registered on WhatsApp
                    $recipient = 'whatsapp:+6281214300906';

                    // The message you want to send
                    $message = 'Nama peminjam :  '.$x->namapeminjam.' , Jam pinjam : '.$x->waktuawalpinjam.' - '.$x->waktuakhirpinjam;

                    // return $message;

                    // Send the message
                    $message = $client->messages->create(
                        $recipient,
                        array(
                            'from' => $sender,
                            'body' => $message
                        )
                    );

                    echo "Message SID: " . $message->sid;
                }
            }
            
        }
        
    }
}

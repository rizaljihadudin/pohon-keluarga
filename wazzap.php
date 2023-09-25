<?php

// README
// ======
//
// Ini adalah contoh aplikasi Instant Messaging sederhana, sebut saja WazzApp.
// Di setiap skenario telah dituliskan komentar untuk membantu Anda memahami kebutuhan fungsional yang harus diimplementasi.
//
// Misi Anda adalah melengkapi potongan kode yang disediakan sehingga aplikasi dapat berjalan sesuai kebutuhan.
//
// OUTPUT YANG DIHARAPKAN:
//
// Anton bergabung ke semua channel
// Budi bergabung ke channel Anak Gaul
// Jumlah anggota Anak Gaul: 2
// Jumlah anggota Anak Alay: 1
//
// Anton:Selamat datang Budi
// Budi:Terima kasih sudah diundang kemari
// Anton:No problemo
//
// List channel terurut abjad:
// Anak Alay
// Anak Gaul
// Flat Earth
//
// List channel terurut jumlah anggota:
// Anak Gaul(2)
// Anak Alay(1)
// Flat Earth(1)
//
// Daftar channel dimana Anton terdaftar:
// Anak Alay
// Anak Gaul
// Flat Earth
//
// Daftar channel dimana Budi terdaftar:
// Anak Gaul
//
// Citra bergabung ke WazzApp
// Citra mencari channel yang mengandung kata "Anak" dan bergabung ke channel yang muncul di hasil pencarian
// Anak Gaul
// Anak Alay
//
// Daftar anggota channel Gaul:
// Anton
// Budi
// Citra

$app = new WazzApp();
$app->run();

class WazzApp
{
    public function run()
    {
        // Anton dan Budi bergabung ke WazzApp
        $anton = new Person('Anton');
        $budi = new Person('Budi');

        // Channel yang tersedia saat ini ada 3
        $channelGaul = Channel::create('Anak Gaul');
        $channelAlay = Channel::create('Anak Alay');
        $channelFlatEarth = Channel::create('Flat Earth');

        debug('Anton bergabung ke semua channel');
        $anton->joinChannel($channelAlay);
        $anton->joinChannel($channelGaul);
        $anton->joinChannel($channelFlatEarth);

        debug('Budi bergabung ke channel Anak Gaul');
        $budi->joinChannel($channelGaul);

        // Secara tidak sengaja, Budi join lagi ke channel Anak Gaul.
        // Karena sebelumnya sudah join, maka tidak ada efek samping yang ditimbulkan.
        // Jumlah anggota channel Gaul tetap 2
        $budi->joinChannel($channelGaul);

        // Jumlah anggota channel Anak Gaul = 2, sedangkan channel Anak Alay = 1
        debug('Jumlah anggota Anak Gaul: ' . $channelGaul->getMemberCount());
        debug('Jumlah anggota Anak Alay: ' . $channelAlay->getMemberCount());

        debug('');

        // Anton dan Budi saling bertukar pesan di channel Gaul

        // Anton mengirim pesan
        $channelGaul->addMessage(new Message($anton, 'Selamat datang Budi'));
        // Budi membalas
        $channelGaul->addMessage(new Message($budi, 'Terima kasih sudah diundang kemari'));
        // Anton membalas lagi
        $channelGaul->addMessage(new Message($anton, 'No problemo'));


        // Tampilkan pesan dalam urutan pesan baru ada di bawah
        foreach ($channelGaul->getMessages() as $message) {
            debug($message);
        }

        debug('');

        // Tampilkan semua channel secara alfabetis
        debug('List channel terurut abjad:');
        foreach (Channel::getListByName() as $availableChannel) {
            debug($availableChannel->getName());
        }

        debug('');

        debug('List channel terurut jumlah anggota:');
        foreach (Channel::getListByMemberCount() as $availableChannel) {
            debug($availableChannel->getName() . "(" . $availableChannel->getMemberCount() . ")");
        }

        debug('');

        debug('Daftar channel dimana Anton terdaftar:');
        foreach ($anton->getChannels() as $channel) {
            debug($channel->getName());
        }

        debug('');

        debug('Daftar channel dimana Budi terdaftar:');
        foreach ($budi->getChannels() as $channel) {
            debug($channel->getName());
        }

        debug('');

        debug('Citra bergabung ke WazzApp');
        $citra = new Person('Citra');

        debug('Citra mencari channel yang mengandung kata "Anak" dan bergabung ke channel yang muncul di hasil pencarian');
        $channelAnak = Channel::search('anak');
        foreach ($channelAnak as $channel) {
            debug($channel->getName());
            $citra->joinChannel($channel);
        }

        debug('');

        debug('Daftar anggota channel Gaul:');
        foreach($channelGaul->getMembers() as $member)
        {
            debug($member->getName());
        }
    }
}

class Message
{
    // <YOUR CODE HERE>
    private $nama;
    private $pesan;

    public function __construct($nama, $pesan)
    {
        $this->nama = $nama;
        $this->pesan = $pesan;
    }

}

class Person
{
    // <YOUR CODE HERE>
    public $name;
    public $channel; 

    public function __construct($nama)
    {
        $this->name = $nama;
    }
   
    function joinChannel($channel){
        $this->channel = $channel;
    }

    function getChannels(){
        return $this->channel;
    }
}

class Channel
{
    // <YOUR CODE HERE>
    var $namaChannel;
    var $pesan;

    function create($namaChannel){
        return $this->namaChannel = $namaChannel;
    }

    function addMessage($pesan)
    {
        return $this->pesan = $pesan;
    }

    function getMessages()
    {
        $data = array();
        array_push($data, $this->pesan);
        return $data;
    }
}

function debug($string)
{
    $separator = (php_sapi_name() == 'cli') ? "\n" : "<br>";
    echo $string . $separator;
}
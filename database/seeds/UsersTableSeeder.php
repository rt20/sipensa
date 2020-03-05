<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Superman',
            'nip' => '0000',
            'jabatan' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'roles' => '["ADMIN"]'
     ]);
     
     App\User::create([
            'name' => 'Ema Setyawati, S.Si, Apt, ME',
            'nip' => '196901071996032001',
            'jabatan' => 'Direktur Pengawasan Pangan Risiko Rendah dan Sedang',
            'no_hp' => '08128058030',
            'email' => 'ema_setyawati@yahoo.com',
            'password' => bcrypt('password'),
            'roles' => '["DIREKTUR"]'
     ]);
     
     App\User::create([
            'name' => 'Neni Yuliza, S.Si, Apt',
            'nip' => '197207201999032001',
            'jabatan' => 'Kasubdit Inspeksi Ekspor Impor dan Iklan Pangan',
            'no_hp' => '081210459907',
            'email' => 'neniyulizanazar@gmail.com',
            'password' => bcrypt('password'),
            'roles' => '["SUBDIT"]'
     ]);     

     App\User::create([
       'name' => 'Sondang Widya Estikasari, S.Si, Apt, MKM',
       'nip' => '197909042003122002',
       'jabatan' => 'Kasubdit Inspeksi Pangan Risiko Sedang dan Bahan Tambahan Pangan',
       'email' => 'sondangwe@yahoo.com',
       'password' => bcrypt('password'),
       'roles' => '["SUBDIT"]'
       ]);
       App\User::create([
              'name' => 'Dina Mariana, S.Si, Apt, MP',
              'nip' => '197812062005012001',
              'jabatan' => 'Kasubdit Inspeksi Ekspor Impor dan Iklan Pangan',
              'email' => 'dinas_ffua@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Galih Prima Arumsari, S.Farm, Apt, MKM',
              'nip' => '198112222006042004',
              'jabatan' => 'Kepala Seksi Inspeksi Produksi dan Peredaran Pangan Risiko Sedang',
              'email' => 'galihprimaarumsari@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);     
       App\User::create([
              'name' => 'Shanty Sarah, S.Si, Apt',
              'nip' => '198112132009122001',
              'jabatan' => 'Kepala Seksi Inspeksi Produksi dan Peredaran BTP',
              'email' => 'shanty_sarah@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Ratminah, S.Si, Apt, MP',
              'nip' => '196404271997032001',
              'jabatan' => 'Kepala Seksi Inspeksi Peredaran Pangan Risiko Rendah',
              'email' => 'kasi_peredaran_rr@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Aritia, S.Si, Apt',
              'nip' => '198202132006042003',
              'jabatan' => 'Kepala Seksi Produksi Pangan Risiko Rendah',
              'email' => 'kasi_produksi_rr@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Betty Noegraha Ardi, ST, M.Sc',
              'nip' => '197903162005012001',
              'jabatan' => 'Kepala Seksi Inspeksi Pangan Ekspor dan Impor',
              'email' => 'mathilda_betty@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Duma Lieity Sitorus, S.Farm, Apt',
              'nip' => '198007252005012001',
              'jabatan' => 'Kepala Seksi Inspeksi Iklan Pangan',
              'email' => 'kasi_iklanpangan@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);     
       App\User::create([
              'name' => 'Fatati,S.Farm.,Apt',
              'nip' => '198512112010122002',
              'jabatan' => 'PFM Muda',
              'email' => 'phat_fat_ti@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);     
       App\User::create([
              'name' => 'Ronald P.Sibarani,Drs,Apt',
              'nip' => '196704201996031001',
              'jabatan' => 'PFM Muda',
              'email' => 'ronaldpsbrn@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);     
       App\User::create([
              'name' => 'Maya Kurniawati, STP,Msi',
              'nip' => '198405252007122001',
              'jabatan' => 'PFM Muda',
              'email' => 'maya.bpom@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);
       App\User::create([
              'name' => 'Reni Erlina,S.Farm,Apt',
              'nip' => '198405092007122001',
              'jabatan' => 'PFM Muda',
              'no_hp' => '085228771550',
              'email' => 'reni_erl@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Eka Seva Ermawati, S.Farm, Apt',
              'nip' => '198609162010122007',
              'jabatan' => 'PFM Muda',
              'no_hp' => '081329208893',
              'email' => 'ekacepa16@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Spica Arumning Ardhi Gusti, S.farm, Apt',
              'nip' => '199004192012122001',
              'jabatan' => 'PFM Muda',
              'no_hp' => '085217582009',
              'email' => 'spica.arumning@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Erni Rahmawati,S. TP',
              'nip' => '198204042005012002',
              'jabatan' => 'PFM Muda',
              'no_hp' => '082113213446',
              'email' => 'ernirahma0404@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Ishma Alia,S.Farm,Apt',
              'nip' => '199008302015022002',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '085642598000',
              'email' => 'ishmaalia@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Maresta Anindyani,S.Farm,Apt',
              'nip' => '198903082015022002',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '085694339949',
              'email' => 'maresta.anindyani@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Patria Ardhi Nugraha,S.Farm,Apt',
              'nip' => '199102142015021001',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '085279216123',
              'email' => 'patria.ardhi@pom.go.id',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Mulia Ade Karina, S.Farm, Apt',
              'nip' => '199102262015022002',
              'jabatan' => 'PFM Muda',
              'no_hp' => '085692078305',
              'email' => 'adekarinaemail@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Lucia Endar Puspitaningrum,S.Farm,Apt',
              'nip' => '198411072015022001',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '085780424600',
              'email' => 'lucialuciluce1107@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'A.Dadang Hermawan Rasyid, S.Farm, Apt',
              'nip' => '198610032014021002',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '08995081861',
              'email' => 'adit_apoteker@yahoo.co.id',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Wahyu Atmaja Kharisma Jati,S.Farm,Apt',
              'nip' => '198802242015022001',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '085215927161',
              'email' => 'aku_atma@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Jerry Voldo Febian Manurung,S.Farm,Apt',
              'nip' => '198411172015021002',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '081212553149',
              'email' => 'jerry.voldo@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Putri Mahatma Sari,S.T.P',
              'nip' => '199002022015022005',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '08562689189',
              'email' => 'putri.mahatma2@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Fitry Fatima,S.Si Apt',
              'nip' => '198207172007122001',
              'jabatan' => 'PFM Muda',
              'no_hp' => '083870534899',
              'email' => 'pitik_ok@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Hidayati Hasanah, ST',
              'nip' => '198112212007122001',
              'jabatan' => 'PFM Pertama',
              'no_hp' => '081210099530',
              'email' => 'hidayati.hasanah97@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Arif Widakdo, A,Md.',
              'nip' => '198504072007121001',
              'jabatan' => 'Pranata Komputer Pelaksana',
              'no_hp' => '081317031269',
              'email' => 'widakdo.arif@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Eko Wahyudi, A.Md',
              'nip' => '197911192007121001',
              'jabatan' => 'Pranata Komputer Pelaksana',
              'no_hp' => '081586942942',
              'email' => 'wahyudie68@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);   
       App\User::create([
              'name' => 'Jumirah',
              'nip' => '196811011992032002',
              'jabatan' => 'Arsiparis Pelaksana Lanjutan',
              'no_hp' => '081293634580',
              'email' => 'miralestari97@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]);            
       
       App\User::create([
              'name' => 'Kristiani Dwi Kusumastuti, S.Sos',
              'nip' => '196512221986032001',
              'jabatan' => 'PFM Muda',
              'no_hp' => '081310145356',
              'email' => 'dwin_des@yahoo.com',
              'password' => bcrypt('password'),
              'roles' => '["SUBDIT"]'
       ]);   
       App\User::create([
              'name' => 'Hilman Harsoni,A.Md',
              'nip' => '199108222015021002',
              'jabatan' => 'Pranata Komputer Pelaksana',
              'no_hp' => '085712915144',
              'email' => 'hharsoni@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["ADMIN"]'
       ]);  

       App\User::create([
              'name' => 'Nabila Sabrina Silvani S.T.P',
              'nip' => '199510102019032004',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '0813-8339-7014',
              'email' => 'nabilasabrinasilvani@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Arum Trileona S.Farm., Apt.',
              'nip' => '199507232019032006',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '0812-7674-9791',
              'email' => 'arumtrileona@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Shifa Amalia S.T.P',
              'nip' => '199706042019032001',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '083896760744',
              'email' => 'shifamalia0406@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Gavin Hutama Farandiarta S.Si',
              'nip' => '199601182019031001',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '081213378196',
              'email' => 'gavin.brighton@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Anis Khoirunisa S.Farm., Apt.',
              'nip' => '199307222019032006',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '085721007808',
              'email' => 'aniskhoirunisa22@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Hanna Felina Monalisa Silalahi S.T.P',
              'nip' => '199702162019032005',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '082112530283',
              'email' => 'hannafelina16@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Gusti Made Aryandana Sasmita S.Farm, Apt',
              'nip' => '199404272019031001',
              'jabatan' => 'Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan',
              'no_hp' => '0895343340813',
              'email' => 'aryandanasasmita@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Trisna Priyadi S.T',
              'nip' => '199304222019031002',
              'jabatan' => 'Analis Data dan Informasi ',
              'no_hp' => '0856-2037-790',
              'email' => 'tr.priyadi@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       App\User::create([
              'name' => 'Yudi Guntara S.E',
              'nip' => '199204262019031003',
              'jabatan' => 'Analis Perencana',
              'no_hp' => '085777793400',
              'email' => 'yudiguntara2604@gmail.com',
              'password' => bcrypt('password'),
              'roles' => '["STAF"]'
       ]); 
       
    }
}

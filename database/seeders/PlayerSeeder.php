<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use Faker\Factory;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        Schema::disableForeignKeyConstraints();
        Player::truncate();
        Schema::enableForeignKeyConstraints();

        $playerPhoto = [
            "https://images2.gazzettaobjects.it/assets-mc/calcio/giocatori/cristiano_ronaldo_dos_santos_aveiro_05021985.png",
            "https://static.fanpage.it/wp-content/uploads/sites/27/2022/10/messi-ritorno-barcellona-2023-1200x675.jpg",
            "https://intermilan.bynder.com/m/44f1b949729d5f37/webimage-Lautaro_scheda.png",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiCND3NmOF7cilPOffcdgZwddA85zTtwFp8lNW4RyJTg&s",
            "https://tmssl.akamaized.net/images/foto/galerie/diego-maradona-1401100569-36.jpg?lm=1483605486",
            "https://citynews-genovatoday.stgy.ovh/~media/original-hi/20389037219188/samp-garrone-ridacci-pazzini.jpg",
            "https://www.ilmattino.it/photos/MED_HIGH/39/57/6953957_27184858_cassano1.jpg",
            "https://www.socialmediasoccer.com/fileadmin/_processed_/f/e/csm_germany-v-latvia-international-friendly_ae02b8d08b.jpg",
            "https://www.calciospezia.it/wp-content/uploads/2021/11/Federico-Chiesa.jpg",
            "https://media.gqitalia.it/photos/62dfb0992dc4bd9c582de9f6/16:9/w_2560%2Cc_limit/GettyImages-1402950323.jpg",
            "https://www.sisal.it/content/dam/new-dam/italy/canali/sisal-it/scommesse/blog/2022/07/soprannomi-calciatori.jpg",
            "https://images.agi.it/pictures/agi/agi/2019/07/19/170716926-6cec4389-72e1-402e-84bb-48518f4fda6f.jpg",
            "https://www.calcioefinanza.it/wp-content/uploads/2019/04/dybala-mask-1-681x454-681x454.jpg",
            "https://img.iltempo.it/images/2021/10/13/182414264-d1298994-5e86-45ac-a612-9773be44d849.jpg",
            "https://www.socialmediasoccer.com/fileadmin/_processed_/0/d/csm_vfl-wolfsburg-v-borussia-dortmund-bundesliga_b6f5cd5a53.jpg",
            "https://www.rivistaundici.com/wp-content/uploads/2022/07/GettyImages-1408473762-e1658740232115.jpg?x26866",
            "https://quifinanza.it/wp-content/uploads/sites/5/2021/06/Bale.jpg?w=786&strip=all&quality=90",
            "https://www.corriere.it/methode_image/2022/10/07/Sport/Foto%20Sport%20-%20Trattate/1430801812-kjDC-U319010458290766FF-593x443@Corriere-Web-Sezioni.jpg",
            "https://cdn.areanapoli.it/immagini/notizie/big/s/simeone_napoli_6.jpg",
            "https://www.ilnapolista.it/wp-content/uploads/2022/07/Kvaratskhelia_MG0_6573.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqZktbqvFdj66zWOvLRbcEYZ8RzcTsjeQDrA&usqp=CAU",
            "https://www.calcioefinanza.it/wp-content/uploads/2021/11/mini_uc-sampdoria-v-ssc-napoli-serie-a.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjlV2CmkbSnJ8SQ2O-N0WMGEtAq7mZl_Grxg&usqp=CAU",
            "https://media.gqitalia.it/photos/6136207693a6309ea9a00953/master/w_1600%2Cc_limit/Neymar%2520ok.jpg",
            "https://www.repstatic.it/content/nazionale/img/2022/01/11/213359591-6e46ac1e-4c0a-4fe0-baea-e72a74ca523e.jpg",
            "https://gdsit.cdn-immedia.net/2022/10/Amauri-2.jpg",
            "https://tmw-storage.tcccdn.com/storage/tuttomercatoweb.com/img_notizie/thumb3/43/43aaf88b65791811359e4556a7625c87-48808-oooz0000.jpeg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIDdG3p4tlNl8D6Mfih_FLd6byHvEcnkpv5jcgeMDe22hLVRhFeHyK3VKnNTWlADvzM_c&usqp=CAU",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpMlKjCuY-6c4t5sq_AT-xtEY6uKsd3XIbzimMu54cLY1gMYw9Ig84PBYGGg-HPDP_eiU&usqp=CAU",
            "https://betting.cdnppb.net/betfair-news/alessandro_impronti/giocatori-italiani-+-pagati.728x437.jpg",
            "https://media.kickest.it/2023/01/01155055/uc-sampdoria-v-us-lecce-serie-a1.jpg",
            "https://dilei.it/wp-content/uploads/sites/3/2022/11/Mondiali-2022-i-calciatori-piu-belli-Alvaro-Morata.jpg",
            "https://www.calcioweb.eu/wp-content/uploads/2020/04/Aleesami-1024x682.jpg",
            "https://upload.wikimedia.org/wikipedia/it/thumb/1/1d/Francesco_Totti_-_AS_Roma_1998-99.jpg/1200px-Francesco_Totti_-_AS_Roma_1998-99.jpg",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHnPm75lKZpbLuYq_2kc8RLUL9upfG7VdVTvG2k1tJgLHWk-6Q9Cg8zziVh9pTAM3oeio&usqp=CAU",
            "https://cdn.tuttosport.com/img/990/495/2022/09/16/082607647-10cd0386-9496-48ab-9cca-e1b313577896.jpg",
            "https://images2.minutemediacdn.com/image/upload/c_crop,w_4025,h_2264,x_0,y_132/c_fill,w_720,ar_16:9,f_auto,q_auto,g_auto/images/GettyImages/mmsport/90min_it_international_web/01gq7xe9t8d8cszkjvtb.jpg",
            "https://www.minutidirecupero.it/wp-content/uploads/2021/05/de-vrij.jpeg",
            "https://static.open.online/wp-content/uploads/2023/01/sla-calcio-sostanze.jpg",
            "https://media-assets.vanityfair.it/photos/63ea4c16906a459d6ddf0409/16:9/w_2560%2Cc_limit/IPA_IPA22256195.jpg",
            "https://www.mywhere.it/wp-content/uploads//2020/11/Hidetoshi_Nakata_-_Perugia_1998-1999-1-704x1024-701x439.jpg",
            "https://www.deabyday.tv/.imaging/mte/deabyday/585x700/dam/redazione/antoine-griezmann-2.jpg/jcr:content/antoine-griezmann-2.jpg",
            "https://foto.sportal.it/2023-09/i-calciatori-laureati-pi-famosi-top-15-in-foto_1193654Photogallery.jpg",


        ];

        $descriptions = [
            "Sono un calciatore amatoriale molto abile tecnicamente, dotato di una grande abilità nel controllo di palla e nei dribbling.",
            "Sono un giocatore molto veloce e agile, capace di superare gli avversari e creare spazi in campo.",
            "Ho una grande precisione nei passaggi e nelle conclusioni a rete, sfruttando al meglio ogni occasione.",
            "Sono un giocatore molto tattico, in grado di leggere il gioco e di trovare le soluzioni migliori in ogni situazione.",
            "Ho un ottimo senso della posizione in campo, che mi permette di essere sempre pronto ad anticipare gli avversari.",
            "Sono molto abile nel gioco aereo, sia in difesa che in attacco, grazie alla mia buona altezza e al salto.",
            "Ho una grande resistenza fisica, che mi permette di giocare per tutta la partita senza perdere energia.",
            "Sono molto attento alla fase difensiva, e mi piace collaborare con i compagni di squadra per proteggere la porta.",
            "Sono un buon marcatore, capace di limitare l'azione degli avversari e di contrastarne le giocate.",
            "Sono un giocatore molto leale e rispettoso delle regole del gioco, e mi piace giocare sempre in modo leale e corretto."
        ];
        shuffle($descriptions);

        foreach (User::all() as $user) {


            $new_player = new Player();
            $index = array_rand($playerPhoto);
            $new_player->profile_photo = $playerPhoto[$index];
            $new_player->phone_number =  '+39 ' . $faker->unique()->regexify('3[0-9]{8}');
            $index = rand(0, count($descriptions) - 1);
            $new_player->description = $descriptions[$index];
            $new_player->birth_date = $faker->dateTimeBetween('-30 years', '-18 years');
            $new_player->city = $faker->state();
            $new_player->user_id = $user->id;
            $new_player->save();
        }
    }
}

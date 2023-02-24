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

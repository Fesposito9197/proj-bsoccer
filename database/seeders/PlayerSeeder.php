<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

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

        $descriptions = [
            'Sono un calciatore amatoriale con una grande passione per lo sport e una grande voglia di divertirmi con i miei compagni di squadra. Sono un giocatore molto fisico e resistente, che ama lottare per ogni pallone e che non si arrende mai. Sono anche molto preciso nei passaggi e nelle conclusioni a rete, e cerco sempre di sfruttare al meglio le occasioni che mi vengono presentate.',

            'Sono un calciatore amatoriale con una buona tecnica individuale, che mi consente di controllare bene la palla e di effettuare dribbling precisi. Sono molto veloce e abile nei contrasti, e cerco sempre di superare gli avversari per creare spazi per me e per i miei compagni di squadra. Sono anche molto tattico, e mi piace leggere il gioco per trovare le soluzioni migliori in ogni situazione.',

            'Sono un calciatore amatoriale molto abile tecnicamente, che ama giocare in modo offensivo e spettacolare. Sono un giocatore molto preciso nei passaggi e nelle conclusioni a rete, e mi piace creare occasioni per me e per i miei compagni di squadra. Sono anche molto veloce e agile, e cerco sempre di superare gli avversari con dribbling creativi e sorprendenti.',
            'Sono un calciatore amatoriale molto leale e corretto, che rispetta sempre le regole del gioco. Sono un giocatore molto tattico, che ama leggere il gioco e trovare le soluzioni migliori in ogni situazione. Sono anche abbastanza veloce e resistente, e mi piace lottare per ogni pallone e difendere con determinazione la mia porta.',

            'Sono un calciatore amatoriale molto appassionato, che gioca per divertirsi e per stare in forma. Sono un giocatore molto veloce e abile nei dribbling, che ama superare gli avversari e creare spazi per me e per i miei compagni di squadra. Sono anche molto preciso nei passaggi e nelle conclusioni a rete, e cerco sempre di sfruttare al meglio le occasioni che mi vengono presentate.'
        ];

        foreach (User::all() as $user) {

            $new_player = new Player();
            $new_player->profile_photo = $faker->image(null, 640, 480);
            $new_player->phone_number = $faker->phoneNumber();
            foreach ($descriptions as $description) {
                $new_player->description = $description;
            }
            $new_player->birth_date = $faker->dateTimeBetween('-30 years', '-18 years');
            $new_player->city = $faker->state();
            $new_player->user_id = $user->id;
            $new_player->save();
        }
    }
}

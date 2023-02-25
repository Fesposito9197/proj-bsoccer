<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;



class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();

        $messages = [
            "Ciao! Ho sentito che ti piace giocare a calcetto. Vorresti unirti alla nostra partita domani?",
            "Ciao, ho bisogno di un giocatore per completare la nostra squadra di calcetto. Saresti disponibile domani?",
            "Salve! Siamo un gruppo di amici che giochiamo a calcetto ogni settimana. Vuoi unirti a noi?",
            "Ciao, ho notato che sei bravo a giocare a calcetto. Ti va di venire a giocare con noi questo weekend?",
            "Ciao! Giochiamo a calcetto ogni mercoledì sera. Vuoi venire a giocare con noi?",
            "Salve! Siamo alla ricerca di un nuovo giocatore per la nostra squadra di calcetto. Saresti interessato?",
            "Ciao, stiamo organizzando una partita di calcetto sabato pomeriggio. Vuoi unirti a noi?",
            "Salve! Siamo un gruppo di amici che giocano a calcetto regolarmente. Ti piacerebbe unirti a noi per una partita?",
            "Ciao! Abbiamo bisogno di un giocatore in più per la nostra partita di calcetto di questa sera. Saresti disponibile?",
            "Salve! Siamo alla ricerca di un giocatore per la nostra partita di calcetto di domani. Ti va di unirti a noi?",
            "Ciao! Giochiamo a calcetto ogni domenica mattina. Vuoi venire a giocare con noi questa settimana?",
            "Salve! Siamo un gruppo di amici che organizziamo partite di calcetto ogni volta che possiamo. Vuoi unirti a noi per la prossima partita?",
            "Ciao, stiamo organizzando una partita di calcetto venerdì sera. Ti piacerebbe unirti a noi?",
            "Salve! Siamo alla ricerca di un nuovo giocatore per la nostra squadra di calcetto. Saresti interessato?",
            "Ciao! Abbiamo bisogno di un giocatore in più per la nostra partita di calcetto di sabato. Saresti disponibile?",
            "Salve! Giochiamo a calcetto ogni giovedì sera. Ti piacerebbe unirti a noi?",
            "Ciao! Stiamo cercando un giocatore in più per la nostra partita di calcetto di domenica mattina. Saresti interessato?",
            "Salve! Siamo un gruppo di amici che giocano a calcetto regolarmente. Vuoi unirti a noi per una partita?",
            "Ciao! Giochiamo a calcetto ogni martedì sera. Ti piacerebbe venire a giocare con noi?",
            "Salve! Abbiamo bisogno di un giocatore in più per la nostra partita di calcetto di questa sera. Saresti disponibile?",
        ];

        $users = User::all();

        foreach ($users as $user) {
            $messageCount = Message::where('player_id', $user->id)->count();
            $messagesNeeded = 5 - $messageCount;

            for ($i = 0; $i < $messagesNeeded; $i++) {
                $new_message = new Message();
                $new_message->player_id = $user->id;
                $new_message->name = $faker->firstNameMale();
                $new_message->email = $faker->email();
                $index = rand(0, count($messages) - 1);
                $new_message->content = $messages[$index];
                $new_message->date_message = $faker->dateTimeBetween('-1 years', 'now');
                $new_message->save();
            }
        }
    }
}

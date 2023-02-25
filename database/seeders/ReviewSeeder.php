<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();

        $reviews = [
            "Questo giocatore ha un'ottima visione di gioco e riesce a creare occasioni per la squadra.",
            "Ha una grande resistenza fisica e non si arrende mai durante la partita.",
            "È un difensore molto solido e riesce a proteggere bene la porta.",
            "Questo calciatore ha una tecnica straordinaria e sa come dribblare i suoi avversari.",
            "Non ha paura di provare tiri da fuori area e spesso li segna.",
            "Ha una buona capacità di lettura del gioco e riesce a intercettare molti passaggi.",
            "È un giocatore molto veloce e riesce a superare facilmente i difensori avversari.",
            "Ha una grande abilità nel fare assist per i compagni di squadra.",
            "È un portiere molto reattivo e riesce a parare anche i tiri più difficili.",
            "Ha un buon senso della posizione in campo e sa dove essere in ogni momento.",
            "Questo calciatore ha una grande forza fisica e riesce a vincere la maggior parte dei duelli.",
            "Ha una grande precisione nei tiri di punizione e spesso segna.",
            "È un giocatore molto astuto e sa come sfruttare gli errori degli avversari.",
            "Ha una grande determinazione e non si arrende mai anche quando le cose vanno male.",
            "È un centrocampista molto completo e sa sia difendere che attaccare.",
            "Ha una buona tecnica di controllo del pallone e sa come dribblare con agilità.",
            "È un giocatore molto creativo e sa inventare soluzioni impreviste.",
            "È un attaccante molto abile e sa come segnare anche in situazioni difficili.",
            "Ha una buona capacità di passaggio e riesce a distribuire bene il gioco.",
            "È un giocatore molto coraggioso e non ha paura di affrontare i suoi avversari.",
        ];

        $min_reviews_per_player = 5;
        $players = User::all();

        foreach ($players as $player) {
            $num_reviews = Review::where('player_id', $player->id)->count();
            $num_new_reviews = max(0, $min_reviews_per_player - $num_reviews);

            for ($i = 0; $i < $num_new_reviews; $i++) {
                $new_review = new Review();
                $new_review->player_id = $player->id;
                $new_review->name = $faker->firstNameMale();
                $index = rand(0, count($reviews) - 1);
                $new_review->content = $reviews[$index];
                $new_review->date_message = $faker->dateTimeBetween('-1 years', 'now');
                $new_review->save();
            }
        }
    }
}

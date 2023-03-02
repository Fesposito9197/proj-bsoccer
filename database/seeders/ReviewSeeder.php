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
            "Questo giocatore ha una tecnica eccellente e sa come creare occasioni per la squadra.",
            "Ha un grande senso della posizione in campo e sa dove essere in ogni momento.",
            "È un attaccante molto abile e sa come segnare in situazioni difficili.",
            "Ha una buona resistenza fisica e non si arrende mai durante la partita.",
            "È un giocatore molto veloce e riesce a superare facilmente i difensori avversari.",
            "Ha una grande abilità nel fare assist per i compagni di squadra.",
            "È un portiere molto reattivo e riesce a parare anche i tiri più difficili.",
            "Ha una buona tecnica di controllo del pallone e sa come dribblare con agilità.",
            "È un centrocampista molto completo e sa sia difendere che attaccare.",
            "È un difensore molto solido e riesce a proteggere bene la porta.",
            "Ha una grande forza fisica e riesce a vincere la maggior parte dei duelli.",
            "È un giocatore molto creativo e sa inventare soluzioni impreviste.",
            "Ha una grande precisione nei tiri di punizione e spesso segna.",
            "È un giocatore molto astuto e sa come sfruttare gli errori degli avversari.",
            "Ha una buona capacità di passaggio e riesce a distribuire bene il gioco.",
            "È un giocatore molto coraggioso e non ha paura di affrontare i suoi avversari.",
            "È un calciatore molto intelligente tatticamente e sa come leggere il gioco.",
            "Ha una grande esperienza e sa come gestire le situazioni difficili.",
            "È un giocatore molto grintoso e sa motivare i suoi compagni di squadra.",
            "È un calciatore molto leale e fa sempre il massimo per la squadra.",
            "Ha una tecnica molto scadente e spesso commette errori costosi.",
            "È un giocatore molto lento e non riesce a tenere il passo con gli avversari.",
            "È un attaccante molto egoista e non passa mai la palla ai compagni di squadra.",
            "Ha una resistenza fisica molto scarsa e spesso si stanca rapidamente.",
            "È un centrocampista molto disordinato e non riesce a mantenere la posizione.",
            "È un difensore molto insicuro e commette errori banali.",
            "È un portiere molto incerto e commette errori che costano gol.",
            "Ha una tecnica di controllo del pallone molto scadente e spesso lo perde.",
            "È un calciatore molto individualista e non collabora con i compagni di squadra.",
            "È un attaccante molto impreciso e spesso sbaglia gol facili.",
            "Ha una scarsa abilità nel fare assist per i compagni di squadra.",
            "È un centrocampista molto pigro e non si impegna mai del tutto.",
            "È un calciatore molto nervoso e spesso commette falli inutili.",
        ];

        // $min_reviews_per_player = 5;
        $players = User::all();

        foreach ($players as $player) {
            $num_reviews = Review::where('player_id', $player->id)->count();
            $num_new_reviews = rand(5, 600) - $num_reviews;

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

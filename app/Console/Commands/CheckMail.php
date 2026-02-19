<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Webklex\IMAP\Facades\Client;

class CheckMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifie les nouveaux emails et envoie une notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $client = Client::account('default');
            $client->connect();
            $folder = $client->getFolder('INBOX');
            $messages = $folder->query()->unseen()->get();
            $count = $messages->count();

            if ($count > 0) {
                $this->info("{$count} nouveau(x) mail(s) trouvé(s). Envoi de la notification...");

                // Envoi de l'email de notification via le système Mail de Laravel
                $texte = "Bonjour,\n\nVous avez actuellement {$count} nouveau(x) message(s) non lu(s) dans votre boîte perso.\n\nPensez à aller les vérifier !";

                Mail::raw($texte, function ($message) {
                    $message->to('hugomarceau@icloud.com')
                        ->subject('Notification : Nouveaux emails sur votre boîte perso !');
                });

                $this->info("Notification envoyée avec succès !");
            }
        } catch (\Exception $e) {
            $this->error("Erreur : " . $e->getMessage());
            dump($e);
        }

    }
}

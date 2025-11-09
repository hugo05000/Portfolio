<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\ClientMail;
use Illuminate\Http\Request;
use Log;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function sendMail(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'motif'   => 'required|string|in:site-internet,pc-sur-mesure,formation-web,autre',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:1200',
            'consent' => 'accepted',
        ]);

        try {
            $data = $request->only(['name','email','motif','subject','message']);

            $to = env('MAIL_TO', config('mail.from.address', 'contact@hugomarceau.fr'));

            Mail::to($to)
                ->send(new ClientMail($data));

            return back()->with('success', 'Votre message a été envoyé avec succès !');
        } catch (\Throwable $e) {
            Log::error('Contact mail error: '.$e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de l’envoi du message. Veuillez réessayer.');
        }
    }
}

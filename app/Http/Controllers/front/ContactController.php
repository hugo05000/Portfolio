<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\ClientMail;
use Illuminate\Http\Request;
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
            'motif' => 'required|email|max:255',
            'subject' => 'string|max:255',
            'message' => 'required|string|max:1200',
            'consent' => 'required|boolean',
        ]);

        try {
            Mail::to('votre@email.fr')->send(new ClientMail($request->all()));

            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l’envoi du message. Veuillez réessayer.');
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Storage;

class ClientAdminController extends Controller
{
    public function create()
    {
        $clients = Client::all();

        return view('admin.pages.clientAdmin', compact('clients'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nom' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'lien' => 'nullable|string',
        ]);

        $data['image'] = $request->file('image')->store('clients', 'public');

        Client::create($data);

        return back()->with('success', 'Client ajouté.');
    }

    public function update(Request $request, Client $client) {
        $data = $request->validate([
            'nom' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'lien' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) {
                Storage::disk('public')->delete($client->image);
            }

            $path = $request->file('image')->store('clients', 'public');

            $data['image'] = $path;
        }

        $client->update($data);

        return back()->with('success', 'Client modifié avec succès.');
    }

    public function destroy(Client $client) {
        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }

        $client->delete();

        return back()->with('success', 'Client supprimé.');
    }
}

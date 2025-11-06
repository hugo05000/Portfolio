<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoPrestation;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Storage;

class PrestationAdminController extends Controller
{

    public function create()
    {
        $prestations = Prestation::all();

        return view('admin.pages.prestationsAdmin', compact('prestations'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
        ]);

        $prestation = Prestation::create($data);

        if ($request->hasFile('photos_prestations')) {
            if ($request->hasFile('photos_prestations')) {
                foreach ($request->file('photos_prestations', []) as $photo) {
                    PhotoPrestation::create([
                        'source'        => $photo->store('photos_prestations', 'public'),
                        'alt'           => $photo->getClientOriginalName(),
                        'id_prestation' => $prestation->id,
                    ]);
                }
            }
        }

        return back()->with('success', 'Prestation ajouté');
    }

    public function destroy(Request $request) {
        $prestation = Prestation::findOrFail($request->id);

        foreach ($prestation->photos as $photo) {
            Storage::disk('public')->delete($photo->source);
            $photo->delete();
        }

        $prestation->delete();

        return back()->with('success', 'Prestation supprimée');
    }

    public function destroyPhoto(PhotoPrestation $photo)
    {
        if ($photo->source && Storage::disk('public')->exists($photo->source)) {
            Storage::disk('public')->delete($photo->source);
        }

        $photo->delete();

        return back()->with('success', 'Photo supprimée');
    }

}

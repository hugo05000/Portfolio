<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoPrestation;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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

        $this->storeCompressedPhotos($request, $prestation);

        return back()->with('success', 'Prestation ajouté');
    }

    public function update(Request $request, Prestation $prestation) {
        $data = $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
            'photos_prestations.*' => 'nullable|image',
        ]);

        $prestation->update($data);

        $this->storeCompressedPhotos($request, $prestation);

        return back()->with('success', 'Prestation modifié');
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

    protected function storeCompressedPhotos(Request $request, Prestation $prestation): void
    {
        if (!$request->hasFile('photos_prestations')) {
            return;
        }

        // Manager v3
        $manager = new ImageManager(new Driver());

        foreach ($request->file('photos_prestations', []) as $photo) {
            if (!$photo || !$photo->isValid()) {
                continue;
            }

            // Lire l'image (v3: read())
            $image = $manager->read($photo->getPathname());

            // Redimensionner proprement
            $image->scale(width: 1600); // 1600px max

            // Encoder JPEG compressé
            $compressed = $image->toWebp(75);

            // Nouveau nom
            $filename = uniqid('presta_') . '.webp';
            $path = 'photos_prestations/' . $filename;

            // Sauvegarde
            Storage::disk('public')->put($path, $compressed);

            // Enregistrement DB
            PhotoPrestation::create([
                'source'        => $path,
                'alt'           => $photo->getClientOriginalName(),
                'id_prestation' => $prestation->id,
            ]);
        }
    }

}

@extends('layout.app')

@section('title')
    Mentions légales
@endsection

@section('meta_description', "Mentions légales site hugomarceau.fr : gestion des données personnelles et conformité RGPD.")

@section('header')
    @include('layout.header', ['titre' => 'Mentions légales', 'description' => 'Informations légales du site'])
@endsection

@section('contenu')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4">Mentions légales</h2>

                <h5>1. Éditeur du site</h5>
                <p>
                    Ce site est édité par <strong>Hugo MARCEAU</strong>, auto-entrepreneur.<br>
                    SIRET : 991 648 536 00019<br>
                    Email : <a href="mailto:contact@hugomarceau.fr">contact@hugomarceau.fr</a><br>
                    Siège social : 4 Rue Achille Emperaire, 13090 Aix-en-Provence, France.
                </p>

                <h5>2. Hébergeur</h5>
                <p>
                    Le site est hébergé par :<br>
                    <strong>OVH SAS</strong><br>
                    2 rue Kellermann, 59100 Roubaix, France<br>
                    Site : <a href="https://www.ovhcloud.com/fr/" target="_blank">www.ovhcloud.com</a>
                </p>

                <h5>3. Propriété intellectuelle</h5>
                <p>
                    L'ensemble du contenu du site (textes, images, code, graphismes, logo, etc.) est la propriété exclusive de <strong>Hugo MARCEAU</strong>,
                    sauf mention contraire. Toute reproduction, distribution ou utilisation sans autorisation préalable est strictement interdite.
                </p>

                <h5>4. Responsabilité</h5>
                <p>
                    L’éditeur du site s’efforce de fournir des informations exactes et à jour. Toutefois, il ne saurait être tenu responsable
                    d’erreurs, d’omissions ou de tout dommage lié à l’utilisation du site.
                </p>

                <h5>5. Contact</h5>
                <p>
                    Pour toute question ou réclamation concernant ce site, vous pouvez écrire à :
                    <a href="mailto:contact@hugomarceau.fr">contact@hugomarceau.fr</a>.
                </p>
            </div>
        </div>
    </div>
@endsection

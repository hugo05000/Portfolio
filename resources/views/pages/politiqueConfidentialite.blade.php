@extends('layout.app')

@section('title')
    Politique de confidentialité
@endsection

@section('meta_description', "Politique de confidentialité du site hugomarceau.fr.")

@section('header')
    @include('layout.header', ['titre' => 'Politique de confidentialité', 'description' => 'Protection et respect de la vie privée'])
@endsection

@section('contenu')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4">Politique de confidentialité</h2>

                <p>
                    Le site <strong>hugomarceau.fr</strong> respecte la vie privée de ses visiteurs et ne collecte aucune donnée personnelle à des fins commerciales.
                </p>

                <h5>1. Données collectées</h5>
                <p>
                    Aucune donnée personnelle n’est enregistrée dans une base de données.
                    Les seules informations susceptibles d’être transmises sont celles que vous choisissez volontairement de communiquer via le formulaire de contact.
                </p>

                <h5>2. Utilisation des données</h5>
                <p>
                    Les informations envoyées via le formulaire de contact (nom, adresse e-mail, message) sont utilisées uniquement
                    pour répondre à votre demande.
                    Elles ne sont ni stockées, ni partagées, ni revendues à des tiers.
                </p>

                <h5>3. Cookies</h5>
                <p>
                    Ce site n’utilise <strong>aucun cookie de suivi, d’analyse ou de publicité</strong>.
                    Seuls les cookies strictement nécessaires au bon fonctionnement technique du site peuvent être utilisés (session, sécurité).
                </p>

                <h5>4. Sécurité</h5>
                <p>
                    Le site est hébergé sur des serveurs sécurisés (OVH).
                    Les échanges entre votre navigateur et le site sont chiffrés via le protocole HTTPS.
                </p>

                <h5>5. Vos droits</h5>
                <p>
                    Conformément au Règlement Général sur la Protection des Données (RGPD), vous pouvez à tout moment
                    demander la suppression ou la rectification des informations transmises via le formulaire de contact en écrivant à :
                    <a href="mailto:contact@hugomarceau.fr">contact@hugomarceau.fr</a>.
                </p>

                <h5>6. Contact</h5>
                <p>
                    Pour toute question relative à la confidentialité, vous pouvez contacter directement :
                    <a href="mailto:contact@hugomarceau.fr">contact@hugomarceau.fr</a>.
                </p>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Message de contact - {{ $data['name'] }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; background-color: #f9f9f9;">
<div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2 style="color: #2c3e50; border-bottom: 2px solid #34495e; padding-bottom: 10px;">Nouveau message de contact</h2>

    <p><strong>Nom :</strong> {{ $data['name'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Motif :</strong> {{ $data['motif'] }}</p>
    <p><strong>Sujet :</strong> {{ $data['subject'] }}</p>
    <p><strong>Message :</strong></p>
    <div style="background-color: #f5f5f5; padding: 15px; border-left: 4px solid #34495e; border-radius: 5px; white-space: pre-line;">
        {{ $data['message'] }}
    </div>

    <p style="margin-top: 20px; font-size: 0.9rem; color: #7f8c8d;">
        Envoi du {{ date('d/m/Y à H:i') }}
    </p>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #ccc; font-size: 0.9rem; color: #7f8c8d;">
        <p>Vous pouvez répondre directement à cet email.</p>
        <p><strong>Important :</strong> Votre message n’est pas stocké en base de données, il est traité en temps réel.</p>
    </div>
</div>
</body>
</html>

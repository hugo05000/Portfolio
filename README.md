# Portfolio de Hugo MARCEAU

Site portfolio personnel présentant mes projets, compétences et parcours.

🔗 [Voir le site en ligne](www.hugomarceau.fr) <!-- ajoute le lien si déployé -->

## 🛠️ Stack technique

- **Backend** : Laravel (PHP)
- **Frontend** : Vite
- **Base de données** : MySQL / SQLite <!-- à préciser selon ta config -->
- **Tests** : PHPUnit

## ✨ Fonctionnalités

- Présentation personnelle
- Liste de projets réalisés
- Compétences techniques
- Formulaire de contact

<!-- Ajuste cette liste selon ce que contient réellement ton site -->

## 🚀 Installation

### Prérequis

- PHP >= 8.x
- Composer
- Node.js & npm

### Étapes

```bash
# Cloner le dépôt
git clone https://github.com/hugo05000/Portfolio.git
cd Portfolio

# Installer les dépendances PHP
composer install

# Installer les dépendances front
npm install

# Copier le fichier d'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données dans le fichier .env
# puis lancer les migrations
php artisan migrate

# Compiler les assets
npm run dev

# Lancer le serveur local
php artisan serve
```

Le site est alors accessible sur `http://localhost:8000`.

## 🧪 Tests

```bash
php artisan test
```


## 📬 Contact

Hugo MARECAU — [GitHub](https://github.com/hugo05000)

# Notre Blog Laravel

**Tous les anciens commits de ce projet ont été réalisés avec BENNANI ILYASS.**

Un blog fonctionnel développé avec Laravel, permettant la gestion de billets, commentaires et catégories via une interface d'administration sécurisée.

## Prérequis

- PHP >= 8.1
- Composer
- MariaDB
- Node.js & NPM
- Git

## Installation pas à pas

### 1. Cloner le projet (selon votre projet)

#### Projet principal : MonBlog
```bash
git clone https://forge.univ-lyon1.fr/isi2-bontemps-flavien/monblog.git
cd monblog
```

#### Projet secondaire : SampleBlogAPI
```bash
git clone https://forge.univ-lyon1.fr/isi2-bontemps-flavien/sampleblogapi.git
cd sampleblogapi
```

### 2. Installer les dépendances
```bash
composer install
npm install
```

### 3. Configurer l'environnement
```bash
cp .env.example .env
```

#### Exemple de `.env` pour **MonBlog**
Copiez le contenu de .env.example et collez-le dans un nouveau fichier nommé .env.

#### Exemple de `.env` pour **SampleBlogAPI**
Copiez le contenu de .env.example et collez-le dans un nouveau fichier nommé .env.


### 4. Donner les bonnes permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R $USER:www-data storage bootstrap/cache
```

### 5. Générer la clé de l'application
```bash
php artisan key:generate
```

### 6. Créer et lier la base de données
- Créer une base correspondant à `DB_DATABASE` dans votre `.env`
- Donner tous les droits à l’utilisateur `developpement` avec mot de passe `DVel0ppH`

### 7. Lancer les migrations et le peuplement de données
```bash
php artisan migrate:fresh --seed
```

### 8. Compiler les fichiers front-end
```bash
npm run dev
```

### 9. Démarrer le serveur Laravel
```bash
php artisan serve
```

L'application est maintenant accessible à : [http://localhost](http://localhost)

## 🔐 Problèmes courants et solutions

### Problème de permissions
```bash
chmod -R 775 storage
chown -R www-data:www-data storage
```

### Clé d'application manquante
```bash
php artisan key:generate
```
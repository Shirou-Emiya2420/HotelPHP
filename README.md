# 🏨 Projet PHP – Gestion d’Hôtels

Ce projet simule un système de réservation d’hôtels en PHP orienté objet. Il permet de gérer des **clients**, des **hôtels**, des **chambres** et des **réservations**, avec un affichage HTML et une mise en page CSS responsive.

---

## 📁 Structure du projet

```
.
├── index.php             // Point d’entrée : instanciation des objets, affichage
├── Client.php            // Classe Client
├── Hotel.php             // Classe Hotel, contient les chambres
├── Chambre.php           // Classe Chambre, liée à un hôtel
├── Reservation.php       // Classe Reservation
├── style.css             // Feuille de style (design responsive moderne)
```

---

## ⚙️ Fonctionnalités principales

- Création dynamique de :
  - 5 clients
  - 4 hôtels
  - 10 chambres par hôtel avec attributs aléatoires (prix, wifi, lits, dispo)
  - Réservations pour 3 des 4 hôtels (3 chambres réservées par hôtel)

- Affichage :
  - Informations des hôtels
  - Statistiques de chambres (totales, réservées, libres)
  - Liste des réservations par hôtel
  - Liste des réservations par client
  - Tableaux de statut des chambres avec prix, wifi et état

- Design :
  - CSS responsive
  - Affichage clair, coloré et moderne
  - Adapté mobile/tablette

---

## 🧱 Classes et responsabilités

### `Client.php`
Représente un client avec :
- Nom
- Prénom
- Liste de ses réservations

### `Hotel.php`
Contient :
- Nom, adresse, ville
- Liste des chambres
- Méthodes pour récupérer les chambres, réserver, afficher les stats

### `Chambre.php`
Une chambre possède :
- Numéro auto-incrémenté
- Prix
- État (dispo/réservée)
- Capacité (nb de lits)
- Wifi (booléen)
- Référence à l’hôtel

### `Reservation.php`
Relie un client à une chambre :
- Client
- Chambre
- Date de début / fin
- Ajoute automatiquement la réservation à la chambre et au client

---

## 🖥️ Installation et exécution

1. **Pré-requis** :
   - PHP 7+ installé (ou WAMP/XAMPP)

2. **Utilisation** :
   - Place tous les fichiers dans un dossier (ex : `/htdocs/projet_hotel`)
   - Lance `index.php` depuis ton navigateur (via `localhost`)
   - À chaque rafraîchissement, de nouvelles données sont générées

---

## 🎨 Design CSS

Le fichier `style.css` propose :
- Thème clair avec touches de bleu
- Tableaux arrondis, responsive et lisibles
- Comportement adaptatif mobile via media queries
- Statut visuel coloré (rouge : réservée, vert : disponible)

---

## ✅ À améliorer

- Persistance des données (BDD, JSON, etc.)
- Interface de réservation interactive
- Système d’authentification client
- Tri et filtrage des réservations
- Vue admin pour la gestion des hôtels

---

## 👨‍💻 Auteur

Projet généré automatiquement par ChatGPT à partir de la structure orientée objet fournie.

---

## 📄 Licence

Libre de droits pour usage pédagogique et personnel.

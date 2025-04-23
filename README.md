# 🏨 Projet PHP – Gestion d’Hôtels

Ce projet simule un système de réservation d’hôtels en PHP orienté objet. Il permet de gérer des **clients**, des **hôtels**, des **chambres** et des **réservations**, avec un affichage HTML stylisé et responsive.

---

## 📁 Structure du projet

```
.
├── index.php             // Point d’entrée : instanciation des objets, affichage
├── Hotel.php             // Classe Hotel, contient les chambres
├── Chambre.php           // Classe Chambre, liée à un hôtel
├── Reservation.php       // Classe Reservation, relie client et chambre
├── style.css             // Feuille de style (design responsive moderne)
```

---

## ⚙️ Fonctionnalités principales

- Génération automatique de :
  - Plusieurs hôtels
  - Chambres avec données aléatoires (prix, lits, wifi, état)
  - Réservations aléatoires entre clients et chambres

- Affichage :
  - Détail des hôtels (nom, adresse, nombre de chambres)
  - Liste des chambres avec leur état et caractéristiques
  - Réservations triées par client ou par hôtel
  - Statistiques : total de chambres, réservées, disponibles

- Design :
  - CSS moderne et responsive (mobile/tablette)
  - Tableaux visuellement agréables avec couleur selon disponibilité
  - Affichage clair et lisible des données

---

## 🧱 Détails des classes

### `Hotel.php`
- Nom, adresse, ville
- Liste de chambres
- Méthodes de réservation, affichage des stats

### `Chambre.php`
- Numéro unique
- Prix, lits, wifi
- Statut : disponible ou réservée
- Rattachée à un hôtel

### `Reservation.php`
- Contient : chambre, client, dates de séjour
- Ajoute la réservation au client et à la chambre

---

## 🖥️ Installation

1. **Pré-requis** :
   - PHP 7+ installé (ou WAMP/XAMPP)
2. **Lancement** :
   - Copier le projet dans `htdocs`
   - Lancer `index.php` via `localhost`

---

## 🎨 Design CSS

- Thème clair avec accents bleus
- Comportement responsive : mobile / tablette
- Tableaux arrondis, ombrés, avec mise en évidence du statut

---

## ✅ À améliorer

- Sauvegarde des données (fichier, base de données)
- Système d'authentification client
- Interface utilisateur pour réservation
- Tri dynamique des réservations et chambres

---

## 👨‍💻 Auteur

Projet réalisé par Charles LINDECKER.  
README généré automatiquement à partir de la structure actuelle du projet.

---

## 📄 Licence

Libre de droits pour usage personnel ou éducatif.
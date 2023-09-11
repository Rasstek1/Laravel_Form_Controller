<?php

namespace App\Http\Controllers;

use App\Models\profil;

public function FileUpload(): void
{
    $target_dir = "public/uploads/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier image est une image réelle ou une fausse image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }

    // ... (ajoutez ici d'autres vérifications, par exemple la taille du fichier, l'extension, etc.)

    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " a été téléchargé.";
        } else {
            echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
        }

        $profile = new profil();

        $profile->photo = $target_file;  // ajustez cela selon le nom de votre colonne dans la DB
        $profile->nom = request('nom');
        $profile->prenom = request('prenom');
        $profile->email = request('email');
        $profile->telephone = request('telephone');
        $profile->commentaire = request('commentaire');

        try {
            $profile->save();
            echo "Profil créé avec succès.";
        } catch (\Exception $e) {
            // En cas d'erreur lors de l'enregistrement du profil, affichez un message d'erreur
            echo "Une erreur est survenue lors de la création du profil : " . $e->getMessage();
        }
    }


}


<?php

namespace App\Http\Controllers;

class FileUploadController
{
    public function FileUpload(): void
    {
        $target_dir = "fichiers/photos/";
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

// Vérifiez si $uploadOk est défini à 0 par une erreur
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
// si tout va bien, essayez de télécharger le fichier
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " a été téléchargé.";
            } else {
                echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
            }
        }
    }
}


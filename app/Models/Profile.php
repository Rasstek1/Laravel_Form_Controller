<?php

namespace App\Models;

class Profile
{

    public string $nom;
    public string $prenom;

    public string $email;
    public string $telephone;
    public string $commentaire;

    public  $photo;

    public function __construct(string $nom, string $prenom, string $email, string $telephone, string $commentaire)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->commentaire = $commentaire;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Profile
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): Profile
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Profile
    {
        $this->email = $email;
        return $this;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): Profile
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getCommentaire(): string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): Profile
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
}

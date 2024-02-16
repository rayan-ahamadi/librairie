<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $ISBN = null;

    #[ORM\Column(length: 100)]
    private ?string $Titre_livre = null;

    #[ORM\Column(length: 100)]
    private ?string $theme_livre = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $nbr_pages_livre = null;

    #[ORM\Column(length: 50)]
    private ?string $Format_livre = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom_auteur = null;

    #[ORM\Column(length: 100)]
    private ?string $Prenom_auteur = null;

    #[ORM\Column(length: 100)]
    private ?string $Editeur = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $annee_edition = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $prix_vente = null;

    #[ORM\Column(length: 50)]
    private ?string $Langue_livre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getTitreLivre(): ?string
    {
        return $this->Titre_livre;
    }

    public function setTitreLivre(string $Titre_livre): static
    {
        $this->Titre_livre = $Titre_livre;

        return $this;
    }

    public function getThemeLivre(): ?string
    {
        return $this->theme_livre;
    }

    public function setThemeLivre(string $theme_livre): static
    {
        $this->theme_livre = $theme_livre;

        return $this;
    }

    public function getNbrPagesLivre(): ?string
    {
        return $this->nbr_pages_livre;
    }

    public function setNbrPagesLivre(string $nbr_pages_livre): static
    {
        $this->nbr_pages_livre = $nbr_pages_livre;

        return $this;
    }

    public function getFormatLivre(): ?string
    {
        return $this->Format_livre;
    }

    public function setFormatLivre(string $Format_livre): static
    {
        $this->Format_livre = $Format_livre;

        return $this;
    }

    public function getNomAuteur(): ?string
    {
        return $this->Nom_auteur;
    }

    public function setNomAuteur(string $Nom_auteur): static
    {
        $this->Nom_auteur = $Nom_auteur;

        return $this;
    }

    public function getPrenomAuteur(): ?string
    {
        return $this->Prenom_auteur;
    }

    public function setPrenomAuteur(string $Prenom_auteur): static
    {
        $this->Prenom_auteur = $Prenom_auteur;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->Editeur;
    }

    public function setEditeur(string $Editeur): static
    {
        $this->Editeur = $Editeur;

        return $this;
    }

    public function getAnneeEdition(): ?string
    {
        return $this->annee_edition;
    }

    public function setAnneeEdition(string $annee_edition): static
    {
        $this->annee_edition = $annee_edition;

        return $this;
    }

    public function getPrixVente(): ?string
    {
        return $this->prix_vente;
    }

    public function setPrixVente(string $prix_vente): static
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getLangueLivre(): ?string
    {
        return $this->Langue_livre;
    }

    public function setLangueLivre(string $Langue_livre): static
    {
        $this->Langue_livre = $Langue_livre;

        return $this;
    }
}

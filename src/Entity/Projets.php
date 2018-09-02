<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetsRepository")
 */
class Projets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRO_nom;

    /**
     * @ORM\Column(type="text")
     */
    private $PRO_desc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRO_techno;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRO_image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRO_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PRO_boxprojet;

    public function getId()
    {
        return $this->id;
    }

    public function getPRONom(): ?string
    {
        return $this->PRO_nom;
    }

    public function setPRONom(string $PRO_nom): self
    {
        $this->PRO_nom = $PRO_nom;

        return $this;
    }

    public function getPRODesc(): ?string
    {
        return $this->PRO_desc;
    }

    public function setPRODesc(string $PRO_desc): self
    {
        $this->PRO_desc = $PRO_desc;

        return $this;
    }

    public function getPROTechno(): ?string
    {
        return $this->PRO_techno;
    }

    public function setPROTechno(string $PRO_techno): self
    {
        $this->PRO_techno = $PRO_techno;

        return $this;
    }

    public function getPROImage(): ?string
    {
        return $this->PRO_image;
    }

    public function setPROImage(string $PRO_image): self
    {
        $this->PRO_image = $PRO_image;

        return $this;
    }

    public function getPROUrl(): ?string
    {
        return $this->PRO_url;
    }

    public function setPROUrl(string $PRO_url): self
    {
        $this->PRO_url = $PRO_url;

        return $this;
    }

    public function getPROBoxprojet(): ?string
    {
        return $this->PRO_boxprojet;
    }

    public function setPROBoxprojet(string $PRO_boxprojet): self
    {
        $this->PRO_boxprojet = $PRO_boxprojet;

        return $this;
    }
}

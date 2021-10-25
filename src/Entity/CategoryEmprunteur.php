<?php

namespace App\Entity;

use App\Repository\CategoryEmprunteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryEmprunteurRepository::class)
 */
class CategoryEmprunteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    public function __toString()
    {
        return $this->getname();
    }

    /**
     * @ORM\OneToMany(targetEntity=Emprunteur::class, mappedBy="CategoryEmprunteur")
     */
    private $emprunteurs;

    public function __construct()
    {
        $this->emprunteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Emprunteur[]
     */
    public function getEmprunteurs(): Collection
    {
        return $this->emprunteurs;
    }

    public function addEmprunteur(Emprunteur $emprunteur): self
    {
        if (!$this->emprunteurs->contains($emprunteur)) {
            $this->emprunteurs[] = $emprunteur;
            $emprunteur->setCategoryEmprunteur($this);
        }

        return $this;
    }

    public function removeEmprunteur(Emprunteur $emprunteur): self
    {
        if ($this->emprunteurs->removeElement($emprunteur)) {
            // set the owning side to null (unless already changed)
            if ($emprunteur->getCategoryEmprunteur() === $this) {
                $emprunteur->setCategoryEmprunteur(null);
            }
        }

        return $this;
    }
}

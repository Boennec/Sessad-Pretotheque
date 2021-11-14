<?php

namespace App\Entity;

use App\Repository\EmprunteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmprunteurRepository::class)
 */
class Emprunteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomFamilleEnfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomEnfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomFamilleParent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomFamilleSalarieLGO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PrenomSalarieLGO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serviceLGO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $structurePartenaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupePartenaire;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryEmprunteur::class, inversedBy="emprunteurs")
     */
    private $CategoryEmprunteur;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="Emprunteur")
     */
    private $reservations;


    public function __toString()
    {
        return $this->getEmail();
    }

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNomFamilleEnfant(): ?string
    {
        return $this->NomFamilleEnfant;
    }

    public function setNomFamilleEnfant(string $NomFamilleEnfant): self
    {
        $this->NomFamilleEnfant = $NomFamilleEnfant;

        return $this;
    }

    public function getPrenomEnfant(): ?string
    {
        return $this->PrenomEnfant;
    }

    public function setPrenomEnfant(string $PrenomEnfant): self
    {
        $this->PrenomEnfant = $PrenomEnfant;

        return $this;
    }

    public function getNomFamilleParent(): ?string
    {
        return $this->NomFamilleParent;
    }

    public function setNomFamilleParent(string $NomFamilleParent): self
    {
        $this->NomFamilleParent = $NomFamilleParent;

        return $this;
    }

    public function getNomFamilleSalarieLGO(): ?string
    {
        return $this->NomFamilleSalarieLGO;
    }

    public function setNomFamilleSalarieLGO(?string $NomFamilleSalarieLGO): self
    {
        $this->NomFamilleSalarieLGO = $NomFamilleSalarieLGO;

        return $this;
    }

    public function getPrenomSalarieLGO(): ?string
    {
        return $this->PrenomSalarieLGO;
    }

    public function setPrenomSalarieLGO(?string $PrenomSalarieLGO): self
    {
        $this->PrenomSalarieLGO = $PrenomSalarieLGO;

        return $this;
    }

    public function getServiceLGO(): ?string
    {
        return $this->serviceLGO;
    }

    public function setServiceLGO(?string $serviceLGO): self
    {
        $this->serviceLGO = $serviceLGO;

        return $this;
    }

    public function getStructurePartenaire(): ?string
    {
        return $this->structurePartenaire;
    }

    public function setStructurePartenaire(?string $structurePartenaire): self
    {
        $this->structurePartenaire = $structurePartenaire;

        return $this;
    }

    public function getGroupePartenaire(): ?string
    {
        return $this->groupePartenaire;
    }

    public function setGroupePartenaire(?string $groupePartenaire): self
    {
        $this->groupePartenaire = $groupePartenaire;

        return $this;
    }

    public function getCategoryEmprunteur(): ?CategoryEmprunteur
    {
        return $this->CategoryEmprunteur;
    }

    public function setCategoryEmprunteur(?CategoryEmprunteur $CategoryEmprunteur): self
    {
        $this->CategoryEmprunteur = $CategoryEmprunteur;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setEmprunteur($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEmprunteur() === $this) {
                $reservation->setEmprunteur(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\MascotasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MascotasRepository::class)]
class Mascotas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nombre = null;

    #[ORM\Column(length: 20)]
    private ?string $raza = null;

    #[ORM\Column]
    private ?bool $vacuna = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\OneToMany(mappedBy: 'tipomascota', targetEntity: Datospersonales::class)]
    private Collection $datospersonales;

    public function __construct()
    {
        $this->datospersonales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function __toString()
    {
        return $this->getNombre();
    }


    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function isVacuna(): ?bool
    {
        return $this->vacuna;
    }

    public function setVacuna(bool $vacuna): self
    {
        $this->vacuna = $vacuna;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return Collection<int, Datospersonales>
     */
    public function getDatospersonales(): Collection
    {
        return $this->datospersonales;
    }

    public function addDatospersonale(Datospersonales $datospersonale): self
    {
        if (!$this->datospersonales->contains($datospersonale)) {
            $this->datospersonales->add($datospersonale);
            $datospersonale->setTipomascota($this);
        }

        return $this;
    }

    public function removeDatospersonale(Datospersonales $datospersonale): self
    {
        if ($this->datospersonales->removeElement($datospersonale)) {
            // set the owning side to null (unless already changed)
            if ($datospersonale->getTipomascota() === $this) {
                $datospersonale->setTipomascota(null);
            }
        }

        return $this;
    }
}

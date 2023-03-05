<?php

namespace App\Entity;

use App\Repository\DatospersonalesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatospersonalesRepository::class)]
class Datospersonales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nombre = null;

    #[ORM\Column(length: 30)]
    private ?string $apellidos = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechanacimiento = null;

    #[ORM\Column(length: 9)]
    private ?string $dni = null;

    #[ORM\Column(length: 255)]
    private ?string $mascotas = null;

    #[ORM\ManyToOne(inversedBy: 'datospersonales')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Mascotas $tipomascota = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getFechanacimiento(): ?\DateTimeInterface
    {
        return $this->fechanacimiento;
    }

    public function setFechanacimiento(\DateTimeInterface $fechanacimiento): self
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getMascotas(): ?string
    {
        return $this->mascotas;
    }

    public function setMascotas(string $mascotas): self
    {
        $this->mascotas = $mascotas;

        return $this;
    }

    public function getTipomascota(): ?Mascotas
    {
        return $this->tipomascota;
    }

    public function setTipomascota(?Mascotas $tipomascota): self
    {
        $this->tipomascota = $tipomascota;

        return $this;
    }
}

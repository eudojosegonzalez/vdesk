<?php

namespace App\Entity;

use App\Repository\ServiciosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiciosRepository::class)]
class Servicios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $estado = null;

    #[ORM\Column]
    private array $metodos_pago = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getMetodosPago(): array
    {
        return $this->metodos_pago;
    }

    public function setMetodosPago(array $metodos_pago): static
    {
        $this->metodos_pago = $metodos_pago;

        return $this;
    }
}

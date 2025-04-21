<?php

namespace App\Entity;

use App\Repository\MetodoPagoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetodoPagoRepository::class)]
class MetodoPago
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\Column]
    private ?int $estado = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referencia = null;

    #[ORM\Column]
    private ?int $descuento = null;

    #[ORM\Column]
    private ?float $porcentaje = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

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

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(?string $referencia): static
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getDescuento(): ?int
    {
        return $this->descuento;
    }

    public function setDescuento(int $descuento): static
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getPorcentaje(): ?float
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(float $porcentaje): static
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }
}

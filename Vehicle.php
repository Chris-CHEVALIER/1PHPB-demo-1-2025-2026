<?php

class Vehicle
{
    # Propriétés 
    private int $id;
    private string $brand;
    private string $model;
    private int $doorsNumber;
    private string $color;
    private int $horses;
    private string $image;

    # Méthodes
    public function __construct(int $id, string $brand, string $model, int $doorsNumber, string $color, int $horses, string $image)
    {
        $this->setId($id);
        $this->setBrand($brand);
        $this->setModel($model);
        $this->setDoorsNumber($doorsNumber);
        $this->setColor($color);
        $this->setHorses($horses);
        $this->setImage($image);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getDoorsNumber(): int
    {
        return $this->doorsNumber;
    }

    public function setDoorsNumber(int $doorsNumber): self
    {
        $this->doorsNumber = $doorsNumber;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getHorses(): int
    {
        return $this->horses;
    }

    public function setHorses(int $horses): self
    {
        $this->horses = $horses;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
}

<?php

class VehicleController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "speed-2000";
        $port = 8889;
        $username = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $username, $password));
        } catch (PDOException $error) {
            echo "<p style='color: red'>{$error->getMessage()}</p>";
        }
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function setDb(PDO $db): self
    {
        $this->db = $db;
        return $this;
    }

    public function read(int $id): Vehicle
    {
        $req = $this->getDb()->prepare("SELECT * FROM `vehicles` WHERE id = ?");
        $req->execute([$id]);
        $data = $req->fetch();
        return new Vehicle($data);
    }

    public function readAll(): array
    {
        $vehicles = [];
        $req = $this->getDb()->prepare("SELECT * FROM `vehicles`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $newVehicle = new Vehicle($data);
            array_push($vehicles, $newVehicle);
        }
        return $vehicles;
    }

    public function create(Vehicle $vehicle)
    {
        $req = $this->getDb()->prepare("INSERT INTO `vehicles` (brand, model, doorsNumber, color, horses, image, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute([$vehicle->getBrand(), $vehicle->getModel(), $vehicle->getDoorsNumber(), $vehicle->getColor(), $vehicle->getHorses(), $vehicle->getImage(), $vehicle->getPrice()]);
    }

    public function update(Vehicle $updatedVehicle)
    {
        $req = $this->getDb()->prepare("UPDATE `vehicles` SET brand = ?, model = ?, doorsNumber = ?, color = ?, horses = ?, image = ?, price = ? WHERE id = ?");
        $req->execute([$updatedVehicle->getBrand(), $updatedVehicle->getModel(), $updatedVehicle->getDoorsNumber(), $updatedVehicle->getColor(), $updatedVehicle->getHorses(), $updatedVehicle->getImage(), $updatedVehicle->getPrice(), $updatedVehicle->getId()]);
    }

    public function delete(int $id)
    {
        $req = $this->getDb()->prepare("DELETE FROM `vehicles` WHERE id = ?");
        $req->execute([$id]);
    }
}

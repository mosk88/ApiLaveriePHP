<?php

namespace Src\Manager;
use Src\Entity\Service;


/**
 * ServiceManager representera un outil permettant de faire les requetes relatives a l'Entity Service
 */
class ServiceManager extends DataBaseManager
{
    public function findAll()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM service");
        $query->execute([]);

        $results = $query->fetchAll();
        $services = [];

        foreach ($results as $result) {
            $services[] = Service::fromArray($result);
        }
        
        return $services;
    }

    public function findById(int $service_id)
    {

        $query = $this->getConnection()->prepare("SELECT * FROM service WHERE service_id = :id");
        $query->execute([":id" => $service_id]);

        //Convertir le resultat de la requete en Objet
        return Service::fromArray($query->fetch());
    }

    public function add(Service $service)
    {
       try {
        $query = $this->getConnection()->prepare("INSERT INTO service (service_name,service_price) VALUES (:service_name,:service_price)");
        $query->execute([
            ":service_name" => $service->getService_name(),
            ":service_price" => $service->getService_price()       
        ]);
        return true;
    }
        catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
    public function edit(Service $service)
    {
        $query = $this->getConnection()->prepare("UPDATE service SET service_name = :service_name, service_price = :service_price WHERE id = :id");
        $query->execute([
            ":id" => $service->getservice_Id(),
            ":service_name" => $service->getService_name(),
            ":service_price" => $service->getService_price(),
            
        ]);
    }

    public function delete(int $id)
    {
        $query = $this->getConnection()->prepare("DELETE FROM service WHERE id = :id");
        $query->execute([
            ":id" => $id
        ]);
    }
}

<?php

namespace App;

use Core\Repository\RepositoryManagerTrait;
use App\Repository\AdressRepository;
use App\Repository\EquipementRepository;
use App\Repository\FavorisRepository;
use App\Repository\LogementEquipementRepository;
use App\Repository\LogementRepository;
use App\Repository\MediaRepository;
use App\Repository\ReservationRepository;
use App\Repository\TypeLogementRepository;
use App\Repository\UserRepository;

class AppRepoManager
{
    // Utilisation du trait RepositoryManagerTrait pour simplifier la gestion des repositories
    use RepositoryManagerTrait;

    // Déclaration des propriétés privées pour chaque repository
    private AdressRepository $adressRepository;
    private EquipementRepository $equipementRepository;
    private FavorisRepository $favorisRepository;
    private LogementEquipementRepository $logementEquipementRepository;
    private LogementRepository $logementRepository;
    private MediaRepository $mediaRepository;
    private ReservationRepository $reservationRepository;
    private TypeLogementRepository $typeLogementRepository;
    private UserRepository $userRepository;

    // Constructeur pour initialiser les repositories avec la configuration de l'application
    protected function __construct()
    {
        // Récupération de la configuration de l'application
        $config = App::getApp();

        // Initialisation de chaque repository avec la configuration
        $this->adressRepository = new AdressRepository($config);
        $this->equipementRepository = new EquipementRepository($config);
        $this->favorisRepository = new FavorisRepository($config);
        $this->logementEquipementRepository = new LogementEquipementRepository($config);
        $this->logementRepository = new LogementRepository($config);
        $this->mediaRepository = new MediaRepository($config);
        $this->reservationRepository = new ReservationRepository($config);
        $this->typeLogementRepository = new TypeLogementRepository($config);
        $this->userRepository = new UserRepository($config);
    }

    // Getters pour accéder aux instances des repositories

    public function getAdressRepository(): AdressRepository
    {
        return $this->adressRepository;
    }

    public function getEquipementRepository(): EquipementRepository
    {
        return $this->equipementRepository;
    }

    public function getFavorisRepository(): FavorisRepository
    {
        return $this->favorisRepository;
    }

    public function getLogementEquipementRepository(): LogementEquipementRepository
    {
        return $this->logementEquipementRepository;
    }

    public function getLogementRepository(): LogementRepository
    {
        return $this->logementRepository;
    }

    public function getMediaRepository(): MediaRepository
    {
        return $this->mediaRepository;
    }

    public function getReservationRepository(): ReservationRepository
    {
        return $this->reservationRepository;
    }

    public function getTypeLogementRepository(): TypeLogementRepository
    {
        return $this->typeLogementRepository;
    }

    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }
}

?>

<?php

namespace App;

use App\Repository\EquipementsRepository;
use App\Repository\InformationRepository;
use App\Repository\LogementEquipementRepository;
use App\Repository\LogementRepository;
use App\Repository\MediaRepository;
use App\Repository\ReservationsRepository;
use App\Repository\TypeLogementRepository;
use App\Repository\UserRepository;
use Core\Repository\RepositoryManagerTrait;

class AppRepoManager
{
  //on récupère le trait RepositoryManagerTrait
  use RepositoryManagerTrait;

  private EquipementsRepository $equipementsRepository;
  private InformationRepository $informationRepository;
  private LogementEquipementRepository $logementEquipementRepository;
  private LogementRepository $logementRepository;
  private MediaRepository $mediaRepository;
  private ReservationsRepository $reservationsRepository;
  private TypeLogementRepository $typeLogementRepository;
  private UserRepository $userRepository;

  public function getEquipementsRepository(): EquipementsRepository
  {
    return $this->equipementsRepository;
  }

  public function getAddressRepository(): InformationRepository
  {
    return $this->informationRepository;
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

  public function getReservationsRepository(): ReservationsRepository
  {
    return $this->reservationsRepository;
  }

  public function getTypeLogementRepository(): TypeLogementRepository
  {
    return $this->typeLogementRepository;
  }

  public function getUserRepository(): UserRepository
  {
    return $this->userRepository;
  }

  protected function __construct()
  {
    $config = App::getApp();

    $this->equipementsRepository = new EquipementsRepository($config);
    $this->informationRepository = new InformationRepository($config);
    $this->logementEquipementRepository = new LogementEquipementRepository($config);
    $this->logementRepository = new LogementRepository($config);
    $this->mediaRepository = new MediaRepository($config);
    $this->reservationsRepository = new ReservationsRepository($config);
    $this->typeLogementRepository = new TypeLogementRepository($config);
    $this->userRepository = new UserRepository($config);
  }
}

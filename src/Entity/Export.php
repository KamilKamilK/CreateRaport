<?php

namespace App\Entity;

use App\Repository\ExportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExportRepository::class)
 */
class Export
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="Nazwa", type="string", length=255)
     */
    public $name;
    /**
     * @ORM\Column(name="Data", type="date")
     */
    public $date;
    /**
     * @ORM\Column(name="Godzina", type="time")
     */
    private $hour;
    /**
     * @ORM\Column(name="Użytkownik", type="string")
     */
    private $user;
    /**
     * @ORM\Column(name="Lokal", type="string",length=255)
     */
    private $placeName;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $time
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour): void
    {
        $this->hour = $hour;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @param string $placeName
     */
    public function setPlaceName($placeName): void
    {
        $this->placeName = $placeName;
    }

    /**
     * @return string
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }
}

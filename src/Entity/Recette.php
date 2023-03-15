<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Validator\Constraints\DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
#[Vich\Uploadable]

class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 500)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Time = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $file = null;

    #[Vich\UploadableField(mapping: 'recette_images', fileNameProperty: 'file')]
    private ?File $imageFile = null;


    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $timeZone = new \DateTimeZone('Europe/Paris');
        $this->createdAt = new \DateTime('now', $timeZone);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->Time;
    }

    public function getToStringTime(): ?string
    {
        return $this->Time->format("H:i");
    }

    public function setTime(\DateTimeInterface $Time): self
    {
        $this->Time = $Time;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $time): self
    {
        $this->createdAt = $time ;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @throws \Exception
     */
    public function setImageFile(?File $file): self
    {
        $this->imageFile = $file;
        if ($file) {
            $this->createdAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        }
        return $this;
    }
}

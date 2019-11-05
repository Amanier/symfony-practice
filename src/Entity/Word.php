<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WordsRepository")
 */
class Word
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $french;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $english;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrench(): ?string
    {
        return $this->french;
    }

    public function setFrench(string $french): self
    {
        $this->french = $french;

        return $this;
    }

    public function getEnglish(): ?string
    {
        return $this->english;
    }

    public function setEnglish(string $english): self
    {
        $this->english = $english;

        return $this;
    }
}

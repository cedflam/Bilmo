<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;


/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 * @ORM\Table()
 *
 *
 * @Hateoas\Relation(
 *     "self",
 *     href = @Hateoas\Route(
 *          "api_phone_show",
 *          parameters = {"id" = "expr(object.getId())"},
 *          absolute = true
 *      )
 * )
 *
 */
class Phone
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Serializer\Groups("detail")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $camera;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $screen;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $processor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $memory;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups("detail")
     *
     */
    private $battery;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCamera(): ?string
    {
        return $this->camera;
    }

    public function setCamera(string $camera): self
    {
        $this->camera = $camera;

        return $this;
    }

    public function getScreen(): ?string
    {
        return $this->screen;
    }

    public function setScreen(string $screen): self
    {
        $this->screen = $screen;

        return $this;
    }

    public function getProcessor(): ?string
    {
        return $this->processor;
    }

    public function setProcessor(string $processor): self
    {
        $this->processor = $processor;

        return $this;
    }

    public function getMemory(): ?string
    {
        return $this->memory;
    }

    public function setMemory(string $memory): self
    {
        $this->memory = $memory;

        return $this;
    }

    public function getBattery(): ?string
    {
        return $this->battery;
    }

    public function setBattery(string $battery): self
    {
        $this->battery = $battery;

        return $this;
    }
}

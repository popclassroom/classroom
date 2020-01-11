<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $instruction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityExo", mappedBy="activity")
     */
    private $activityExos;

    public function __construct()
    {
        $this->activityExos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): self
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * @return Collection|ActivityExo[]
     */
    public function getActivityExos(): Collection
    {
        return $this->activityExos;
    }

    public function addActivityExo(ActivityExo $activityExo): self
    {
        if (!$this->activityExos->contains($activityExo)) {
            $this->activityExos[] = $activityExo;
            $activityExo->setActivity($this);
        }

        return $this;
    }

    public function removeActivityExo(ActivityExo $activityExo): self
    {
        if ($this->activityExos->contains($activityExo)) {
            $this->activityExos->removeElement($activityExo);
            // set the owning side to null (unless already changed)
            if ($activityExo->getActivity() === $this) {
                $activityExo->setActivity(null);
            }
        }

        return $this;
    }
}

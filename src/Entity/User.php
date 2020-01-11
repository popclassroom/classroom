<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Course", mappedBy="authors")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityExo", mappedBy="author")
     */
    private $activityExos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityCorrection", mappedBy="author")
     */
    private $activityCorrections;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->activityExos = new ArrayCollection();
        $this->activityCorrections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addAuthor($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            $course->removeAuthor($this);
        }

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
            $activityExo->setAuthor($this);
        }

        return $this;
    }

    public function removeActivityExo(ActivityExo $activityExo): self
    {
        if ($this->activityExos->contains($activityExo)) {
            $this->activityExos->removeElement($activityExo);
            // set the owning side to null (unless already changed)
            if ($activityExo->getAuthor() === $this) {
                $activityExo->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ActivityCorrection[]
     */
    public function getActivityCorrections(): Collection
    {
        return $this->activityCorrections;
    }

    public function addActivityCorrection(ActivityCorrection $activityCorrection): self
    {
        if (!$this->activityCorrections->contains($activityCorrection)) {
            $this->activityCorrections[] = $activityCorrection;
            $activityCorrection->setAuthor($this);
        }

        return $this;
    }

    public function removeActivityCorrection(ActivityCorrection $activityCorrection): self
    {
        if ($this->activityCorrections->contains($activityCorrection)) {
            $this->activityCorrections->removeElement($activityCorrection);
            // set the owning side to null (unless already changed)
            if ($activityCorrection->getAuthor() === $this) {
                $activityCorrection->setAuthor(null);
            }
        }

        return $this;
    }
}

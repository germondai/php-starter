<?php

declare(strict_types=1);

namespace Api\Entity;

use Api\BaseEntity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User extends BaseEntity
{
    #[ORM\Column(type: 'string', length: 256)]
    private string $name;

    #[ORM\Column(type: 'string', length: 256)]
    private string $surname;

    #[ORM\Column(type: 'string', length: 256, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 256)]
    private string $password;

    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'user')]
    private Collection $articles;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // Articles
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): User
    {
        $article->setUser($this);

        $this->articles->add($article);

        return $this;
    }

    public function removeArticle(Article $article): void
    {
        $this->articles->removeElement($article);
    }
}

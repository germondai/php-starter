<?php

declare(strict_types=1);

namespace Api;

use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
class BaseEntity
{
    /** @var int */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime')]
    private \DateTime $createdAt;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime')]
    private \DateTime $updatedAt;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private \DateTime $deletedAt;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(): \DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}

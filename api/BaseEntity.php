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
    protected int|null $id = null;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime')]
    protected \DateTime $createdAt;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected \DateTime $updatedAt;

    /** @var \DateTime */
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected \DateTime $deletedAt;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getDeletedAt(): \DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}

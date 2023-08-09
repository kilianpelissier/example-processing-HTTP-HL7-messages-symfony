<?php

namespace App\Entity;

use App\Repository\MessageInfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageInfoInfoRepository::class)]
class MessageInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MessageInfoType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Application = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ReceivingFacility = null;

    #[ORM\Column(length:50, nullable: true)]
    private ?string $RecordedDateTime = null;

    #[ORM\Column(length: 8000)]
    private ?string $Content = null;

    #[ORM\Column(length: 255)]
    private ?string $ControlId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageInfoType(): ?string
    {
        return $this->MessageInfoType;
    }

    public function setMessageInfoType(?string $MessageInfoType): self
    {
        $this->MessageInfoType = $MessageInfoType;

        return $this;
    }

    public function getApplication(): ?string
    {
        return $this->Application;
    }

    public function setApplication(?string $Application): self
    {
        $this->Application = $Application;

        return $this;
    }

    public function getReceivingFacility(): ?string
    {
        return $this->ReceivingFacility;
    }

    public function setReceivingFacility(?string $ReceivingFacility): self
    {
        $this->ReceivingFacility = $ReceivingFacility;

        return $this;
    }

    public function getRecordedDateTime(): ?string
    {
        return $this->RecordedDateTime;
    }

    public function setRecordedDateTime(?string $RecordedDateTime): self
    {
        $this->RecordedDateTime = $RecordedDateTime;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getControlId(): ?string
    {
        return $this->ControlId;
    }

    public function setControlId(string $ControlId): self
    {
        $this->ControlId = $ControlId;

        return $this;
    }

    
}

<?php

namespace App\Entity;

use App\Repository\PatientIdentificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientIdentificationRepository::class)]
class PatientIdentification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length:150, nullable: false)]
    private ?string $IPP = null;

    #[ORM\Column(length:150, nullable: true)]
    private ?string $SetIdPatient = null;

    #[ORM\Column(length:150, nullable: true)]
    private ?string $PatientId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PatientIdentifierList = null;

    #[ORM\Column(length:150, nullable: true)]
    private ?string $AlternatePatientId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PatientName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MotherMaidenName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DateTimeOfBirth = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $AdministrativeSex = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PatientAlias = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ethnicity = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $PatientAdress = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $CountryCode = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $PhoneNumberHome = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $PhoneNumberBusiness = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $PrimaryLanguage = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $MaritalStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Religion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PatientAccountNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SSNnumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DriverLicenceNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MotherIdentifier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $EthnicGroup = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $BirthPlace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MultipleBirth = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $MultipleBirthIndicator = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $BirthOrder = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Citizenship = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VeteransMilitaryStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nationality = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $PatientDeathDateTime = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PatientDeathIndicator = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $IdentityUnknownIndicator = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $IdentityReliabilityCode = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $LastUpdateDateTime = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LastUpdateFacility = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ProductionClassCode = null;

    #[ORM\Column(nullable: true)]
    private ?bool $InVisit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSetIdPatient(): ?string
    {
        return $this->SetIdPatient;
    }

    public function setSetIdPatient(string $SetIdPatient): self
    {
        $this->SetIdPatient = $SetIdPatient;

        return $this;
    }

    public function getPatientId(): ?string
    {
        return $this->PatientId;
    }

    public function setPatientId(string $PatientId): self
    {
        $this->PatientId = $PatientId;

        return $this;
    }

    public function getPatientIdentifierList(): ?string
    {
        return $this->PatientIdentifierList;
    }

    public function setPatientIdentifierList(?string $PatientIdentifierList): self
    {
        $this->PatientIdentifierList = $PatientIdentifierList;

        return $this;
    }

    public function getAlternatePatientId(): ?string
    {
        return $this->AlternatePatientId;
    }

    public function setAlternatePatientId(?string $AlternatePatientId): self
    {
        $this->AlternatePatientId = $AlternatePatientId;

        return $this;
    }

    public function getPatientName(): ?string
    {
        return $this->PatientName;
    }

    public function setPatientName(?string $PatientName): self
    {
        $this->PatientName = $PatientName;

        return $this;
    }

    public function getMotherMaidenName(): ?string
    {
        return $this->MotherMaidenName;
    }

    public function setMotherMaidenName(?string $MotherMaidenName): self
    {
        $this->MotherMaidenName = $MotherMaidenName;

        return $this;
    }

    public function getDateTimeOfBirth(): ?string
    {
        return $this->DateTimeOfBirth;
    }

    public function setDateTimeOfBirth(?string $DateTimeOfBirth): self
    {
        $this->DateTimeOfBirth = $DateTimeOfBirth;

        return $this;
    }

    public function getAdministrativeSex(): ?string
    {
        return $this->AdministrativeSex;
    }

    public function setAdministrativeSex(?string $AdministrativeSex): self
    {
        $this->AdministrativeSex = $AdministrativeSex;

        return $this;
    }

    public function getPatientAlias(): ?string
    {
        return $this->PatientAlias;
    }

    public function setPatientAlias(?string $PatientAlias): self
    {
        $this->PatientAlias = $PatientAlias;

        return $this;
    }

    public function getEthnicity(): ?string
    {
        return $this->Ethnicity;
    }

    public function setEthnicity(?string $Ethnicity): self
    {
        $this->Ethnicity = $Ethnicity;

        return $this;
    }

    public function getPatientAdress(): ?string
    {
        return $this->PatientAdress;
    }

    public function setPatientAdress(?string $PatientAdress): self
    {
        $this->PatientAdress = $PatientAdress;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->CountryCode;
    }

    public function setCountryCode(?string $CountryCode): self
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    public function getPhoneNumberHome(): ?string
    {
        return $this->PhoneNumberHome;
    }

    public function setPhoneNumberHome(?string $PhoneNumberHome): self
    {
        $this->PhoneNumberHome = $PhoneNumberHome;

        return $this;
    }

    public function getPhoneNumberBusiness(): ?string
    {
        return $this->PhoneNumberBusiness;
    }

    public function setPhoneNumberBusiness(?string $PhoneNumberBusiness): self
    {
        $this->PhoneNumberBusiness = $PhoneNumberBusiness;

        return $this;
    }

    public function getPrimaryLanguage(): ?string
    {
        return $this->PrimaryLanguage;
    }

    public function setPrimaryLanguage(?string $PrimaryLanguage): self
    {
        $this->PrimaryLanguage = $PrimaryLanguage;

        return $this;
    }

    public function getMaritalStatus(): ?string
    {
        return $this->MaritalStatus;
    }

    public function setMaritalStatus(?string $MaritalStatus): self
    {
        $this->MaritalStatus = $MaritalStatus;

        return $this;
    }

    public function getReligion(): ?string
    {
        return $this->Religion;
    }

    public function setReligion(?string $Religion): self
    {
        $this->Religion = $Religion;

        return $this;
    }

    public function getPatientAccountNumber(): ?string
    {
        return $this->PatientAccountNumber;
    }

    public function setPatientAccountNumber(string $PatientAccountNumber): self
    {
        $this->PatientAccountNumber = $PatientAccountNumber;

        return $this;
    }

    public function getSSNnumber(): ?string
    {
        return $this->SSNnumber;
    }

    public function setSSNnumber(?string $SSNnumber): self
    {
        $this->SSNnumber = $SSNnumber;

        return $this;
    }

    public function getDriverLicenceNumber(): ?string
    {
        return $this->DriverLicenceNumber;
    }

    public function setDriverLicenceNumber(?string $DriverLicenceNumber): self
    {
        $this->DriverLicenceNumber = $DriverLicenceNumber;

        return $this;
    }

    public function getMotherIdentifier(): ?string
    {
        return $this->MotherIdentifier;
    }

    public function setMotherIdentifier(?string $MotherIdentifier): self
    {
        $this->MotherIdentifier = $MotherIdentifier;

        return $this;
    }

    public function getEthnicGroup(): ?string
    {
        return $this->EthnicGroup;
    }

    public function setEthnicGroup(?string $EthnicGroup): self
    {
        $this->EthnicGroup = $EthnicGroup;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->BirthPlace;
    }

    public function setBirthPlace(?string $BirthPlace): self
    {
        $this->BirthPlace = $BirthPlace;

        return $this;
    }

    public function getMultipleBirth(): ?string
    {
        return $this->MultipleBirth;
    }

    public function setMultipleBirth(?string $MultipleBirth): self
    {
        $this->MultipleBirth = $MultipleBirth;

        return $this;
    }

    public function getMultipleBirthIndicator(): ?string
    {
        return $this->MultipleBirthIndicator;
    }

    public function setMultipleBirthIndicator(?string $MultipleBirthIndicator): self
    {
        $this->MultipleBirthIndicator = $MultipleBirthIndicator;

        return $this;
    }

    public function getBirthOrder(): ?string
    {
        return $this->BirthOrder;
    }

    public function setBirthOrder(?string $BirthOrder): self
    {
        $this->BirthOrder = $BirthOrder;

        return $this;
    }

    public function getCitizenship(): ?string
    {
        return $this->Citizenship;
    }

    public function setCitizenship(?string $Citizenship): self
    {
        $this->Citizenship = $Citizenship;

        return $this;
    }

    public function getVeteransMilitaryStatus(): ?string
    {
        return $this->VeteransMilitaryStatus;
    }

    public function setVeteransMilitaryStatus(?string $VeteransMilitaryStatus): self
    {
        $this->VeteransMilitaryStatus = $VeteransMilitaryStatus;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(?string $Nationality): self
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function getPatientDeathDateTime(): ?string
    {
        return $this->PatientDeathDateTime;
    }

    public function setPatientDeathDateTime(?string $PatientDeathDateTime): self
    {
        $this->PatientDeathDateTime = $PatientDeathDateTime;

        return $this;
    }

    public function getPatientDeathIndicator(): ?string
    {
        return $this->PatientDeathIndicator;
    }

    public function setPatientDeathIndicator(?string $PatientDeathIndicator): self
    {
        $this->PatientDeathIndicator = $PatientDeathIndicator;

        return $this;
    }

    public function getIdentityUnknownIndicator(): ?string
    {
        return $this->IdentityUnknownIndicator;
    }

    public function setIdentityUnknownIndicator(?string $IdentityUnknownIndicator): self
    {
        $this->IdentityUnknownIndicator = $IdentityUnknownIndicator;

        return $this;
    }

    public function getIdentityReliabilityCode(): ?string
    {
        return $this->IdentityReliabilityCode;
    }

    public function setIdentityReliabilityCode(?string $IdentityReliabilityCode): self
    {
        $this->IdentityReliabilityCode = $IdentityReliabilityCode;

        return $this;
    }

    public function getLastUpdateDateTime(): ?string
    {
        return $this->LastUpdateDateTime;
    }

    public function setLastUpdateDateTime(?string $LastUpdateDateTime): self
    {
        $this->LastUpdateDateTime = $LastUpdateDateTime;

        return $this;
    }

    public function getLastUpdateFacility(): ?string
    {
        return $this->LastUpdateFacility;
    }

    public function setLastUpdateFacility(?string $LastUpdateFacility): self
    {
        $this->LastUpdateFacility = $LastUpdateFacility;

        return $this;
    }

    public function getProductionClassCode(): ?string
    {
        return $this->ProductionClassCode;
    }

    public function setProductionClassCode(?string $ProductionClassCode): self
    {
        $this->ProductionClassCode = $ProductionClassCode;

        return $this;
    }

    public function isInVisit(): ?bool
    {
        return $this->InVisit;
    }

    public function setInVisit(?bool $InVisit): self
    {
        $this->InVisit = $InVisit;

        return $this;
    }

    public function getIPP(): ?string
    {
        return $this->IPP;
    }

    public function setIPP(?string $IPP): self
    {
        $this->IPP = $IPP;

        return $this;
    }

}

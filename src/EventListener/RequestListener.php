<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Aranyasen\HL7; // HL7 factory class
use App\Entity\MessageInfo;
use App\Entity\PatientIdentification;
use Aranyasen\HL7\Message; // If Message is used
use Aranyasen\HL7\Segment; // If Segment is used
use Aranyasen\HL7\Segments\MSH; // If MSH is used
use Doctrine\ORM\EntityManagerInterface;


class RequestListener
{

    /* ------------- function __construct pour injecter l'entity manager ------------ */
    protected $em;
    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /* ------------- function onKernelRequest: get message info and persist it in database ------------ */
    public function onKernelRequest(RequestEvent $event)
    {
        // ----- get message info -----
        $message = HL7::from($event->getRequest()->getContent())->createMessage();
        // ----- persist message info -----
        $this->persistMessageInfo($message);
        // ----- write message info in log_mllp.txt -----
        $this->writeMessageLog($message);
        // ----- update patient identification -----
        $this->updatePatientIdentification($message);

    }
    

    /* ------------- function persistMessageInfo: persist message info in database ------------ */
    function persistMessageInfo(Message $message)
        {
            // ----- get message info -----
            $msh = $message->getFirstSegmentInstance("MSH");
            $typemsg = ($msh->getField(9))[1];
            $msgControlId = $msh->getMessageControlId();
            $msgAppli = $msh->getReceivingApplication();
            $dateTimeMessage = $msh->getDateTimeOfMessage();
            $msgContent = $message->toString();
            $receivingFacility = $msh->getReceivingFacility();
            // ----- persist message info -----
            $entityManager = $this->em;
            $messageInfo = new MessageInfo();
            $messageInfo->setId($msgControlId);
            $messageInfo->setControlId($msgControlId);
            $messageInfo->setMessageInfoType($typemsg);
            $messageInfo->setApplication($msgAppli);
            $messageInfo->setRecordedDateTime($dateTimeMessage);
            $messageInfo->setContent($msgContent);
            $messageInfo->setReceivingFacility($receivingFacility);
            $entityManager->persist($messageInfo);
            $entityManager->flush();
    }


    /* ------------- function writeMessageLog ------------ */
    // write message info in log_mllp.txt
    function writeMessageLog(Message $message){
        $msh = $message->getFirstSegmentInstance("MSH");
        $typemsg= ($msh->getField(9))[1];
        file_put_contents('../public/log_mllp.txt', "Ce message est de type: " . $typemsg . "\n");
        $msgControlId = $msh->getMessageControlId();
        $texte = file_get_contents('../public/log_mllp.txt');
        $texte .= "Message Control Id: " . $msgControlId . "\n";
        file_put_contents('../public/log_mllp.txt', $texte);
        $msgAppli = $msh->getReceivingApplication();
        $texte = file_get_contents('../public/log_mllp.txt');
        $texte .= "Sending Application: " . $msgAppli . "\n";
        file_put_contents('../public/log_mllp.txt', $texte);
        $dateTimeMessage = $msh->getDateTimeOfMessage();
        $texte = file_get_contents('../public/log_mllp.txt');
        $texte .= "Date et heure du message: " . $dateTimeMessage . "\n";
        file_put_contents('../public/log_mllp.txt', $texte);
        $msgContent = $message->toString();
        $texte = file_get_contents('../public/log_mllp.txt');
        $texte .= "Contenu du message: " . $msgContent . "\n";
        file_put_contents('../public/log_mllp.txt', $texte);
        $receivingFacility = $msh->getReceivingFacility();
        $texte = file_get_contents('../public/log_mllp.txt');
        $texte .= "Receiving Facility: " . $receivingFacility . "\n";
        file_put_contents('../public/log_mllp.txt', $texte);
    }


    /* ------------- function updatePatientIdentification ------------ */
    function updatePatientIdentification(Message $message){
        // si le patient est déjà dans la base de données, on ne le rajoute pas, on le supprime et on le rajoute
        $pid = $message->getFirstSegmentInstance("PID");
        $patientIPP = $pid->getField(3)[0];
        $entityManager = $this->em;
        $patient = $entityManager->getRepository(PatientIdentification::class)->findOneBy(['IPP' => $patientIPP]);
        if ($patient != null){
            $entityManager->remove($patient);
            $entityManager->flush();
        }
        // ----- get patient identification -----
        $patient = new PatientIdentification();
        $pid = $message->getFirstSegmentInstance("PID");
        // ajout des champs dans la table patient identification si ils ne sont pas à null
        if ($pid->getPatientID() != null) $patient->setPatientId($this->getStringSegment($pid->getPatientID()));
        // add ipp
        if ($pid->getField(3) != null) $patient->setIPP($this->getStringSegment($pid->getField(3)[0]));
        if ($pid->getPatientIdentifierList() != null) $patient->setPatientIdentifierList($this->getStringSegment($pid->getPatientIdentifierList()));
        if ($pid->getAlternatePatientId() != null) $patient->setAlternatePatientId($this->getStringSegment($pid->getAlternatePatientId()));
        if ($pid->getPatientName() != null) $patient->setPatientName($this->getStringSegment($pid->getPatientName()));
        if ($pid->getMothersMaidenName() != null) $patient->setMotherMaidenName($this->getStringSegment($pid->getMothersMaidenName()));
        if ($pid->getDateTimeOfBirth() != null) $patient->setDateTimeOfBirth($this->getStringSegment($pid->getDateTimeOfBirth()));
        if ($pid->getSex() != null) $patient->setAdministrativeSex($this->getStringSegment($pid->getSex()));
        if ($pid->getPatientAlias() != null) $patient->setPatientAlias($this->getStringSegment($pid->getPatientAlias()));
        if ($pid->getRace() != null) $patient->setEthnicity($this->getStringSegment($pid->getRace()));
        if ($pid->getPatientAddress() != null) $patient->setPatientAdress($this->getStringSegment($pid->getPatientAddress()));
        if ($pid->getCountryCode() != null) $patient->setCountryCode($this->getStringSegment($pid->getCountryCode()));
        if ($pid->getPhoneNumberHome() != null) $patient->setPhoneNumberHome($this->getStringSegment($pid->getPhoneNumberHome()));
        if ($pid->getPhoneNumberBusiness() != null) $patient->setPhoneNumberBusiness($this->getStringSegment($pid->getPhoneNumberBusiness()));
        if ($pid->getPrimaryLanguage() != null) $patient->setPrimaryLanguage($this->getStringSegment($pid->getPrimaryLanguage()));
        if ($pid->getMaritalStatus() != null) $patient->setMaritalStatus($this->getStringSegment($pid->getMaritalStatus()));
        if ($pid->getReligion() != null) $patient->setReligion($this->getStringSegment($pid->getReligion()));
        if ($pid->getPatientAccountNumber() != null) $patient->setPatientAccountNumber($this->getStringSegment($pid->getPatientAccountNumber()));
        if ($pid->getSSNNumber() != null) $patient->setSSNnumber($this->getStringSegment($pid->getSSNNumber()));
        if ($pid->getDriversLicenseNumber() != null) $patient->setDriverLicenceNumber($this->getStringSegment($pid->getDriversLicenseNumber()));
        if ($pid->getMothersIdentifier() != null) $patient->setMotherIdentifier($this->getStringSegment($pid->getMothersIdentifier()));
        if ($pid->getEthnicGroup() != null) $patient->setEthnicGroup($this->getStringSegment($pid->getEthnicGroup()));
        if ($pid->getBirthPlace() != null) $patient->setBirthPlace($this->getStringSegment($pid->getBirthPlace()));
        if ($pid->getMultipleBirthIndicator() != null) $patient->setMultipleBirthIndicator($this->getStringSegment($pid->getMultipleBirthIndicator()));
        if ($pid->getBirthOrder() != null) $patient->setBirthOrder($this->getStringSegment($pid->getBirthOrder()));
        if ($pid->getCitizenship() != null) $patient->setCitizenship($this->getStringSegment($pid->getCitizenship()));
        if ($pid->getVeteransMilitaryStatus() != null) $patient->setVeteransMilitaryStatus($this->getStringSegment($pid->getVeteransMilitaryStatus()));
        if ($pid->getNationality() != null) $patient->setNationality($this->getStringSegment($pid->getNationality()));
        if ($pid->getPatientDeathDateAndTime() != null) $patient->setPatientDeathDateTime($this->getStringSegment($pid->getPatientDeathDateAndTime()));
        if ($pid->getPatientDeathIndicator() != null) $patient->setPatientDeathIndicator($this->getStringSegment($pid->getPatientDeathIndicator()));
        // certains paramètres du segment ne sont pas dans le module HL7, à rajouter plus tard si besoin (ex: identityUnknownIndicator)
        // ----- persist patient identification -----
        $patient->setInVisit($this->isInVisit($message));
        $entityManager = $this->em;
        $entityManager->persist($patient);
        $entityManager->flush();
    }

    /* ------------- function isInVisit ------------ */
    // return true or false
    function isInVisit(Message $message){
        $msh = $message->getFirstSegmentInstance("MSH");
        $typemsg = ($msh->getField(9))[1];
        // if message field is A01 or A02 or A13 or A28 or A31 or Z99
        if ($typemsg == "A01" || $typemsg == "A02" || $typemsg == "A13" || $typemsg == "A28" || $typemsg == "A31" || $typemsg == "Z99"){
            return true;
        }
        else{
            return false;
        }
    }

    /* ------------- function getStringSegment ------------ */
    // return string or jsonencode if it's an array
    function getStringSegment($segment){
        if (gettype($segment) == "array") return json_encode($segment);
        elseif ($segment != null) return $segment;
    }

}

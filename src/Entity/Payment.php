<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 * @ApiResource()
 */
class Payment {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"read:project"})
   */
  private $name;

  /**
   * @ORM\Column(type="integer")
   * @Groups({"read:project"})
   */
  private $percent;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step1Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step1Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step1Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step1State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step1DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step2Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step2Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step2Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step2State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step2DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step3Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step3Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step3Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step3State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step3DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step4Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step4Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step4Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step4State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step4DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step5Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step5Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step5Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step5State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step5DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step6Name;

  /**
   * @ORM\Column(type="integer")
   */
  private $step6Amount;

  /**
   * @ORM\Column(type="float")
   */
  private $step6Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step6State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step6DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step7Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step7Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step7Percentage;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step7State;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step7DatePaiement;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $step8Name;

  /**
   * @ORM\Column(type="float")
   */
  private $step8Amount;

  /**
   * @ORM\Column(type="integer")
   */
  private $step8Percentage;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $step8DatePaiement;

  /**
   * @ORM\Column(type="boolean")
   */
  private $step8State;



  public function getId(): ?int {
    return $this->id;
  }

  public function getName(): ?string {
    return $this->name;
  }

  public function setName(string $name): self {
    $this->name = $name;

    return $this;
  }

  public function getPercent(): ?int {
    return $this->percent;
  }

  public function setPercent(int $percent): self {
    $this->percent = $percent;

    return $this;
  }


  public function __toString() {
    return $this->getName();
  }

  /**
   * @return mixed
   */
  public function getStep1Name() {
    return $this->step1Name;
  }

  /**
   * @param mixed $step1Name
   *
   * @return Payment
   */
  public function setStep1Name($step1Name) {
    $this->step1Name = $step1Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep1Percentage() {
    return $this->step1Percentage;
  }

  /**
   * @param mixed $step1Percentage
   *
   * @return Payment
   */
  public function setStep1Percentage($step1Percentage) {
    $this->step1Percentage = $step1Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep1State() {
    return $this->step1State;
  }

  /**
   * @param mixed $step1State
   *
   * @return Payment
   */
  public function setStep1State($step1State) {
    $this->step1State = $step1State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep2Name() {
    return $this->step2Name;
  }

  /**
   * @param mixed $step2Name
   *
   * @return Payment
   */
  public function setStep2Name($step2Name) {
    $this->step2Name = $step2Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep2Percentage() {
    return $this->step2Percentage;
  }

  /**
   * @param mixed $step2Percentage
   *
   * @return Payment
   */
  public function setStep2Percentage($step2Percentage) {
    $this->step2Percentage = $step2Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep2State() {
    return $this->step2State;
  }

  /**
   * @param mixed $step2State
   *
   * @return Payment
   */
  public function setStep2State($step2State) {
    $this->step2State = $step2State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep3Name() {
    return $this->step3Name;
  }

  /**
   * @param mixed $step3Name
   *
   * @return Payment
   */
  public function setStep3Name($step3Name) {
    $this->step3Name = $step3Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep3Percentage() {
    return $this->step3Percentage;
  }

  /**
   * @param mixed $step3Percentage
   *
   * @return Payment
   */
  public function setStep3Percentage($step3Percentage) {
    $this->step3Percentage = $step3Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep3State() {
    return $this->step3State;
  }

  /**
   * @param mixed $step3State
   *
   * @return Payment
   */
  public function setStep3State($step3State) {
    $this->step3State = $step3State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep4Name() {
    return $this->step4Name;
  }

  /**
   * @param mixed $step4Name
   *
   * @return Payment
   */
  public function setStep4Name($step4Name) {
    $this->step4Name = $step4Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep4Percentage() {
    return $this->step4Percentage;
  }

  /**
   * @param mixed $step4Percentage
   *
   * @return Payment
   */
  public function setStep4Percentage($step4Percentage) {
    $this->step4Percentage = $step4Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep4State() {
    return $this->step4State;
  }

  /**
   * @param mixed $step4State
   *
   * @return Payment
   */
  public function setStep4State($step4State) {
    $this->step4State = $step4State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep5Name() {
    return $this->step5Name;
  }

  /**
   * @param mixed $step5Name
   *
   * @return Payment
   */
  public function setStep5Name($step5Name) {
    $this->step5Name = $step5Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep5Percentage() {
    return $this->step5Percentage;
  }

  /**
   * @param mixed $step5Percentage
   *
   * @return Payment
   */
  public function setStep5Percentage($step5Percentage) {
    $this->step5Percentage = $step5Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep5State() {
    return $this->step5State;
  }

  /**
   * @param mixed $step5State
   *
   * @return Payment
   */
  public function setStep5State($step5State) {
    $this->step5State = $step5State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep6Name() {
    return $this->step6Name;
  }

  /**
   * @param mixed $step6Name
   *
   * @return Payment
   */
  public function setStep6Name($step6Name) {
    $this->step6Name = $step6Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep6Percentage() {
    return $this->step6Percentage;
  }

  /**
   * @param mixed $step6Percentage
   *
   * @return Payment
   */
  public function setStep6Percentage($step6Percentage) {
    $this->step6Percentage = $step6Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep6State() {
    return $this->step6State;
  }

  /**
   * @param mixed $step6State
   *
   * @return Payment
   */
  public function setStep6State($step6State) {
    $this->step6State = $step6State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep7Name() {
    return $this->step7Name;
  }

  /**
   * @param mixed $step7Name
   *
   * @return Payment
   */
  public function setStep7Name($step7Name) {
    $this->step7Name = $step7Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep7Percentage() {
    return $this->step7Percentage;
  }

  /**
   * @param mixed $step7Percentage
   *
   * @return Payment
   */
  public function setStep7Percentage($step7Percentage) {
    $this->step7Percentage = $step7Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep7State() {
    return $this->step7State;
  }

  /**
   * @param mixed $step7State
   *
   * @return Payment
   */
  public function setStep7State($step7State) {
    $this->step7State = $step7State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep8Name() {
    return $this->step8Name;
  }

  /**
   * @param mixed $step8Name
   *
   * @return Payment
   */
  public function setStep8Name($step8Name) {
    $this->step8Name = $step8Name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep8Percentage() {
    return $this->step8Percentage;
  }

  /**
   * @param mixed $step8Percentage
   *
   * @return Payment
   */
  public function setStep8Percentage($step8Percentage) {
    $this->step8Percentage = $step8Percentage;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep8State() {
    return $this->step8State;
  }

  /**
   * @param mixed $step8State
   *
   * @return Payment
   */
  public function setStep8State($step8State) {
    $this->step8State = $step8State;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep1Amount() {
    return $this->step1Amount;
  }

  /**
   * @param mixed $step1Amount
   *
   * @return Payment
   */
  public function setStep1Amount($step1Amount) {
    $this->step1Amount = $step1Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep2Amount() {
    return $this->step2Amount;
  }

  /**
   * @param mixed $step2Amount
   *
   * @return Payment
   */
  public function setStep2Amount($step2Amount) {
    $this->step2Amount = $step2Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep3Amount() {
    return $this->step3Amount;
  }

  /**
   * @param mixed $step3Amount
   *
   * @return Payment
   */
  public function setStep3Amount($step3Amount) {
    $this->step3Amount = $step3Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep4Amount() {
    return $this->step4Amount;
  }

  /**
   * @param mixed $step4Amount
   *
   * @return Payment
   */
  public function setStep4Amount($step4Amount) {
    $this->step4Amount = $step4Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep5Amount() {
    return $this->step5Amount;
  }

  /**
   * @param mixed $step5Amount
   *
   * @return Payment
   */
  public function setStep5Amount($step5Amount) {
    $this->step5Amount = $step5Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep6Amount() {
    return $this->step6Amount;
  }

  /**
   * @param mixed $step6Amount
   *
   * @return Payment
   */
  public function setStep6Amount($step6Amount) {
    $this->step6Amount = $step6Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep7Amount() {
    return $this->step7Amount;
  }

  /**
   * @param mixed $step7Amount
   *
   * @return Payment
   */
  public function setStep7Amount($step7Amount) {
    $this->step7Amount = $step7Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep8Amount() {
    return $this->step8Amount;
  }

  /**
   * @param mixed $step8Amount
   *
   * @return Payment
   */
  public function setStep8Amount($step8Amount) {
    $this->step8Amount = $step8Amount;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep1DatePaiement() {
    return $this->step1DatePaiement;
  }

  /**
   * @param mixed $step1DatePaiement
   *
   * @return Payment
   */
  public function setStep1DatePaiement($step1DatePaiement) {
    $this->step1DatePaiement = $step1DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep2DatePaiement() {
    return $this->step2DatePaiement;
  }

  /**
   * @param mixed $step2DatePaiement
   *
   * @return Payment
   */
  public function setStep2DatePaiement($step2DatePaiement) {
    $this->step2DatePaiement = $step2DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep3DatePaiement() {
    return $this->step3DatePaiement;
  }

  /**
   * @param mixed $step3DatePaiement
   *
   * @return Payment
   */
  public function setStep3DatePaiement($step3DatePaiement) {
    $this->step3DatePaiement = $step3DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep4DatePaiement() {
    return $this->step4DatePaiement;
  }

  /**
   * @param mixed $step4DatePaiement
   *
   * @return Payment
   */
  public function setStep4DatePaiement($step4DatePaiement) {
    $this->step4DatePaiement = $step4DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep5DatePaiement() {
    return $this->step5DatePaiement;
  }

  /**
   * @param mixed $step5DatePaiement
   *
   * @return Payment
   */
  public function setStep5DatePaiement($step5DatePaiement) {
    $this->step5DatePaiement = $step5DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep6DatePaiement() {
    return $this->step6DatePaiement;
  }

  /**
   * @param mixed $step6DatePaiement
   *
   * @return Payment
   */
  public function setStep6DatePaiement($step6DatePaiement) {
    $this->step6DatePaiement = $step6DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep7DatePaiement() {
    return $this->step7DatePaiement;
  }

  /**
   * @param mixed $step7DatePaiement
   *
   * @return Payment
   */
  public function setStep7DatePaiement($step7DatePaiement) {
    $this->step7DatePaiement = $step7DatePaiement;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStep8DatePaiement() {
    return $this->step8DatePaiement;
  }

  /**
   * @param mixed $step8DatePaiement
   *
   * @return Payment
   */
  public function setStep8DatePaiement($step8DatePaiement) {
    $this->step8DatePaiement = $step8DatePaiement;
    return $this;
  }


}

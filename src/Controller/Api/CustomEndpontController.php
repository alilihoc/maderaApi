<?php


namespace App\Controller\Api;


use App\Entity\Coverage;
use App\Entity\Finition;
use App\Entity\Floor;
use App\Entity\Isolation;
use App\Entity\Payment;
use App\Entity\Plan;
use App\Entity\Project;
use App\Entity\Structure;
use App\Entity\Type;
use App\Service\Quotation\QuotationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CustomEndpontController extends AbstractController {

  /**
   * @Route("api/getAllModulesType", name="module_getAll", methods={"get"})
   * @param SerializerInterface $serializer
   *
   * @return JsonResponse
   */
  public function getAllModulesType(SerializerInterface $serializer) {
    $types = $this->getDoctrine()->getRepository(Type::class)->findAll();
    $return['type'] = $serializer->serialize($types, 'json', ['groups' => ['type:read']]);

    $floor = $this->getDoctrine()->getRepository(Floor::class)->findAll();
    $return['floor'] = $serializer->serialize($floor, 'json', ['groups' => ['floor:read']]);

    $coverage = $this->getDoctrine()->getRepository(Coverage::class)->findAll();
    $return['coverage'] = $serializer->serialize($coverage, 'json', ['groups' => ['coverage:read']]);

    $finition = $this->getDoctrine()->getRepository(Finition::class)->findAll();
    $return['finition'] = $serializer->serialize($finition, 'json', ['groups' => ['finition:read']]);

    $structure = $this->getDoctrine()
      ->getRepository(Structure::class)
      ->findAll();
    $return['structure'] = $serializer->serialize($structure, 'json', ['groups' => ['structure:read']]);

    $isolation = $this->getDoctrine()
      ->getRepository(Isolation::class)
      ->findAll();
    $return['isolation'] = $serializer->serialize($isolation, 'json', ['groups' => ['isolation:read']]);


    return new JsonResponse($return);
  }


  /**
   * @Route("api/quotationHtml/{id}", name="quotaion_html", methods={"GET"})
   *
   * @param Plan $plan
   * @param QuotationService $quotationService
   *
   * @return JsonResponse
   * @throws \Exception
   */
  public function quotation(Plan $plan, QuotationService $quotationService) {
    $quotationService->calculateQuotation($plan);
    if (!$plan->getQuotation()->getState() >= 1) {
      $plan->getQuotation()->setState(1);
    }

    $this->getDoctrine()->getManager()->flush();
    $html = $this->renderView('components/quotation.html.twig', [
      'plan' => $plan,
      'date' => new \DateTime(),
    ]);
    return new JsonResponse(['html' => $html]);
  }

  /**
   * @Route("api/getOrCreatePayment/{id}", name="payment_get", methods={"GET"})
   *
   * @param \App\Entity\Project $project
   * @param \Symfony\Component\Serializer\SerializerInterface $serializer
   *
   * @return JsonResponse
   */
  public function getOrCreatePayment(Project $project, SerializerInterface $serializer) {
    $payment = $project->getPayment();
    $manager = $this->getDoctrine()->getManager();

    if ($payment == NULL) {
      $totalPrice = $project->getPlan()->getQuotation()->getPrixTTC();
      $payment = new Payment();

      $payment->setStep1Name("Signature")
        ->setStep1Percentage(3)
        ->setStep1Amount($this->getStepPrice($totalPrice, 3))
        ->setStep1State(0);

      $payment->setStep2Name("Obtention du permis de construire")
        ->setStep2Percentage(7)
        ->setStep2Amount($this->getStepPrice($totalPrice, 7))
        ->setStep2State(0);

      $payment->setStep3Name("Ouverture du chantier")
        ->setStep3Percentage(5)
        ->setStep3Amount($this->getStepPrice($totalPrice, 5))
        ->setStep3State(0);

      $payment->setStep4Name("Achèvement des fondations")
        ->setStep4Percentage(10)
        ->setStep4Amount($this->getStepPrice($totalPrice, 10))
        ->setStep4State(0);

      $payment->setStep5Name("Achèvement des murs")
        ->setStep5Percentage(15)
        ->setStep5Amount($this->getStepPrice($totalPrice, 15))
        ->setStep5State(0);

      $payment->setStep6Name("Mise hors d’eau/hors d'air")
        ->setStep6Percentage(35)
        ->setStep6Amount($this->getStepPrice($totalPrice, 35))
        ->setStep6State(0);

      $payment->setStep7Name("Achèvement des travaux")
        ->setStep7Percentage(20)
        ->setStep7Amount($this->getStepPrice($totalPrice, 20))
        ->setStep7State(0);

      $payment->setStep8Name("Remise des clès")
        ->setStep8Percentage(5)
        ->setStep8Amount($this->getStepPrice($totalPrice, 5))
        ->setStep8State(0);

      $payment->setName("Payment")
        ->setPercent(0);

      $project->setPayment($payment);
      $manager->persist($payment);
      $manager->flush();

    }

    $json = $serializer->serialize($payment, 'json');
    return new JsonResponse($json);
  }

  private function getStepPrice($total, $percentage) {
    return $total * $percentage / 100;
  }

}
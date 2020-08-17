<?php
/**
 * Created by PhpStorm.
 * User: hocin
 * Date: 09/10/2019
 * Time: 15:30
 */

namespace App\Service\Quotation;


use App\Entity\Module;
use App\Entity\Plan;
use App\Entity\Quotation;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class QuotationService
{

    /**
     * @var int
     */
    private $priceHt = 0;

    /**
     * @var int
     */
    private $tva = 1.20;

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    private static $squareMeters = [
        "Plancher sur dalle",
        "Plancher porteur",
        "Couverture"
    ];

    /**
     * QuotationService constructor.
     * @param EntityManagerInterface $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;;
    }

    public function calculateQuotation(Plan $plan)
    {

        Foreach ($plan->getModules() as $module) {
            $modulePrice = $this->calculateModulePrice($module);
            $this->priceHt += $modulePrice;
        }

        $quotation = $plan->getQuotation() ? $plan->getQuotation() : new Quotation();
        $quotation->setPrixHT($this->priceHt)
            ->setPrixTTC($this->priceHt * $this->tva)
            ->setDateCreation(new \DateTime());
        $plan->setQuotation($quotation);
        $this->manager->persist($quotation);
        $this->manager->flush();

    }

    public function calculateModulePrice(Module $module)
    {
        $length = $module->getLength();
        if (in_array($module->getType()->getLabel(), $this::$squareMeters)) {
            $length = $length * $module->getWidth();
        }
        $finitionPrice = $module->getFinition() ? $length * $module->getFinition()->getPrice() : 0;
        $coveragePrice = $module->getCoverage() ? $length * $module->getCoverage()->getPrice() : 0;
        $floorPrice = ($module->getFloor()) ? $length * $module->getFloor()->getPrice() : 0;
        $isolationPrice = $module->getIsolation() ? $length * $module->getIsolation()->getPrice() : 0;
        $structurePrice = $module->getStructure() ? $length * $module->getStructure()->getPrice() : 0;
        $modulePrice = $finitionPrice + $coveragePrice + $floorPrice + $isolationPrice + $structurePrice;
        $module->setPrice($modulePrice);
        $this->manager->flush();
        return $modulePrice;
    }


}
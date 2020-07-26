<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Module;
use App\Entity\Project;
use App\Entity\User;
use App\Service\Quotation\QuotationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ModuleDataPersister implements ContextAwareDataPersisterInterface
{
    private $_entityManager;
    private $_passwordEncoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->_entityManager = $entityManager;
        $this->_passwordEncoder = $passwordEncoder;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Module;
    }

    /**
     * @param Module $data
     * @param array $context
     */
    public function persist($data, array $context = [])
    {
        $qService = new QuotationService($this->_entityManager);
        $qService->calculateModulePrice($data);
        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($data, array $context = [])
    {
        $this->_entityManager->remove($data);
        $this->_entityManager->flush();
    }
}
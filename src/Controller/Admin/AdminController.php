<?php
/**
 * Created by PhpStorm.
 * User: hocin
 * Date: 07/10/2019
 * Time: 17:36
 */

namespace App\Controller\Admin;


use App\Controller\Helper;
use App\Repository\CustomerRepository;
use App\Repository\ProjectRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 */
class AdminController extends AbstractController
{

    use Helper;

    /**
     * @var $manager
     */
    private $manager;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * AdminController constructor.
     * @param $manager
     * @param ProjectRepository $projectRepository
     * @param UserRepository $userRepository
     * @param CustomerRepository $customerRepository
     */
    public function __construct(ProjectRepository $projectRepository,
                                UserRepository $userRepository,
                                CustomerRepository $customerRepository)
    {
        $this->manager = $this->getDoctrine()->getManager();
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function admin() {

        $data["nbSalers"] = count($this->userRepository->findAll());
        $data["nbCustomers"] = count($this->customerRepository->findAll());
        $data["nbProjects"] = count($this->userRepository->findAll());
        return $this->render('admin/index.html.twig',[
            'data'        => $data,
        ]);

    }
}
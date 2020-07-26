<?php


namespace App\Controller\Api;


use App\Entity\Coverage;
use App\Entity\Finition;
use App\Entity\Floor;
use App\Entity\Isolation;
use App\Entity\Structure;
use App\Entity\Type;
use App\Repository\PlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CustomEndpontController extends AbstractController
{

    /**
     * @Route("api/getAllModulesType", name="module_getAll", methods={"get"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function getAllModulesType(SerializerInterface $serializer) {
        $types = $this->getDoctrine()->getRepository(Type::class)->findAll();
        $return['type'] =  $serializer->serialize($types, 'json', ['groups' => ['type:read']]);

        $floor = $this->getDoctrine()->getRepository(Floor::class)->findAll();
        $return['floor'] =  $serializer->serialize($floor, 'json', ['groups' => ['floor:read']]);

        $coverage = $this->getDoctrine()->getRepository(Coverage::class)->findAll();
        $return['coverage'] =  $serializer->serialize($coverage, 'json', ['groups' => ['coverage:read']]);

        $finition = $this->getDoctrine()->getRepository(Finition::class)->findAll();
        $return['finition'] =  $serializer->serialize($finition, 'json', ['groups' => ['finition:read']]);

        $structure = $this->getDoctrine()->getRepository(Structure::class)->findAll();
        $return['structure'] =  $serializer->serialize($structure, 'json', ['groups' => ['structure:read']]);

        $isolation = $this->getDoctrine()->getRepository(Isolation::class)->findAll();
        $return['isolation'] =  $serializer->serialize($isolation, 'json', ['groups' => ['isolation:read']]);


        return new JsonResponse($return);
    }
}
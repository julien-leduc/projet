<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    /**
     * @Route("/api/v1/movies", name="api_movies_list", methods={"GET"})
     */
    public function movies(Request $request)
    {
        $usersRepo = $this->getDoctrine()->getRepository(Users::class);
        $q = $request->query->get('q');
        $users = $usersRepo->search($q);

        return $this->json([
            "status" => "ok",
            "message" => "",
            "data" => $users,
        ]);
    }
}
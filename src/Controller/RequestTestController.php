<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestTestController
{

    private const ID_KEY = "id";

    public function __construct()
    {}

    public function getRequest(Request $request): Response
    {
        return new Response($request->query->get(self::ID_KEY));
    }

    public function postRequest(Request $request): Response
    {
        return new Response(self::ID_KEY);
    }

}
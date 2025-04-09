<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route("/api/quote", name: "api_quote")]
    public function jsonNumber(): Response
    {
        $quotes = [
            "Bättre lyss till den sträng som brast, än att aldrig spänt en båge.",
            "The sheep spend their lives fearing the wolf, only to be eaten by the shepherd.",
            "Den som inte kan styra sig själv kommer att styras av andra.",
            "Den kloke inser att han vet lite. Narren tror att han vet allt."
        ];
        
        $quote = $quotes[array_rand($quotes)];
        
        date_default_timezone_set('Europe/Stockholm');
        
        $data = [
            'quote' => $quote,
            'date' => date('Y-m-d'),
            'timestamp' => date('Y-m-d H:i:s', time())
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );
        return $response;
    }
}

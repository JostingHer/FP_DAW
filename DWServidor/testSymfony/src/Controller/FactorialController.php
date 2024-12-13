<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactorialController
{

    /**
     * @Route("/factorial/{num?3}")
     */
    public function number($num)
    {
        $factorial = 1;

        for ($i = 1; $i <= $num; $i++) {
            $factorial = $factorial * $i;
        }

        return new Response(
            '<html><body>number: ' . $num . " factorial = " . $factorial . '</body></html>'
        );
    }
}

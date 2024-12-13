<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class PageController extends AbstractController
{
    /**
     * Ruta para generar páginas dinámicas basadas en un slug.
     * 
     * @Route("/page/{slug}", name="dynamic_page")
     */
    public function page(string $slug): Response
    {
        // Datos simulados para las páginas
        $pages = [
            [
                'slug' => 'articulo1',
                'data' => 'Contenido de Logquesa',
            ],
            [
                'slug' => 'articulo2',
                'data' => 'Contenido de Another Page',
            ],
            [
                'slug' => 'articulo3',
                'data' => 'Contenido de Another Page',
            ],
            [
                'slug' => 'articulo4',
                'data' => 'Contenido de Logquesa',
            ],
            [
                'slug' => 'articulo5',
                'data' => 'Contenido de Another Page',
            ],
            [
                'slug' => 'articulo6',
                'data' => 'Contenido de Another Page',
            ],
        ];

        // Buscar la página por slug
        $page = array_filter($pages, fn($p) => $p['slug'] === $slug);

        // Si no se encuentra, lanzar un 404
        if (empty($page)) {
            return new Response(
                '<html><body>404</body></html>'
            );
        }

        // Obtener la primera coincidencia (ya que array_filter devuelve un array)
        $pageData = reset($page);

        // Renderizar o devolver la página
        return new Response(
            '<html><body><h1>' . $pageData['slug'] . '</h1><p>' . $pageData['data'] . '</p></body></html>'
        );
    }
}

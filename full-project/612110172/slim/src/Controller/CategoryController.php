<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class CategoryController

{
    public static function getAll($link): array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT * FROM category
    ORDER BY name
    EOT
        );
        $items = [];
        while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
        }
        return $items;
    }
}

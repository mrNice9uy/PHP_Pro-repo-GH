<?php


namespace app\services\renderers;
use app\interfaces\RendererInterface;

class TwigRenderer implements RendererInterface
{
    public function render(string $templateName, array $params = []): string
    {
        $loader = new \Twig\Loader\FilesystemLoader(VIEWS_DIR);
        $twig = new \Twig\Environment($loader, [
            'cache' => 'cache'
        ]);
        echo $twig->render($templateName, $params);
    }
}
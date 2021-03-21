<?php


namespace app\interfaces;


interface RendererInterface
{
    function render(string $templateName, array $params = []): string;
}
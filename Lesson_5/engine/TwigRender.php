<?php

//TODO создать экземпляр twig
namespace app\engine;


use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        $loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');
        $twig = new \Twig\Environment($loader);
        //TODO Обеспечьте единственный экземпляр $twig
      //  return $twig->render($template, $params);
    }
}
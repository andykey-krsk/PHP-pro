<?php

namespace app\controllers;

use app\engine\Sessions;
use app\interfaces\IRenderer;
use app\model\repositories\BasketRepository;
use app\model\repositories\UserRepository;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \Exception("Экшн не существует.");
            //Die("Экшн не существует.");
        }
    }

    public function render($template, $params = [])
    {
        $session_id = (new Sessions())->getSessionId();
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', [
                    'count' => (new BasketRepository())->getCountWhere('session', $session_id),
                    'auth' => (new UserRepository())->isAuth(),
                    'username' => (new UserRepository())->getName()
                 ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }
}
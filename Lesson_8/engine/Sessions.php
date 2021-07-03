<?php

namespace app\engine;

class Sessions
{
    public function sessionStart() {
        session_start();
    }

    public function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function getSessionId() {
        return session_id();
    }

    public function getSession($key) {
        return $_SESSION[$key];
    }

    public function destroySession() {
        session_destroy();
    }

    public function regenerateSession() {
        session_regenerate_id();
    }
}
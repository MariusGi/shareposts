<?php

declare(strict_types = 1);

class SessionHelper
{
    // EXAMPLE - SessionHelper::flash('register_success', 'You are now registered', 'alert alert-danger');
    // DISPLAY IN VIEW - echo SessionHelper::flash('register_success');
    public static function flash(string $name = '', string $message = '', string $bootstrapClass = 'alert alert-success')
    {
        session_start();

        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if (!empty($_SESSION[$name.'_class'])) {
                    unset($_SESSION[$name.'_class']);
                }
                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $bootstrapClass;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash">
                        '. $_SESSION[$name] .'
                      </div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }
}

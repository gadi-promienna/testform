<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

// Inicjalizacja Brain Monkey
Brain\Monkey\setUp();

// Mockowanie podstawowych funkcji WordPressa
if (!function_exists('esc_html')) {
    function esc_html($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
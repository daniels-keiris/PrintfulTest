<?php

function view (string $view, array $variables = []): void 
{
    $file = './src/Views/' . $view . '.php';

    // If variables exist, extract them
    if (count($variables)) {
        extract($variables);
    }

    if (is_readable($file)) {
        require_once $file;
    } else {
        die ('Missing view');
    }
}

?>
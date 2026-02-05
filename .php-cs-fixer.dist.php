<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor', 'system', 'node_modules']);

$config = new PhpCsFixer\Config();
return $config
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setFinder($finder)
    ->setRules(['@PSR12' => true]);
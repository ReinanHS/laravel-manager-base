<?php

// Uncomment this, if function parameter types must be strict
//declare(strict_types=1);

namespace Reinanhs\LaravelManagerBase;

class LaravelManagerBase
{
    // Build wonderful things
    public function example()
    {
        return 'example output and version is: '.config('laravel-manager-base.version');
    }

    /**
     * Friendly welcome.
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function echoPhrase(string $phrase): string
    {
        return $phrase;
    }
}

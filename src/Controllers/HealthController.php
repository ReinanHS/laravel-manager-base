<?php

namespace Reinanhs\LaravelManagerBase\Commands;

class HealthController 
{   
    public function __invoke()
    {
        return 'ok';
    }
}
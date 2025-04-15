<?php

namespace App\Domain\Repositories;

class CheckResult
{
    public function __construct(public string $response = "", public string $error = "", public string $code = "")
    {
    }
}

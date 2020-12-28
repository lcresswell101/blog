<?php

namespace App\Repository;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepositoryInterface
{
    public function getUser(): ?Authenticatable;
}

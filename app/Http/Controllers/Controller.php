<?php

namespace App\Http\Controllers;

use App\Repository\UserRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userRepository;

    protected $user;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = $this->userRepository->find(Auth::user()->id);

            return $next($request);
        });
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function unauthenticated($request, AuthenticationException $exception){
        if($request->expectsJson()){
            return response()->json([
                'meta'=>[
                    'code'=>401,
                    'status'=>'error',
                    'message'=>'Unauthenticated'
                ],
                'data'=>[],
            ],401);
        }
    }
   
}

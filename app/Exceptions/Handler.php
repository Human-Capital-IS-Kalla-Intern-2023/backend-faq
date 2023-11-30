<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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

        // $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
        //     if ($request->is('api/*')) {
        //         return response()->json([
        //             'errors' => [
        //                 'status' => 401,
        //                 'message' => 'Unauthenticated',
        //                 'details' => 'User not have token, try login to obatain token'
        //             ]
        //         ], 401);
        //     }
        // });
    }
}

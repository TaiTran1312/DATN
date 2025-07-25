<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Override the render method to return JSON for API routes
     */
    public function render($request, Throwable $exception)
    {
        // Nếu là API thì trả về lỗi dạng JSON
        if ($request->is('api/*')) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 400);
        }

        return parent::render($request, $exception);
    }
}

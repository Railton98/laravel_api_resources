<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Debug\Exception\FlattenException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // lista dos tipos de exceção que não devem ser relatados (ex: em log)
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);

        // switch($exception /*ou true*/) {
        //     case $exception instanceof ModelNotFoundException:
        //         return response()->json([
        //             'message' => 'Record not found',//$exception,
        //         ], Response::HTTP_NOT_FOUND);
        //         break;
        //
        //     case $exception instanceof NotFoundHttpException:
        //         return response()->json([
        //             'message' => 'Page not found',
        //         ], Response::HTTP_NOT_FOUND);
        //         break;
        //
        //     case $exception instanceof QueryException:
        //         return response()->json([
        //             'message' => $exception->errorInfo,
        //         ], Response::HTTP_BAD_REQUEST);
        //         break;
        //
        //     default: return response()->json([
        //                     'message' => 'Internal Server Error',
        //                 ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }

    }

    /**
     * Create a Symfony response for the given exception.
     * =====================================================
     * Sobrescrevendo Método original em (\Illuminate\Foundation\Exceptions\Handler)
     * =====================================================
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertExceptionToResponse(Exception $e)
    {
        $e = FlattenException::create($e);

        if (config('app.debug')) {
            $message = $e->getMessage();
        } else {
            $message = Response::statusTexts[$e->getStatusCode()];
        }

        return response()->json(['message' => $message], $e->getStatusCode());
    }

}

<?php

namespace App\Http\Middleware;

use Closure;

class ApiDataLogger
{   
    private $startTime;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $this->startTime = microtime(true);
        return $next($request);
    }

    public function checkEnable()
    {
           config('apilog.apiLogEnable')==true ? $this->terminate : $this->handle;
    }

    public function terminate($request,$response)
    {
         $endTime = microtime(true);
         $fileName = config('apilog.fileName').'-'.date('d-m-y').'.log';
         $data = 'Time:'     .gmdate("F j, Y, g:i:a")."\n";
         $data .='Duration: '.number_format($endTime - LARAVEL_START,3)."\n";
         $data .='IP:'. $request->ip()."\n";
         $data .='URL:'. $request->fullUrl()."\n";
         $data .='METHOD:'. $request->method()."\n";
         $data .='INPUT:'. $request->getContent()."\n";
         $data .='OUTPUT:'. $response->getContent()."\n";
         \File::append(storage_path('logs'.'/'.$fileName),$data."\n". str_repeat("=", 20) . "\n\n");
    }
}

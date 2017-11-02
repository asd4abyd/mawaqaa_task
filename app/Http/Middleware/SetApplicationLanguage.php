<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/08/16
 * Time: 05:21 م
 */
namespace App\Http\Middleware;

use App;
use Closure;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class SetApplicationLanguage {

    /**
     * Handle an incoming request.
     *
     * Ali Al-Dwairi
     * set the language using the lang in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale(optional(Auth()->user())->language ?: Config::get('app.locale'));
        return $next($request);

    }
}

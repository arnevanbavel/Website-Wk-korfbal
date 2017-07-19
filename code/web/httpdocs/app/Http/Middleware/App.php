<?php namespace App\Http\Middleware;

use closure;
use Cookie;
Class App{
	public function handle($request, Closure $next)
	{
		app()->setLocale(Cookie::get('locale'));
		return $next($request);
	}
}
<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('moonshine')->user();

        if ($user && !in_array($user->moonshine_user_role_id, [1, 3])) {
            auth('moonshine')->logout();
            session()->flush();

            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }

        return $next($request);
    }
}

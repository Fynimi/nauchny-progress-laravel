<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// middleware для проверки роли пользователя
// используется как role:journalist, role:admin
class EnsureUserRole
{
    /**
     * @param  string|string[]  $roles  одна или несколько ролей через запятую
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // если юзер не авторизован — пускает дальше (внутри контроллера будет проверка)
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // проверяем, есть ли у текущего юзера одна из нужных ролей
        $userRole = $request->user()->role;

        if (!$userRole || !in_array($userRole->name, $roles, true)) {
            // если роли нет — страница "Нет доступа" (просто редирект на главную)
            return redirect()->route('home')->with('error', 'У вас нет доступа к этому разделу.');
        }

        return $next($request);
    }
}

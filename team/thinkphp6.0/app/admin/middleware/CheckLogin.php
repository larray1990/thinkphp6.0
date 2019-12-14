<?php
declare (strict_types = 1);

namespace app\admin\middleware;
use app\BaseController;

class CheckLogin
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        if((strtolower($request->controller())<>'login')&&empty(session('?admin_id'))&&empty(session('?role_id'))){
            return redirect((string)url('login/index'));
        }
        return $next($request);
    }
}

<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class AdminFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $userM = new UsersModel();
        $is_login_id = session('XX-ADMIN');
        $userLogin = $userM->RoleLogin($is_login_id);
        if (!session('XX-ADMIN') || $userLogin->is_active != 1) {
            return redirect()->to('app-login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
class AksesAdmin implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $is_login_id = session('XX-ADMIN');
        $userM = new UsersModel();
        $userLogin = $userM->RoleLogin($is_login_id);
        if ($userLogin->user_level_id != 1) {
            return redirect()->to('admin/dashboard');
        }

        

        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
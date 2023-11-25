<?php

namespace App\Filters;
use App\Models\TagihanModel;
use App\Models\StudentAccount;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;



class StudentFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('STUDENT')) {
            return redirect()->to('login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

class StatusAwal implements FilterInterface
{
    function __construct()
    {
        $this->StudentM = new StudentAccount();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        $logged_in = session('STUDENT');
        // Jika Status Awalnya selain dari lulus
        $status = $this->StudentM->select('status_lulus')->where('id',$logged_in)->first();
        // var_dump($status['status_lulus']);
        if ($status['status_lulus']===NULL) {
            
            return redirect()->to('student/status');
        }  
        if ($status['status_lulus']==='TL') {
           
            return redirect()->to('student/home');
        }  
        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
class StatusLulus implements FilterInterface
{
    function __construct()
    {
        $this->StudentM = new StudentAccount();
    }
    public function before(RequestInterface $request, $arguments = null)
    {
        $logged_in = session('STUDENT');
        // Jika Status Awalnya selain dari lulus
        $status = $this->StudentM->select('status_lulus')->where('id',$logged_in)->first();
        if ($status['status_lulus']==='L') {
            return redirect()->to('student/biodata');
        }  
        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}


   
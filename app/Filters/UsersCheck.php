<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        //if segment 1 == users - redirect request to the second segment  
        //localhost/users/  - 1st case
        //localhost/users/notification  -2nd case
        $uri = service('uri');
        if($uri->getSegment(1) == 'users'){
            if($uri->getSegment(2) == '')
                $segment = '/';
            else
                $segment = '/'.$uri->getSegment(2);
            
            return redirect()->to($segment);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
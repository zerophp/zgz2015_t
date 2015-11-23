<?php


/**
 * Router
 * 
 * @param string $url
 * @return array
 */
function Router($url)
{
    $controllers = ['user'=>['select','insert','update','delete'],
                    'error'=>['_404'],
                    ];
    $route= array();
    $url = explode('/', $url);
    
    echo "<pre>route:";
    print_r($url);
    echo "</pre>";
    
    $params=array();
    $filename = $_SERVER['DOCUMENT_ROOT'].'/../modules/Application/src/Application/Controller/'.ucfirst($url[1]).'.php';
    echo $filename;
    if(file_exists($filename))
    {
        // OK controller
        
        if(isset($url[2]) && in_array($url[2],$controllers[$url[1]]))
        {
            // OK action
            for($i=3;$i<sizeof($url);$i+=2)
            {
                if(isset($url[$i+1]))
                    $params[$url[$i]]=$url[$i+1];
                else
                {
                   return  array('controller'=>'error',
                                 'action'=>'_404');
                }
            }
            $route['controller']=$url[1];
            $route['action']=$url[2];
            $route['params']=$params;
        }
        elseif(!isset($url[2]))
        {
            $route['controller']=$url[1];
            $route['action']='default';
            $route['params']=$params;
        }
        elseif(!in_array($url[2],$controllers[$url[1]]))
        {
            $route['controller']='error';
            $route['action']='_404';
            $route['params']=$params;
        }
        
            
    }
    elseif(isset($url[1])&& $url[1]=='')
    {
        $route['controller']='default';
        $route['action']='defualt';
        $route['params']=$params;
    }
    else
    {
        $route['controller']='error';
        $route['action']='_404';
        $route['params']=$params;
    }
    
    
    return $route;
}
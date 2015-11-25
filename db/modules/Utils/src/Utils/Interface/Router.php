<?php


/**
 * Router
 * 
 * $route = array('controller'=>'controller',
 *                'action'=>'action'
 *                'params'=>array('p1'=>'v1',
 *                                'p2'=>'v2')
 *                );
 * KO: controller = error, action = _404
 * OK: <controller>, <action>, [params]
 * @param string $url
 * @return array
 */
function Router($url)
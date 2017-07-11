<?php
/**
 * Worker controller
 * @package admin-worker
 * @version 0.0.1
 * @upgrade true
 */

namespace AdminWorker\Controller;

class WorkerController extends \AdminController
{
    private function _defaultParams(){
        return [
            'title'             => 'Worker',
            'nav_title'         => 'System',
            'active_menu'       => 'system',
            'active_submenu'    => 'worker'
        ];
    }
    
    public function indexAction(){
        if(!$this->user->login)
            return $this->loginFirst('adminLogin');
        if(!$this->can_i->read_worker)
            return $this->show404();
        
        $params = $this->_defaultParams();
        $jobs = $this->worker->list();
        sort($jobs);
        
        $params['jobs'] = [];
        foreach($jobs as $job)
            $params['jobs'][] = $this->worker->get($job);
        
        $params['total'] = count($jobs);
        $params['reff']  = $this->req->url;
        
        return $this->respond('system/worker/index', $params);
    }
    
    public function removeAction(){
        if(!$this->user->login)
            return $this->loginFirst('adminLogin');
        if(!$this->can_i->remove_worker)
            return $this->show404();
        
        $name = $this->param->name;
        $this->worker->remove($name);
        
        $ref = $this->req->getQuery('ref');
        if($ref)
            return $this->redirect($ref);
        
        return $this->redirectUrl('adminWorker');
    }
}
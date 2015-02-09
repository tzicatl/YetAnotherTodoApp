<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    public function test_get()
    {
        $data = array('hola', 'mundo');
        $this->response($data, 200);
    }

    public function lists_get()
    {
        $this->load->model('Task_List');
        $data = array('status'=>'OK', 'data'=> $this->models->TaskList->all());
        $this->response($data, 200);
    }

    public function list_put()
    {
        $this->load->model('TaskList');
        $this->models->TaskList->add($this->put('title'));
    }

    public function list_post()
    {
        $this->load->model('TaskList');
        $this->models->TaskList->update($this->post('title'), $this->post('title'));
    }

    public function task_put()
    {
        $this->load->model('Task');
        $this->models->Task->add($this->put('parent_list_id'), $this->put('text'));
    }

    public function task_post()
    {
        $this->load->model('Task');
        $this->models->Task->update($this->post('id'), $this->post('text'));
    }

    public function task_delete()
    {
        $this->load->model('Task');
        $this->models->Task->delete($this->delete('id'));
    }
}
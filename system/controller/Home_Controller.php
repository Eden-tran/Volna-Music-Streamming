<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');

class Home_Controller extends FT_Controller
{
    public $data = [
        'controller' => 'home'

    ];

    // public function __construct()
    // {
    //     $this->model = $this->model('home');
    // }
    public function indexAction()
    {
        $this->model = $this->model('album');
        $this->data['release'] = $this->model->getList();
        $this->data['topSingle'] = $this->model->getSlist();
        $this->data['content'] = 'home/home';
        $this->model = $this->model('user');
        $this->data['artist'] = $this->model->user_list(1, 8);
        $this->render('layout/masterlayout', $this->data);
    }

    public function detailAction()
    {
        echo '<h1>Detail Action</h1>';
    }

    public function _404Action()
    {
        $this->data['controller'] = '';
        $this->data['content'] = 'error/404';

        $this->render('layout/masterlayout', $this->data);
    }
}
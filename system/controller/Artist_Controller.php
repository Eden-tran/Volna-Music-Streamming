<?php if (!defined('PATH_SYSTEM')) die('Bad requested!');

class Artist_Controller extends FT_Controller
{
    public $data = [
        'controller' => 'Artist'
    ];
    public function __construct()
    {
        $this->model = $this->model('user');
    }
    public function indexAction()
    {

        $offset = $_GET['offset'] ?: 0;
        $limit = $_GET['offset'] ?: 6;
        $this->data['list'] = $this->model->user_list($offset, $limit);
        $this->data['content'] = 'Artist/list';
        $this->data['title'] = 'Artists';
        $this->data['breadcrumb'] = 'Artists';
        $this->render('layout/masterlayout', $this->data);
    }
    public function LoadMoreAction()
    {
        $offset = $_GET['offset'] ?: 0;
        $limit = $_GET['limit'] ?: 6;
        if ($_GET['offset'] && $_GET['limit']) {
            $result = $this->model->user_list($offset, $limit);
            $output = '';
            foreach ($result as $item) {
                $output .= '<div class="col-6 col-sm-4 col-md-3 col-xl-2 artistL">
                <a href="index.php?c=artist&amp;a=detail&amp;id=' . $item->Id . '" class="artist">
                    <div class="artist__cover">
                        <img src="public/img/artists/' . $item->avatar . '" alt="">
                    </div>
                    <h3 class="artist__title">' . $item->ArtName . '</h3>
                </a>
            </div>';
            }
            echo $output;
        }
    }

    public function DetailAction()
    {
        $id = $_GET['id'];
        $this->data['info'] = $this->model->getuser($id);
        $this->model = $this->model('album');
        $this->data['release'] = $this->model->WithId(10, $id);
        $this->data['content'] = 'Artist/detail';
        $this->render('layout/masterlayout', $this->data);
    }
}
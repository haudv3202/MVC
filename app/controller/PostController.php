<?php
class PostController extends Controller {
    public $PostModel;
    public function __construct() {
        $this->PostModel = $this->model('Post');
    }

    public function index() {
        $data = [
            'title' => "xin chào mvc",
        ];
        $this->view('pages/index',$data);
    }

    public function about() {
    }
}
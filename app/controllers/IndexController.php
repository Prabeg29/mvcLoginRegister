<?php

class IndexController extends Controller{
    /**
     * Index: Renders the index view. NOTE: This controller can only be accessed
     * by authenticated users!
     * @access public
     * @example index/index
     * @return void
     */
    public function index(){
        $data = [
            'title'=> 'Home Page'
        ];

        $this->view('pages/index', $data);
    }
}
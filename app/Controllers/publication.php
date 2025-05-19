<?php
    namespace App\Controllers;
    use App\Models\PublicationModel;

    class Publication extends BaseController
    {
        public function index()
        {
            $model = new PublicationModel();
            $data['posts'] = $model->get();
            echo view('header');
            echo view('publication/all', $data);
            echo view('footer');
        }
    }
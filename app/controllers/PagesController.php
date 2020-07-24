<?php

declare(strict_types = 1);

class PagesController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if (SessionHelper::isLoggedIn()) {
            UrlHelper::redirect('posts');
        }

        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the TraversyMVC PHP Framework',
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users',
        ];

        $this->view('pages/about', $data);
    }
}

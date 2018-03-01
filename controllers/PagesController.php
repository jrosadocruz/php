<?php

class PagesController
{

    public function home()
    {
        $tasks = App::get('database')->selectAll('tasks');
        view('index', compact('tasks'));
    }

    public function about()
    {
        view('index');
    }

}
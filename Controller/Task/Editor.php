<?php
namespace Controller\Task;

class Editor extends \Controller\App
{
    public function index()
    {
        $this->render('task.editor');
    }
}

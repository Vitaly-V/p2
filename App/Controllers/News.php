<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/9/16
 * Time: 8:44 AM
 */

namespace App\Controllers;


class News
{
    protected $view;

    public function __construct()
    {
        $this->view = new \App\View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction()
    {
    }

    protected function actionIndex()
    {
        $this->view->title = 'News';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->title = 'Article';
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/one.php');
    }

}
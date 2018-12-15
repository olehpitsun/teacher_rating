<?php

class manageTeachersController extends Controller {

    public function __construct() {
        parent::__construct ();
    }

    public function index() {
        header ( "Location: " . URL . '?c=manageTeachers&f=show' );
    }

    public function show() {
        $this->view->js = array('manageTeachers');
        $this->view->title = 'Перегляд викладачів';
        $this->view->users = $this->model->getAllTeachers ();
        $this->view->render ( 'manageTeachers/show' );
    }

    public function create() {
        $this->view->js = array ( 'ckeditor', 'ckeditor_basic', 'ckeditor_basic', 'ckeditor_basic_source', 'ckeditor_source' );
        $this->view->title = 'Додавання викладачів';
        $this->view->render ( 'manageTeachers/create' );
    }

    /*
     * Перевірка введених даних
     */
    public function check() {
        $error = $this->model->checkAdd ( $_POST,$_FILES );

        if ( $error != 0 ) {
            $this->view->js = 'manageTeachers';
            $this->view->error = $error;
            $this->view->data = $_POST;
            $this->view->data_1 = $_FILES;
            $this->view->title = 'Додавання викладачів';
            $this->view->render ( 'manageTeachers/create' );
        }
    }

    public function success() {
        $this->view->title = 'Додано!';
        $this->view->class = 'success';
        $this->view->text = ' успішно!';
        $this->view->render ( 'manageTeachers/success' );
    }

    public function error() {
        $this->view->title = 'Заповніть усі поля  !';
        $this->view->class = 'danger';
        $this->view->text = ' виникла невідома помилка!<br />';
        $this->view->render ( 'manageTeachers/success' );
    }

    public function edit( $id ) {
        $this->view->css = 'manageTeachers';
        $this->view->title = 'Редагування викладачів';
        $this->view->js = array ( 'ckeditor', 'ckeditor_basic', 'ckeditor_basic', 'ckeditor_basic_source', 'ckeditor_source' );
        $data = $this->model->getOneUserInfo ( $id,$_FILES );
        $data_1=$this->view->data_1 = $_FILES;
        if ( $data != 0 ) {
            $this->view->data = $data;
            $this->view->data_1 = $_FILES;
        } else {
            $this->view->error = 'Користувача із таким ідентифікатором не існує!';
        }
        
        $this->view->render ( 'manageTeachers/edit' );
    }

    public function checkEdit() {
        $error = $this->model->checkEdit ( $_POST,$_FILES );

        if ( $error != 0 ) {
            $this->view->js = 'manageTeachers';
            $this->view->error = $error;
            $this->view->data = $_POST;
            $this->view->data_1 = $_FILES;
            $this->view->title = 'Додавання викладачів';
            $this->view->render ( 'manageTeachers/edit' );
        }
    }

    public function delete( $id ) {
        $this->model->delete ( $id );
    }
    
}

?>

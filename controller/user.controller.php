<?php
require_once 'model/user.php';

class UserController{

    private $model;

    public function __construct(){
        $this->model = new User();
    }

    public function index(){
        require_once 'view/header.php';
        require_once 'view/user/user.php';
        require_once 'view/footer.php';
    }

    public function create(){
        $user = $this->model;

        require_once 'view/header.php';
        require_once 'view/user/user-nuevo.php';
        require_once 'view/footer.php';
    }

    public function update(){
        $user=$this->model->getUsersById($_GET["id"]);

        require_once 'view/header.php';
        require_once 'view/user/user-editar.php';
        require_once 'view/footer.php';
    }

    public function save(){
        $user = $this->model;

        $user->name = $_POST['name'];
        $user->lastname = $_POST['lastname'];
        $user->status = (!isset($_POST['status']) ||
            is_null($_POST['status'])) ? 0 : 1;
        $user->email = $_POST['email'];

        if(isset($_POST['id'])) {
            $user->id = $_POST['id'];
            $this->model->update($user);
        } else {
            $this->model->add($user);
        }

        header('Location: index.php');
    }

    public function delete(){
        $this->model->delete($_GET['id']);
        header('Location: index.php');
    }
}

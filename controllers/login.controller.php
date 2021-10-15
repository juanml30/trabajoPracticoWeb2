<?php
require_once 'models/user.model.php';
require_once 'views/auth.view.php';
require_once 'helpers/auth.helper.php';

class AuthController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->authHelper = new AuthHelper();
    }

    // Muestra el formulario para loguearse
    public function showLogin() {
        $this->view->showFormLogin();
    }

    // Obtiene los datos del login y los valida
    public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);

            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['USER_ID'] = $user->id;
                $_SESSION['USER_EMAIL'] = $user->email;
                header("Location: " . BASE_URL);
            } else {
                $this->view->showFormLogin("Usuario o contraseña inválida");
            }
        }
    }

    // Cierra la sesion
    public function logout() {
        $this->authHelper->logout();
    }
}

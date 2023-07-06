<?php

namespace App\Controllers;
use App\Models\StaffsModel;
use App\Models\AdminsModel;
use App\Models\ProjectsModel;
use App\Models\TasksModel;
use App\Models\NotificationsModel;
use App\Models\Model;

class DashboardsController extends Controller{

    public function index () {

        $pageTitle = 'Dashboard';
        $this->isAdmin();

        $staffModel = new StaffsModel;
        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staff = $staffModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            $this->render('dashboards/index', compact('pageTitle','staff', 'staffs', 'projects', 'notifications', 'notification'));
        
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findAll();
            $this->render('dashboards/index', compact('pageTitle', 'admin', 'staffs', 'projects'), 'admin_layout');
        }
            
    }

    public function my_profil () {
        $pageTitle = 'My profil';
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            $this->render('dashboards/my_profil', compact('pageTitle','staff', 'notifications', 'notification'));
        }
    }

    public function update_profil(int $id) {

        $staffModel = new StaffsModel;

        $staff = $staffModel->find($id);
        
        if (isset($_FILES['profil']['name']) && !empty($_FILES['profil']['name'])) {
            $img_name = $_FILES['profil']['name'];
            $tmp_name = $_FILES['profil']['tmp_name'];
            $error = $_FILES['profil']['error'];
            if($error === 0){
    
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc, $allowed_exs)){
                    $new_img_name = uniqid().'.'.$img_ex_to_lc;
                    $img_upload_path = '../Public/img/staffs/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $staffModif = new StaffsModel;
                            
                    //on hydrate
                    $staffModif->setId($staff->id)
                        ->setProfil($new_img_name);
                    //on enregistre
                    $staffModif->update();

                    header('Location: /dashboards/my_profil?success=true');
                    exit;
                } else {
                    $em = "type de fichiers inconnu !";
                    header("Location: /dashboards/my_profil?error=$em");
                    exit;
                } 
            } else{
                $em = "erreur iconnu !";
                header("Location: /dashboards/my_profil?error=$em");
                exit;
            }
        }
    }

    public function update_contact(int $id) {

        $staffModel = new StaffsModel;

        $staff = $staffModel->find($id);
        
        if (Model::validate($_POST, ['address','email','phone'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $address = strip_tags($_POST['address']);
            $email = strip_tags($_POST['email']);
            $phone = strip_tags($_POST['phone']);

            $staffModif = new StaffsModel;
                
            //on hydrate
            $staffModif->setId($staff->id)
                ->setAddress($address)
                ->setEmail($email)
                ->setPhone($phone);
            $staffModif->update();

            header('Location: /dashboards/my_profil?success=true');
            exit;
        }
    }

    public function edit_admin() {

        $pageTitle = 'Edit login admin';
        $this->isAdmin();

        $adminModel = new AdminsModel;
        $admin = $adminModel->find( $_SESSION['id']);
        $this->render('dashboards/edit_admin', compact('admin', 'pageTitle'), 'admin_layout');
    } 

    public function confirm_edit() {
        $pageTitle = 'Edit login admin';
        $this->isAdmin();

        if (Model::validate($_POST, ['login', 'password'])){

            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);

            $adminModel = new AdminsModel;
            $admin = $adminModel->getAdmin( ['login' => $login]);

            if (isset($admin) && !empty($admin)) {
                if (password_verify($password, $admin->password)) {
                    $this->render('dashboards/confirm_edit', compact('admin', 'pageTitle'), 'admin_layout');
                } else {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
            } else {
                $em = "the password or login does not match";
                $_SESSION['errors']= $em;
                header("Location: /dashbords/edit_admin");
                exit;
            }
        }
    }

    public function confirm(int $id) {
        $pageTitle = 'Edit login admin';
        $this->isAdmin();

        $adminModel = new AdminsModel;
        $admin = $adminModel->find($id);
        if (Model::validate($_POST, ['password', 'password_confirm'])){

            $password = strip_tags($_POST['password']);
            $password_confirm = strip_tags($_POST['password_confirm']);

            if ($password !== $password_confirm) {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            } else {
                $pass = password_hash($password,PASSWORD_BCRYPT);

                $adminModif = new AdminsModel;

                //on hydrate
                $adminModif->setId($admin->id)
                        ->setPassword($pass);
                //on enregistre
                $adminModif->update();
                session_destroy();

                return header('Location: /auths/login');
            }
        }
    }

    public function my_project () {

        $pageTitle = 'my project';
        $this->isAdmin();

        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

       
        $staff = $staffModel->find( $_SESSION['id']);
        $staffs = $staffModel->findAll();

        $projectModel = new ProjectsModel;
        $projects = $projectModel->findBy(['executor' => $_SESSION['id']]);
        $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
        $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

        $this->render('dashboards/my_project', compact('pageTitle','staff', 'staffs', 'projects', 'notifications', 'notification'));
    }

    public function my_task () {

        $pageTitle = 'my task';
        $this->isAdmin();

        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

       
        $staff = $staffModel->find( $_SESSION['id']);
        $staffs = $staffModel->findAll();

        $taskModel = new TasksModel;
        $tasks = $taskModel->findBy(['executor' => $_SESSION['id']]);

        $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
        $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

        $this->render('dashboards/my_task', compact('pageTitle','staff', 'staffs', 'tasks', 'notifications', 'notification'));
    }
}
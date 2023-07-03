<?php
namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\FonctionsModel;
use App\Models\Model;
use App\Models\NotificationsModel;
use App\Models\PostesModel;
use App\Models\ProjectsModel;
use App\Models\StaffsModel;

class StaffsController extends Controller{

    public function index () {

        $pageTitle = 'All staffs';

        $staffModel = new StaffsModel;
        $adminModel = new AdminsModel;
        $functionModel = new FonctionsModel;
        $posteModel = new PostesModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staffs = $staffModel->findAll();
            $staff = $staffModel->find( $_SESSION['id']);

            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('staffs/index', compact('pageTitle','staffs', 'functions', 'postes', 'staff', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();
            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();

            return $this->render('staffs/index', compact('pageTitle','staffs', 'functions', 'postes', 'admin'), 'admin_layout');
        }  
    }
    public function Form_staff() {

        $pageTitle = 'Add new staff';

        $staffModel = new StaffsModel;
        $adminModel = new AdminsModel;
        $functionModel = new FonctionsModel;
        $posteModel = new PostesModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staff = $staffModel->find( $_SESSION['id']);
            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            return $this->render('staffs/add_staff', compact('pageTitle','staff','functions', 'postes', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();

            return $this->render('staffs/add_staff', compact('pageTitle', 'functions', 'postes', 'admin'), 'admin_layout');
        }
        
    }

    public function create_staff () {
        

        //on verifi si le formulaire est complet
        if (Model::validate($_POST, ['lastname', 'firstname','otherfirstname', 'date', 'place','sex','address','email','phone','poste', 'role'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $lastname = strip_tags($_POST['lastname']);
            $firstname = strip_tags($_POST['firstname']);
            $otherfirstname = strip_tags($_POST['otherfirstname']);
            $date = strip_tags($_POST['date']);
            $place = strip_tags($_POST['place']);
            $sex = strip_tags($_POST['sex']);
            $address = strip_tags($_POST['address']);
            $email = strip_tags($_POST['email']);
            $phone = strip_tags($_POST['phone']);
            $function = strip_tags($_POST['poste']);
            $role = strip_tags($_POST['role']);

            $pass = Model::passgen(8);
            $password = password_hash($pass,PASSWORD_BCRYPT);

            $staff = new StaffsModel;
                            
            //on hydrate
            $staff->setFirstname($firstname)
                ->setOtherfirstname($otherfirstname)
                ->setLastname($lastname)
                ->setDateofbirth($date)
                ->setPlaceofbirth($place)
                ->setEmail($email)
                ->setSex($sex)
                ->setAddress($address)
                ->setEmail($email)
                ->setPhone($phone)
                ->setFunction($function)
                ->setRole($role)
                ->setPassword($password);
            //on enregistre
            $staff->create();

            //select * from table order by desc limit 1
            $lastid = (new StaffsModel())->getLastId();

            $staffsModel = new StaffsModel;
            $onstaff = $staffsModel->find($lastid->id);

            $a = strtoupper(substr($onstaff->firstname, 0, 1));
            $b = strtoupper(substr($onstaff->lastname, 0, 1));

            $year = date('y');
            $formatid = str_pad($lastid->id,4, "0", STR_PAD_LEFT);
            $staffnum = $year.$a.$b.$formatid;
            
            $username = $onstaff->firstname.random_int(111,999);

            $staff = new StaffsModel();
                            
            //on hydrate
            $staff->setId($lastid->id)
                ->setStaffnum($staffnum)
                ->setUsername($username);

            //on enregistre
            $staff->update();

            $sendstaff = $staffsModel->find($lastid->id);
            $to = $sendstaff->email;
		
            $subject = "INITIALISATION DE MOT DE PASSE";
            
            $txt = "le login : $sendstaff->username et le mot de pass : $pass";
            
            $headers = "From: web_school" . "\r\n" ."CC: gestionstagiaire2018@gmail.com";
            
            // Envoyer l'Email
            
            mail($to,$subject,$txt,$headers);

            //on redirige 
            header('Location: /staffs/index?success=true');
            exit;

        }

    }

    public function edit(int $id) {

        $pageTitle = 'Edit staff information';

        $adminModel = new AdminsModel;
        $staffModel = new StaffsModel;
        $functionModel = new FonctionsModel;
        $posteModel = new PostesModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
        
            $staff = $staffModel->find($id);
            $staf = $staffModel->find( $_SESSION['id']);

            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            return $this->render('staffs/edit', compact('pageTitle','staff', 'staf', 'functions', 'postes', 'notifications', 'notification'));
        } else {
            
            $admin = $adminModel->find( $_SESSION['id']);
            $staff = $staffModel->find($id);

            $functions = $functionModel->findAll();
            $postes = $posteModel->findAll();
            return $this->render('staffs/edit', compact('pageTitle','staff', 'admin', 'functions', 'postes'), 'admin_layout');
        }
       
    }

    public function save_edit(int $id) {

        $staffModel = new StaffsModel;

        $staff = $staffModel->find($id);

        
        //on verifi si le formulaire est complet
        if (Model::validate($_POST, ['function', 'poste','evaluation'])){
            //le formulaire est complet
            //on se protege contre les filles xss
           echo 'bonjour'; $funtion = strip_tags($_POST['function']);
            $poste = strip_tags($_POST['poste']);
            $evaluation = strip_tags($_POST['evaluation']);

            $staffModif = new StaffsModel;

            $staffModif->setId($staff->id)
                ->setFunction($funtion)
                ->setRole($poste)
                ->setStaffevaluation($evaluation);

            $staffModif->update();

            //on redirige 
            header('Location: /staffs/index?success=true');
            exit;
        }
    }

    public function delete(int $id)
    {

      $staff = new StaffsModel;

      $staff->delete($id);

      header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    public function show_staff(int $id) {

        $pageTitle = 'Staff details';
        // On instancie le modèle
        $staffModel = new StaffsModel;
        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;
        //$functionModel = new FonctionsModel;
        //$posteModel = new PostesModel;

        if ($_SESSION['login'] != "admin") {
            //$staffs = $staffModel->findAll();
            $staff = $staffModel->find( $_SESSION['id']);
            // On va chercher 1 annonce
            $staf = $staffModel->find($id);

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findBy(['executor' => $_SESSION['id']]);

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
        
            // On envoie à la vue
            $this->render('staffs/show_staff', compact('pageTitle','staff', 'staf', 'projects', 'notifications', 'notification'));
        } else {
            $staff = $staffModel->find($id);
            $admin = $adminModel->find( $_SESSION['id']);
            // On envoie à la vue
            $this->render('staffs/show_staff', compact('pageTitle','staff', 'admin'), 'admin_layout');
        }
        
    }

    //fonction
    // fonction

    public function all_fonction () {

        $pageTitle = 'All functions';

        $adminModel = new AdminsModel;

        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $fonctionsModel = new FonctionsModel;
            $functions = $fonctionsModel->findAll();

            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('staffs/all_fonction', compact('pageTitle', 'functions', 'staff', 'notifications', 'notification'));
        } else {
            $fonctionsModel = new FonctionsModel;
            $functions = $fonctionsModel->findAll();

            
            $admin = $adminModel->find( $_SESSION['id']);

            return $this->render('staffs/all_fonction', compact('pageTitle', 'functions', 'admin'), 'admin_layout');
        }
        
    }

    public function create_function() {
        
        if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);

            $function = new FonctionsModel;
                            
            //on hydrate
            $function->setName($name)
                ->setDescription($description);
            //on enregistre
            $function->create();

            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }

    public function edit_function(int $id) {

        $pageTitle = 'Edit function information';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staffModel = new StaffsModel;
            $staff = $staffModel->find($_SESSION['id']);

            $functionModel = new FonctionsModel;
            $function = $functionModel->find($id);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('projects/edit_category', compact('pageTitle','staff', 'function', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
    
            $functionModel = new FonctionsModel;
            $function = $functionModel->find($id);
    
            return $this->render('staffs/edit_fonction', compact('pageTitle','admin', 'function'), 'admin_layout');
        }
       
    }

    public function save_edit_function(int $id) {

        $functionModel = new FonctionsModel;
        $category = $functionModel->find($id);

        if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);

            $functionModf = new FonctionsModel;
                            
            //on hydrate
            $functionModf->setId($category->id)
                ->setName($name)
                ->setDescription($description);
            //on enregistre
            $functionModf->update();

            header('Location: /staffs/all_fonction?success=true');
            exit;
        }
    }

    public function delete_function(int $id)
    {

        $function = new FonctionsModel;

        $function->delete($id);

        header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    //poste


    public function all_poste () {

        $pageTitle = 'All postes';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;


        if ($_SESSION['login'] != "admin") {
            $PostesModel = new PostesModel;
            $postes = $PostesModel->findAll();

            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('staffs/all_poste', compact('pageTitle', 'postes', 'staff', 'notifications', 'notification'));
        } else {
            $PostesModel = new PostesModel;
            $postes = $PostesModel->findAll();

            
            $admin = $adminModel->find( $_SESSION['id']);

            return $this->render('staffs/all_poste', compact('pageTitle', 'postes', 'admin'), 'admin_layout');
        }
        
    }

    public function Form_poste() {

        $pageTitle = 'Add new poste';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('staffs/add_poste', compact('pageTitle', 'staff', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);

            return $this->render('staffs/add_poste', compact('pageTitle', 'admin'), 'admin_layout');
        }
        
    }

    public function create_poste() {
        
        if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);

            $poste = new PostesModel;
                            
            //on hydrate
            $poste->setName($name)
                ->setDescription($description);
            //on enregistre
            $poste->create();

            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }

    public function edit_poste(int $id) {

        $pageTitle = 'Edit poste information';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
             $staffModel = new StaffsModel;
            $staff = $staffModel->find($_SESSION['id']);

            $postesModel = new PostesModel;
            $poste = $postesModel->find($id);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('staffs/edit_poste', compact('pageTitle','staff', 'poste', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
    
            $postesModel = new PostesModel;
            $poste = $postesModel->find($id);
    
            return $this->render('staffs/poste', compact('pageTitle','admin', 'poste'), 'admin_layout');
        }
       
    }

    public function save_edit_poste(int $id) {

        $categoryModel = new PostesModel;
        $category = $categoryModel->find($id);

        if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);

            $posteModif = new PostesModel;
                            
            //on hydrate
            $posteModif->setId($category->id)
                ->setName($name)
                ->setDescription($description);
            //on enregistre
            $posteModif->update();

            header('Location: /staffs/all_poste?success=true');
            exit;
        }
    }

    public function delete_poste(int $id)
    {

      $poste = new PostesModel;

      $poste->delete($id);

      header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    public function edit_password(){
        $pageTitle = 'Edit my password';
        $this->isAdmin();

        $staffModel = new StaffsModel;
        $staff = $staffModel->find($_SESSION['id']);

        $this->render('staffs/edit_password', compact('staff', 'pageTitle'));
    }

    public function confirm_edit() {
        $pageTitle = 'Edit my password';
        $this->isAdmin();

        if (Model::validate($_POST, ['login', 'email', 'password'])){

            $login = strip_tags($_POST['login']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $staffModel = new StaffsModel;
            $staff = $staffModel->getStaff( ['username' => $login]);

            if (isset($staff) && !empty($staff)) {
                if (password_verify($password, $staff->password)) {
                    $this->render('staffs/confirm_edit', compact('staff', 'pageTitle'));
                } else {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
            } else {
                $em = "the password or login does not match";
                $_SESSION['errors']= $em;
                header("Location: /dashbords/edit_password");
                exit;
            }
        }
    }

    public function confirm(int $id) {
        $this->isAdmin();

        $staffModel = new StaffsModel;
        $staff = $staffModel->find($id);
        if (Model::validate($_POST, ['password', 'password_confirm'])){

            $password = strip_tags($_POST['password']);
            $password_confirm = strip_tags($_POST['password_confirm']);

            if ($password !== $password_confirm) {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            } else {

                $pass = password_hash($password,PASSWORD_BCRYPT);

                $staffModif = new StaffsModel;

                //on hydrate
                $staffModif->setId($staff->id)
                        ->setPassword($pass);
                //on enregistre
                $staffModif->update();
                session_destroy();

                $to = $staff->email;
		
                $subject = "RE-INITIALISATION DE MOT DE PASSE";
                
                $txt = "le login : $staff->username et le mot de pass : $password";
                
                $headers = "From: web_school" . "\r\n" ."CC: gestionstagiaire2018@gmail.com";
                
                // Envoyer l'Email
                
                mail($to,$subject,$txt,$headers);
                return header('Location: /auths/login');
            }
        }
    }

    
}
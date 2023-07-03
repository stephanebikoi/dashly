<?php
namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\Model;
use App\Models\NotificationsModel;
use App\Models\ProjectsModel;
use App\Models\CategoriesModel;
use App\Models\StaffsModel;

class ProjectsController extends Controller{

    public function index () {

        $pageTitle = 'All projects';
        
        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;
        $adminModel = new AdminsModel;

        if ($_SESSION['login'] != "admin") {
            $staff = $staffModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findAll();

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
        
            return $this->render('projects/index', compact('pageTitle', 'projects', 'staff', 'categories', 'notification', 'notifications', 'staffs'));
        
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findAll();

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();
            return $this->render('projects/index', compact('pageTitle', 'projects', 'admin', 'categories', 'staffs'), 'admin_layout');
        }
   
    }

    public function Form_project() {

        $pageTitle = 'Add new project';
        $staffModel = new StaffsModel;
        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            
            $staff = $staffModel->find( $_SESSION['id']);

            $staffs = $staffModel->findAll();

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('projects/add_project', compact('pageTitle', 'staff', 'staffs', 'categories', 'notification', 'notifications'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);

            $staffs = $staffModel->findAll();

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();

            return $this->render('projects/add_project', compact('pageTitle', 'admin', 'staffs', 'categories'), 'admin_layout');
        }
    }

    public function create_project() {
       
        if (Model::validate($_POST, ['name', 'priority', 'category', 'assign','start', 'timestart', 'end', 'timeend', 'description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $priority = strip_tags($_POST['priority']);
            $state = 'new';
            $category = strip_tags($_POST['category']);
            $assign = strip_tags($_POST['assign']);
            $start = strip_tags($_POST['start']);
            $end = strip_tags($_POST['end']);
            $timestart = strip_tags($_POST['timestart']);
            $timeend = strip_tags($_POST['timeend']);
            $description = strip_tags($_POST['description']);

            if (isset($_FILES['attachement']['name']) && !empty($_FILES['attachement']['name'])) {
                $file_name = $_FILES['attachement']['name'];
                $tmp_name = $_FILES['attachement']['tmp_name'];
                $error = $_FILES['attachement']['error'];
                if($error === 0){
        
                    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                    $file_ex_to_lc = strtolower($file_ex);
                    //$allowed_exs = array('jpg', 'jpeg', 'png');
                    //if(in_array($file_ex_to_lc, $allowed_exs)){
                        //$new_file_name = uniqid().'.'.$file_ex_to_lc;
                        $file_upload_path = '../Public/doc/'.$file_name;
                        move_uploaded_file($tmp_name, $file_upload_path);

                        $project = new ProjectsModel;
                            
                        //on hydrate
                        $project->setPriority($priority)
                            ->setState($state)
                            ->setName($name)
                            ->setCategory($category)
                            ->setExecutor($assign)
                            ->setStart($start)
                            ->setEnd($end)
                            ->setTimeStart($timestart)
                            ->setTimeEnd($timeend)
                            ->setDescription($description)
                            ->setFile($file_name);
                        //on enregistre
                        $project->create();

                        $lastid = (new ProjectsModel())->getLastId();

                        $projectModel = new ProjectsModel;
                        $onproject = $projectModel->find($lastid->id);

                        $notifModel = new NotificationsModel;

                        $message = 'Un nouveau projet vous a ete assigne veillez consulter les details';
                        $date = date('y-m-d g:i:s');

                        $notifModel->setName($onproject->name)
                                ->setMessage($message)
                                ->setDestinataire($onproject->executor)
                                ->setReference($onproject->id)
                                ->setDate($date);
                        $notifModel->create();

                        header('Location: /projects/index?success=true');
                        exit;
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /projects/form_project?error=$em");
                    exit;
                }
            } else {
                $project = new ProjectsModel;
                            
                //on hydrate
                $project->setPriority($priority)
                    ->setState($state)
                    ->setName($name)
                    ->setCategory($category)
                    ->setExecutor($assign)
                    ->setStart($start)
                    ->setEnd($end)
                    ->setTimeStart($timestart)
                    ->setTimeEnd($timeend)
                    ->setDescription($description);
                //on enregistre
                $project->create();

                $lastid = (new ProjectsModel())->getLastId();

                $projectModel = new ProjectsModel;
                $onproject = $projectModel->find($lastid->id);

                $notifModel = new NotificationsModel;

                $message = 'Un nouveau projet vous a ete assigne veillez consulter les details';
                $date = date('y-m-d g:i:s');

                $notifModel->setName($onproject->name)
                        ->setMessage($message)
                        ->setDestinataire($onproject->executor)
                        ->setReference($onproject->id)
                        ->setDate($date);
                $notifModel->create();

                header('Location: /projects/index?success=true');
                exit;
            }
        }
    }

    public function edit(int $id) {

        $pageTitle = 'Edit project information';

        $adminModel = new AdminsModel;
        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            
            $staff = $staffModel->find($_SESSION['id']);

            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $project = $projectModel->find($id);

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('projects/edit', compact('pageTitle','staff', 'project', 'staffs', 'categories', 'notification', 'notifications'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);

            $staffs = $staffModel->findAll();

            $projectModel = new ProjectsModel;
            $project = $projectModel->find($id);

            $categoryModel = new CategoriesModel;
            $categories = $categoryModel->findAll();

            return $this->render('projects/edit', compact('pageTitle','admin', 'project', 'staffs', 'categories'), 'admin_layout');
        }
        
    }

    public function save_edit(int $id) {

        $projectModel = new ProjectsModel;

        $project = $projectModel->find($id);

        if (Model::validate($_POST, ['priority', 'assign','start', 'timestart', 'end', 'timeend'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $priority = strip_tags($_POST['priority']);
            $assign = strip_tags($_POST['assign']);
            $start = strip_tags($_POST['start']);
            $end = strip_tags($_POST['end']);
            $timestart = strip_tags($_POST['timestart']);
            $timeend = strip_tags($_POST['timeend']);

            if (isset($_FILES['attachement']['name']) && !empty($_FILES['attachement']['name'])) {
                $file_name = $_FILES['attachement']['name'];
                $tmp_name = $_FILES['attachement']['tmp_name'];
                $error = $_FILES['attachement']['error'];
                if($error === 0){
        
                    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                    $file_ex_to_lc = strtolower($file_ex);
                    $file_upload_path = '../Public/doc/'.$file_name;
                    move_uploaded_file($tmp_name, $file_upload_path);

                    $projectModif = new ProjectsModel;
                        
                    //on hydrate
                    $projectModif->setId($project->id)
                        ->setPriority($priority)
                        ->setExecutor($assign)
                        ->setStart($start)
                        ->setEnd($end)
                        ->setTimeStart($timestart)
                        ->setTimeEnd($timeend)
                        ->setFile($file_name);
                    //on enregistre
                    $projectModif->update();



                    header('Location: /projects/index?success=true');
                    exit;
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /projects/form_project?error=$em");
                    exit;
                }
            } else {
                $projectModif = new ProjectsModel;
                            
                //on hydrate
                $projectModif->setId($project->id)
                    ->setPriority($priority)
                    ->setExecutor($assign)
                    ->setStart($start)
                    ->setEnd($end)
                    ->setTimeStart($timestart)
                    ->setTimeEnd($timeend);
                //on enregistre
                $projectModif->update();

                header('Location: /projects/index?success=true');
                exit;
            }
        }
    }

    public function delete(int $id)
    {

      $project = new ProjectsModel;

      $project->delete($id);

      header('Location: '.$_SERVER['HTTP_REFERER']);

    } 

    public function show_project(int $id) {

        $pageTitle = 'Project details';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            // On instancie le modèle
            $projectModel = new ProjectsModel;
            // On va chercher 1 annonce
            $project = $projectModel->find($id);

            $date1 = strtotime($project->start);
            //$date2 = strtotime($project->end);
            $today = time();
            if ($date1 <= $today) {
                $proj = new ProjectsModel;
                $proj->setId($project->id)
                    ->setState('in progress');
                
                    $proj->update();
            }

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            
            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);

            
            // On envoie à la vue
            $this->render('projects/show_project', compact('pageTitle','project', 'staff', 'notifications', 'notification'));
        } else {
            // On instancie le modèle
            $projectModel = new ProjectsModel;
            // On va chercher 1 annonce
            $project = $projectModel->find($id);
            
            $admin = $adminModel->find( $_SESSION['id']);

            // On envoie à la vue
            $this->render('projects/show_project', compact('pageTitle','project', 'admin', 'admin_layout'));
        }
        
    }

    public function all_category () {

        $pageTitle = 'All categories';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $categoriesModel = new CategoriesModel;
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            $categories = $categoriesModel->findAll();

            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);

            return $this->render('projects/all_category', compact('pageTitle', 'categories', 'staff', 'notifications', 'notification'));
        } else {
            $categoriesModel = new CategoriesModel;
            $categories = $categoriesModel->findAll();

            
            $admin = $adminModel->find( $_SESSION['id']);

            return $this->render('projects/all_category', compact('pageTitle', 'categories', 'admin'), 'admin_layout');
        }
        
    }

 
    public function create_category() {
        
        //if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            if(isset($_POST['save_category'])){
                $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            if($name == NULL || $description == NULL)
            {
                $res = [
                    'status' => 422,
                    'message' => 'All fields are mandatory'
                ];
                echo json_encode($res);
                return;
            }
            $category = new CategoriesModel;
                            
            //on hydrate
            $category->setName($name)
                ->setDescription($description);
            //on enregistre
            $category->create();

            if($category)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
            }
            
       // }
    }

    public function edit_category(int $id) {

        $pageTitle = 'Edit category information';

        $adminModel = new AdminsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
             $staffModel = new StaffsModel;
            $staff = $staffModel->find($_SESSION['id']);

            $categoryModel = new CategoriesModel;
            $category = $categoryModel->find($id);
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('projects/edit_category', compact('pageTitle','staff', 'category', 'notifications', 'notification'));
        } else {
            $admin = $adminModel->find( $_SESSION['id']);
    
            $categoryModel = new CategoriesModel;
            $category = $categoryModel->find($id);
    
            return $this->render('projects/edit_category', compact('pageTitle','admin', 'category'), 'admin_layout');
        }
       
    }

    public function save_edit_category(int $id) {

        $categoryModel = new CategoriesModel;
        $category = $categoryModel->find($id);

        if (Model::validate($_POST, ['name','description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);

            $categoryModif = new CategoriesModel;
                            
            //on hydrate
            $categoryModif->setId($category->id)
                ->setName($name)
                ->setDescription($description);
            //on enregistre
            $categoryModif->update();

            header('Location: /projects/all_category?success=true');
            exit;
        }
    }

    public function delete_category(int $id)
    {

      $category = new CategoriesModel;

      $category->delete($id);

      header('Location: '.$_SERVER['HTTP_REFERER']);

    }
    
    public function show_nofif(int $id) {
        $notificaModel = new NotificationsModel;
        $notifica = $notificaModel->find($id);

        $notifModif = new NotificationsModel;
                            
        //on hydrate
        $notifModif->setId($notifica->id)
            ->setActive(0);
        //on enregistre
        $notifModif->update();

        header('Location: /projects/show_project/'.$notifica->reference);
        exit;
    }
 
}
<?php
namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\Model;
use App\Models\NotificationsModel;
use App\Models\TasksModel;
use App\Models\ProjectsModel;
use App\Models\StaffsModel;

class TasksController extends Controller{

    public function index () {

        $pageTitle = 'All tasks';
        
        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;
        $adminModel = new AdminsModel;

        if ($_SESSION['login'] != "admin") {
            $staff = $staffModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();

            $taskModel = new TasksModel;
            $tasks = $taskModel->findAll();

            $projectModel = new ProjectsModel;
            $projects = $projectModel->findAll();

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
        
            return $this->render('tasks/index', compact('pageTitle', 'tasks', 'staff', 'projects', 'notification', 'notifications', 'staffs'));
        
        } 
    }
 
    public function Form_task() {

        $pageTitle = 'Add new task';
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

            return $this->render('tasks/add_task', compact('pageTitle', 'staff', 'staffs', 'projects', 'notification', 'notifications'));
        } 
    }

    public function create_task() {
       
        if (Model::validate($_POST, ['name', 'priority', 'project', 'assign','start', 'timestart', 'end', 'timeend', 'description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $priority = strip_tags($_POST['priority']);
            $state = 'new';
            $project = strip_tags($_POST['project']);
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

                        $task = new TasksModel;
                            
                        //on hydrate
                        $task->setPriority($priority)
                            ->setState($state)
                            ->setName($name)
                            ->setProject($project)
                            ->setExecutor($assign)
                            ->setStart($start)
                            ->setEnd($end)
                            ->setTimeStart($timestart)
                            ->setTimeEnd($timeend)
                            ->setDescription($description)
                            ->setFile($file_name);
                        //on enregistre
                        $task->create();

                        $lastid = (new TasksModel())->getLastId();

                        $taskModel = new TasksModel;
                        $ontask = $taskModel->find($lastid->id);

                        if ($ontask->project !== 0) {
                            $notifModel = new NotificationsModel;

                            $message = 'Une nouvelle tache vous a ete assigne veillez consulter les details';
                            $date = date('y-m-d g:i:s');

                            $notifModel->setName('task')
                                    ->setMessage($message)
                                    ->setDestinataire($ontask->executor)
                                    ->setReference($ontask->id)
                                    ->setDate($date);
                            $notifModel->create();

                            header('Location: /tasks/index?success=true');
                            exit;
                        } else {
                            header('Location: /tasks/index?success=true');
                            exit;
                        }
                        
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /tasks/form_task?error=$em");
                    exit;
                }
            } else {
                $task = new TasksModel;
                            
                //on hydrate
                $task->setPriority($priority)
                    ->setState($state)
                    ->setName($name)
                    ->setProject($project)
                    ->setExecutor($assign)
                    ->setStart($start)
                    ->setEnd($end)
                    ->setTimeStart($timestart)
                    ->setTimeEnd($timeend)
                    ->setDescription($description);
                //on enregistre
                $task->create();

                $lastid = (new TasksModel())->getLastId();

                $taskModel = new TasksModel;
                $ontask = $taskModel->find($lastid->id);

                if ($ontask->project !== 0) {
                    $notifModel = new NotificationsModel;

                    $message = 'Une nouvelle tache vous a ete assigne veillez consulter les details';
                    $date = date('y-m-d g:i:s');

                    $notifModel->setName('task')
                            ->setMessage($message)
                            ->setDestinataire($ontask->executor)
                            ->setReference($ontask->id)
                            ->setDate($date);
                    $notifModel->create();

                    header('Location: /tasks/index?success=true');
                    exit;
                } else {
                    header('Location: /tasks/index?success=true');
                    exit;
                }
            }
        }
    }

    public function edit(int $id) {

        $pageTitle = 'Edit task information';

        $adminModel = new AdminsModel;
        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            
            $staff = $staffModel->find($_SESSION['id']);

            $staffs = $staffModel->findAll();

            $taskModel = new TasksModel;
            $task = $taskModel->find($id);

            $projectModel = new  ProjectsModel;
            $projects = $projectModel->findAll();
            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('tasks/edit', compact('pageTitle','staff', 'task', 'staffs', 'projects', 'notification', 'notifications'));
        } 
        
    }

    public function save_edit(int $id) {

        $taskModel = new TasksModel;

        $task = $taskModel->find($id);

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

                    $taskModif = new TasksModel;
                        
                    //on hydrate
                    $taskModif->setId($task->id)
                        ->setPriority($priority)
                        ->setExecutor($assign)
                        ->setStart($start)
                        ->setEnd($end)
                        ->setTimeStart($timestart)
                        ->setTimeEnd($timeend)
                        ->setFile($file_name);
                    //on enregistre
                    $taskModif->update();



                    header('Location: /tasks/index?success=true');
                    exit;
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /tasks/form_project?error=$em");
                    exit;
                }
            } else {
                $taskModif = new TasksModel;
                            
                //on hydrate
                $taskModif->setId($task->id)
                    ->setPriority($priority)
                    ->setExecutor($assign)
                    ->setStart($start)
                    ->setEnd($end)
                    ->setTimeStart($timestart)
                    ->setTimeEnd($timeend);
                //on enregistre
                $taskModif->update();

                header('Location: /tasks/index?success=true');
                exit;
            }
        }
    }

    public function delete(int $id){

        $task = new TasksModel;

        $task->delete($id);

        header('Location: '.$_SERVER['HTTP_REFERER']);

    } 

    public function show_task(int $id) {

        $pageTitle = 'Task details';

        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            // On instancie le modèle
            $taskModel = new TasksModel;
            // On va chercher 1 annonce
            $task = $taskModel->find($id);

            $date1 = strtotime($task->start);
            //$date2 = strtotime($task->end);
            $today = time();
            if ($date1 <= $today) {
                $tas = new TasksModel;
                $tas->setId($task->id)
                    ->setState('in progress');
                
                    $tas->update();
            }

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            
            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);

            
            // On envoie à la vue
            $this->render('tasks/show_task', compact('pageTitle','task', 'staff', 'notifications', 'notification'));
        } 
        
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

        header('Location: /tasks/show_task/'.$notifica->reference);
        exit;
    }

    public function create_task_to_project(int $id) {

        //$projectModel = new ProjectsModel;
        //$project = $projectModel->find($id);

        if (Model::validate($_POST, ['name', 'priority', 'assign','start', 'timestart', 'end', 'timeend', 'description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $priority = strip_tags($_POST['priority']);
            $state = 'new';
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

                        $task = new TasksModel;
                            
                        //on hydrate
                        $task->setPriority($priority)
                            ->setState($state)
                            ->setName($name)
                            ->setProject($id)
                            ->setExecutor($assign)
                            ->setStart($start)
                            ->setEnd($end)
                            ->setTimeStart($timestart)
                            ->setTimeEnd($timeend)
                            ->setDescription($description)
                            ->setFile($file_name);
                        //on enregistre
                        $task->create();

                        $lastid = (new TasksModel())->getLastId();

                        $taskModel = new TasksModel;
                        $ontask = $taskModel->find($lastid->id);

                        if ($ontask->project !== 0) {
                            $notifModel = new NotificationsModel;

                            $message = 'Une nouvelle tache vous a ete assigne veillez consulter les details';
                            $date = date('y-m-d g:i:s');

                            $notifModel->setName('task')
                                    ->setMessage($message)
                                    ->setDestinataire($ontask->executor)
                                    ->setReference($ontask->id)
                                    ->setDate($date);
                            $notifModel->create();

                            header('Location: /projects/show_project/'.$id);
                            exit;
                        } else {
                            header('Location: /projects/show_project/'.$id);
                            exit;
                        }
                        
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /tasks/form_task?error=$em");
                    exit;
                }
            } else {
                $task = new TasksModel;
                            
                //on hydrate
                $task->setPriority($priority)
                    ->setState($state)
                    ->setName($name)
                    ->setProject($id)
                    ->setExecutor($assign)
                    ->setStart($start)
                    ->setEnd($end)
                    ->setTimeStart($timestart)
                    ->setTimeEnd($timeend)
                    ->setDescription($description);
                //on enregistre
                $task->create();

                $lastid = (new TasksModel())->getLastId();

                $taskModel = new TasksModel;
                $ontask = $taskModel->find($lastid->id);

                if ($ontask->project !== 0) {
                    $notifModel = new NotificationsModel;

                    $message = 'Une nouvelle tache vous a ete assigne veillez consulter les details';
                    $date = date('y-m-d g:i:s');

                    $notifModel->setName('task')
                            ->setMessage($message)
                            ->setDestinataire($ontask->executor)
                            ->setReference($ontask->id)
                            ->setDate($date);
                    $notifModel->create();

                    header('Location: /projects/show_project/'.$id);
                    exit;
                } else {
                    header('Location: /tasks/index?success=true');
                    exit;
                }
            }
        }
    }
}
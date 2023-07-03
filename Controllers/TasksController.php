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

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
        
            return $this->render('tasks/index', compact('pageTitle', 'tasks', 'staff', 'notification', 'notifications', 'staffs'));
        
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

                            $notifModel->setName($ontask->name)
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

                    $notifModel->setName($ontask->name)
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
}
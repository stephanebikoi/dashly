<?php
namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\Model;
use App\Models\NotificationsModel;
use App\Models\TasksModel;
use App\Models\ProjectsModel;
use App\Models\StaffsModel;

class ChatsController extends Controller{

    public function index () {

        $pageTitle = 'Chat';
        
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
        
            return $this->render('chats/index', compact('pageTitle', 'tasks', 'staff', 'notification', 'notifications', 'staffs'));
        
        } 
    }
}
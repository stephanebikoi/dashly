<?php
namespace App\Controllers;
use App\Models\Model;
use App\Models\NotificationsModel;
use App\Models\MaterialsModel;
use App\Models\StaffsModel;

class MaterialsController extends Controller{

    public function index () {

        $pageTitle = 'All materials';
        
        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            $staff = $staffModel->find( $_SESSION['id']);


            $materialModel = new MaterialsModel;
            $materials = $materialModel->findAll();

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
        
            return $this->render('materials/index', compact('pageTitle', 'materials', 'staff', 'notification', 'notifications'));
        }
   
    }

    public function from_material() {

        $pageTitle = 'Add new material';
        $staffModel = new StaffsModel;

        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            
            $staff = $staffModel->find( $_SESSION['id']);

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('materials/add_material', compact('pageTitle', 'staff', 'notification', 'notifications'));
        } 
    }

    public function create_material() {
       
        if (Model::validate($_POST, ['name', 'brand', 'serial','date', 'price', 'description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $brand = strip_tags($_POST['brand']);
            $serial = strip_tags($_POST['serial']);
            $state = 'new';
            $date = strip_tags($_POST['date']);
            $price = strip_tags($_POST['price']);
            $description = strip_tags($_POST['description']);

            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $file_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
                if($error === 0){
        
                    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                    $file_ex_to_lc = strtolower($file_ex);
                    //$allowed_exs = array('jpg', 'jpeg', 'png');
                    //if(in_array($file_ex_to_lc, $allowed_exs)){
                        //$new_file_name = uniqid().'.'.$file_ex_to_lc;
                        $file_upload_path = '../Public/img/materials/'.$file_name;
                        move_uploaded_file($tmp_name, $file_upload_path);

                        $material = new MaterialsModel;
                            
                        //on hydrate
                        $material->setbrand($brand)
                            ->setState($state)
                            ->setName($name)
                            ->setDatepurchase($date)
                            ->setPurchaseprice($price)
                            ->setNum_serie($serial)
                            ->setDescription($description)
                            ->setImage($file_name);
                        //on enregistre
                        $material->create();

                        header('Location: /materials/index?success=true');
                        exit;
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /materials/form_material?error=$em");
                    exit;
                }
            } else {
                $material = new MaterialsModel;

                $material->setbrand($brand)
                    ->setState($state)
                    ->setName($name)
                    ->setDatepurchase($date)
                    ->setPurchaseprice($price)
                    ->setNum_serie($serial)
                    ->setDescription($description);
                //on enregistre
                $material->create();

                header('Location: /materials/index?success=true');
                exit;

            }
        }
    }

    public function edit(int $id) {

        $pageTitle = 'Edit material information';

        $staffModel = new StaffsModel;
        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            
            $staff = $staffModel->find($_SESSION['id']);


            $materialModel = new MaterialsModel;
            $material = $materialModel->find($id);

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);

            return $this->render('materials/edit', compact('pageTitle','staff', 'material', 'notification', 'notifications'));
        } 
        
    }

    public function save_edit(int $id) {

        $materialModel = new MaterialsModel;

        $material = $materialModel->find($id);

        if (Model::validate($_POST, ['name', 'brand', 'serial','date', 'state', 'price', 'description'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $name = strip_tags($_POST['name']);
            $brand = strip_tags($_POST['brand']);
            $serial = strip_tags($_POST['serial']);
            $state = strip_tags($_POST['state']);
            $date = strip_tags($_POST['date']);
            $price = strip_tags($_POST['price']);
            $description = strip_tags($_POST['description']);

            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $file_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
                if($error === 0){
        
                    $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                    $file_ex_to_lc = strtolower($file_ex);
                    $file_upload_path = '../Public/img/materials/'.$file_name;
                    move_uploaded_file($tmp_name, $file_upload_path);

                    $materialModif = new materialsModel;
                        
                    //on hydrate
                    $materialModif->setId($material->id)
                            ->setbrand($brand)
                            ->setState($state)
                            ->setName($name)
                            ->setDatepurchase($date)
                            ->setPurchaseprice($price)
                            ->setNum_serie($serial)
                            ->setDescription($description)
                            ->setImage($file_name);
                    //on enregistre
                    $materialModif->update();



                    header('Location: /materials/index?success=true');
                    exit;
                    
                } else{
                    $em = "erreur iconnu !";
                    header("Location: /materials/form_material?error=$em");
                    exit;
                }
            } else {
                $materialModif = new materialsModel;
                            
                //on hydrate
                $materialModif->setId($material->id)
                        ->setbrand($brand)
                        ->setState($state)
                        ->setName($name)
                        ->setDatepurchase($date)
                        ->setPurchaseprice($price)
                        ->setNum_serie($serial)
                        ->setDescription($description);
                //on enregistre
                $materialModif->update();

                header('Location: /materials/index?success=true');
                exit;
            }
        }
    }

    public function delete(int $id)
    {

      $material = new MaterialsModel;

      $material->delete($id);

      header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    public function show_material(int $id) {

        $pageTitle = 'material details';

        $notificationModel = new NotificationsModel;

        if ($_SESSION['login'] != "admin") {
            // On instancie le modèle
            $materialModel = new MaterialsModel;
            // On va chercher 1 annonce
            $material = $materialModel->find($id);
            $materials = $materialModel->findAll();

            $notifications = $notificationModel->findBy(['active' => 1, 'destinataire' => $_SESSION['id']]);
            $notification = $notificationModel->deactiveNotifications($_SESSION['id']);
            
            $staffModel = new StaffsModel;
            $staff = $staffModel->find( $_SESSION['id']);
            $staffs = $staffModel->findAll();
 
            
            // On envoie à la vue
            $this->render('materials/show_material', compact('pageTitle', 'material', 'staff', 'notifications', 'notification'));
        } 
        
    }
}
<?php
namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\Model;
use App\Models\StaffsModel;
use App\Models\FonctionsModel;

class AuthsController extends Controller {
    
    public function login () {
        return $this->render('auths/login',[], 'home');
    }

    public function login_staff() {

        if (Model::validate($_POST, ['username', 'password'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $username = strip_tags($_POST['username']);
            $password = strip_tags($_POST['password']);

            $staffsModel = new StaffsModel;
            $staff = $staffsModel->getStaff(['username' => $username]);

            if (isset($staff) && !empty($staff)) {
                $functionModel = new FonctionsModel;
                $function = $functionModel->find($staff->function);
                
                if (password_verify($password, $staff->password)) {
                    

                    $_SESSION['auth'] = true;
                    $_SESSION['id']=$staff->id;
                    $_SESSION['login']=$staff->username;
                    $_SESSION['poste']=$staff->role;
                    $_SESSION['function']= $function->name;
        
                    return header('Location: /dashboards');
                } else {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
            } else {
                $em = "the password or login does not match";
                $_SESSION['errors']= $em;
                header("Location: /auths/login");
                exit;
            }
            
        }
    }

    public function logout() {
        session_destroy();

        return header('Location: /auths/login');
    }

    public function login_admin () {
        return $this->render('auths/admin',[], 'home');
    }

    public function commect_admin() {

        if (Model::validate($_POST, ['login', 'password'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);

            $adminsModel = new AdminsModel;
            $admin = $adminsModel->getAdmin(['login' => $login]);

            if (isset($admin) && !empty($admin)) {
                if (password_verify($password, $admin->password)) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id']=$admin->id;
                    $_SESSION['login']=$admin->login;
                    $_SESSION['password']= $admin->password;
        
                    return header('Location: /dashboards');
                } else {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
            } else {
                $em = "the password or login does not match";
                $_SESSION['errors']= $em;
                header("Location: /auths/login_admin");
                exit;
            }
            
        }
    }

    public function reset_password () {
        return $this->render('auths/reset_password',[], 'home');
    }

    public function reset() {

        if (Model::validate($_POST, ['login', 'email'])){
            //le formulaire est complet
            //on se protege contre les filles xss
            $login = strip_tags($_POST['login']);
            $email = strip_tags($_POST['email']);

            $staffsModel = new StaffsModel;
            $staff = $staffsModel->getStaff(['username' => $login]);

            if (isset($staff) && !empty($staff)) {
                if ($email=== $staff->email) {

                    $pass = Model::passgen(8);
                    $password = password_hash($pass,PASSWORD_BCRYPT);

                    $staffModif = new StaffsModel();
                            
                    //on hydrate
                    $staffModif->setId($staff->id)
                        ->setPassword($password);
        
                    //on enregistre
                    $staffModif->update();

                    $to = $staff->email;
		
                    $subject = "INITIALISATION DE MOT DE PASSE";
                    
                    $txt = "le login : $staff->username et le mot de pass : $pass";
                    
                    $headers = "From: web_school" . "\r\n" ."CC: gestionstagiaire2018@gmail.com";
                    
                    // Envoyer l'Email
                    
                    mail($to,$subject,$txt,$headers);

                    header('Location: /auths/login');
                    exit;
                } else {
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }
            } else {
                $em = "the password or login does not match";
                $_SESSION['errors']= $em;
                header("Location: /auths/login");
                exit;
            }
            
        }
    }
}
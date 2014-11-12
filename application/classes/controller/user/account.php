<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Account extends Controller_Application {

    //if time permits before I send Deon, develop a custom mailer class to use across project!!!!
    protected function emailer($email, $namesurname = '', $msgheading, $msgbody1 = '', $msgbody2){

        $to = $email;
        $subject = "Mukuru Assignment | {$msgheading}";
        $message = "<h1>Mukuru Assignment | {$msgheading} </h1>";
        $message .= "<b>{$namesurname}</b>  {$msgbody1}";
        $message .= "<br>{$msgbody2}</br>";
        $header = "From:Clive C. Shumba<clive@mukuru.com> \r\n";
        $header .= "Cc:clive@cornelo.us \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        $retval = mail ($to,$subject,$message,$header);
        return $retval;
    }

    /*
     * Handles logins for both normal and admin users
     */
    public function action_login()
    {
        $referrer = Request::$referrer;

        $this->template->view = View::factory('account/login')
            ->bind('user', $user)
            ->bind('referrer', $referrer)
            ->bind('errors', $errors);


        if ($_POST)
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new Model_User;
            $loggeduser = $user->login($username, $password);

            $admin = new Model_Administrator;
            $loggedadmin = $admin->login ($username,$password);

            if ($loggeduser) {
                foreach ($loggeduser as $user) {
                    $session = Session::instance();
                    $session->set('username', $user['username']);
                }
                //redirect to user profile i.e login as user
                $this->request->redirect('user_profile/index/');
            }
            elseif ($loggedadmin) {
                foreach ($loggedadmin as $admin) {
                    $session = Session::instance();
                    $session->set('username', $admin['username']);
                }
                //redirect to user profile i.e login as admin
                $this->request->redirect('welcome');
            }

        }
    }

    public function action_logout()
    {
        $session = Session::instance();
        $success = $session->destroy();
        if ($success){
            $this->request->redirect('login');
        }
    }

    public function action_signup()
    {

        if ($_POST)
        {

            $post = new Validate($_POST);
            $post ->rule('username', 'not_empty');
            $post ->rules('password', array(
                'not_empty' => NULL,
                'max_length' => 50
            ));

            if ($post->check())
            {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $namesurname = $_POST['namesurname'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $country = $_POST['country'];
                    $email = $_POST['email'];
                    $phonenumber = $_POST['phonenumber'];
                    $image = $_POST['image'];
                    $verification = md5(uniqid(rand()));

                    $user = new Model_User;
                    $newuser = $user->add($username, $password, $namesurname, $address, $city, $country, $email, $phonenumber, $image, $verification, 0);

                    //$baseurl = URL::base();
                    $baseurl = 'http://cornelo.us/index.php/';
                    $verificationlink = $baseurl ."verify?v=".$verification;
                    $msgheading =  'Email Verification';
                    $msgbody1 = 'thank you for signing up.';
                    $msgbody2 = 'Please verify your email address by clicking the link below:-<br><a href="' .$verificationlink . '">Please verifiy your email</a>';


                    $mailsent = $this->emailer($email,$namesurname,$msgheading,$msgbody1, $msgbody2 );
                    if ($mailsent) {
                        var_dump($baseurl);
                    }
            }
            $errors = $post->errors();
        }
        $this->template->view  = View::factory('account/signup')
            ->bind('user', $user)
            ->bind('errors', $errors);
    }

    public function action_reset()
    {
        $view= View::factory('account/reset');
        $this->template->view = $view;

        if ($_POST)
        {
            $email = $_POST['email'];
            $user = new Model_User;
            $newpassword = $user->resetpassword($email);

            $msgheading =  'New Password';
            $msgbody2 = "Your new password is {$newpassword}";

            $mailsent = $this->emailer($email,'', $msgheading,'',$msgbody2);

            if ($mailsent){
                echo "Password Reset!";
            }
        }
    }

    public function action_verify()
    {
        if ($_GET){
            $token = $_GET['v'];
            $verify = new Model_User;
            $verified = $verify->verifytoken($token);

            if ($verified) {
                foreach ($verified as $verifieduser) {
                    $session = Session::instance();
                    $session->set('username', $verifieduser['username']);
                }
            }

            //redirect to user profile i.e login as user
            $this->request->redirect('user_profile/index/');
        }
    }


    public function action_noaccess()
    {
        $view = View::factory('account/noaccess');
    }


}

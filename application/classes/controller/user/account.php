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

    protected function _save_image($image)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }

        $directory = DOCROOT.'uploads/';

        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';

            Image::factory($file)
                ->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);

            // Delete the temporary file
            unlink($file);

            return $filename;
        }

        return FALSE;
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

            if (!$loggeduser && !$loggedadmin) {
                $invalidlogins = true;
                $this->template->view = View::factory('account/login')
                    ->bind('user', $user)
                    ->bind('referrer', $referrer)
                    ->bind('errors', $invalidlogins);

            }

        }
    }

    public function action_logout()
    {
        $session = Session::instance();
        $success = $session->destroy();
        if ($success){
            $this->request->redirect('msg?msg=logout');
        }
    }

    public function action_signup()
    {
            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
            }


//        if ( ! $filename)
//        {
//            $error_message = 'There was a problem while uploading the image.
//                Make sure it is uploaded and must be JPG/PNG/GIF file.';
//        }

        if ($_POST)
        {
            $post = new Validate($_POST);
            $post ->rule('username', 'not_empty');
            $post ->rule('email', 'not_empty');
            $post ->rule('email', 'email');
            $post ->rule('password', 'not_empty');
            $post ->rule('password', 'min_length', array(6));
            $post ->rule('namesurname', 'not_empty');
            $post ->rule('password', 'matches', array('password_confirm'));
            $post ->rule('password_confirm', 'matches', array('password'));
            $post ->rule('address', 'not_empty');
            $post ->rule('city', 'not_empty');
            $post ->rule('country', 'not_empty');
            $post ->rule('phonenumber', 'not_empty');
            $post->rule('username', 'Model_User::unique_username');

//            var_dump($_FILES['avatar']);

            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
//            var_dump($_FILES['avatar']);
            }

            if (($post->check()) && $filename)
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
                    $newuser = $user->add($username, $password, $namesurname, $address, $city, $country, $email, $phonenumber, $filename, $verification, 0);

                    //$baseurl = URL::base();
                    $baseurl = 'http://cornelo.us/index.php/';
                    $verificationlink = $baseurl ."verify?v=".$verification;
                    $msgheading =  'Email Verification';
                    $msgbody1 = 'thank you for signing up.';
                    $msgbody2 = 'Please verify your email address by clicking the link below:-<br><a href="' .$verificationlink . '">Please verifiy your email</a>';


                    $mailsent = $this->emailer($email,$namesurname,$msgheading,$msgbody1, $msgbody2 );
                    if ($mailsent) {
                        $this->request->redirect('msg?msg=newsignup');
                    }
            }
            $errors = $post->errors();
        }
        $this->template->view  = View::factory('account/signup')
            ->bind('user', $user)
            ->bind('username', $_POST['username'])
            ->bind('email', $_POST['email'])
            ->bind('namesurname', $_POST['namesurname'])
            ->bind('address', $_POST['address'])
            ->bind('city', $_POST['city'])
            ->bind('country', $_POST['country'])
            ->bind('phonenumber', $_POST['phonenumber'])
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

            if ($newpassword)
            {

                $msgheading =  'New Password';
                $msgbody2 = "Your new password is {$newpassword}";

                $mailsent = $this->emailer($email,'', $msgheading,'',$msgbody2);

                if ($mailsent){
                    $this->request->redirect('msg?msg=pwdreset');
                }
            }

            if (!$newpassword)
            {
                $this->request->redirect('msg?msg=emailnot');
            }



        }
    }

    public function action_verify()
    {
        if ($_GET){
            $token = $_GET['v'];
            $verify = new Model_User;
            $verified = $verify->verifytoken($token);

//            if ($verified) {
//                foreach ($verified as $verifieduser) {
//                    $session = Session::instance();
//                    $session->set('username', $verifieduser['username']);
//                }
//            }
        }
        $this->request->redirect('msg?msg=verified');
    }


    public function action_msg()
    {
        /**
         *
         *
        $referrer = Request::$referrer;
        //protecting my controllers --- to make a helper class later
        if (!isset($referrer))
        {
            $this->request->redirect('login');
        } **/

        $msg = $_GET['msg'];
        $view= View::factory('account/msg')
            ->bind('msg', $msg);

        $this->template->view = $view;
    }


}

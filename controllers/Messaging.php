<?php

class Messaging extends Controller
{

    public function sendFormInfoRequest($args=NULL)
    {
        require(Config::$abs_path . '/libs/php/PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer(true); //the true param means it will throw exceptions on errors, which we need to catch

        $form_data = array();
        parse_str($this->post["form_data"], $form_data);

        // Message
        $html = Lang::$message . " " . $form_data["message"] . "<br/><br/>";
        $alt  = Lang::$message . " " . $form_data["message"] . "\n\n";
        // Surname/Name
        $html.= $form_data["surname"] . " " . $form_data["name"] . "<br/>";
        $alt .= $form_data["surname"] . " " . $form_data["name"] . "\n";
        // Specialization/Role
        $html.= $form_data["specialization"] . "<br/>";
        $alt .= $form_data["specialization"] . "\n";
        // Phone
        $html.= "<strong>" . Lang::$phone . ": </strong>" . $form_data["phone"] . "<br/>";
        $alt .= Lang::$phone . ": " . $form_data["phone"] . "\n";
        // EMail
        $html.= "<strong>" . Lang::$email . ": </strong>" . $form_data["email"] . "<br/>";
        $alt .= Lang::$email . ": " . $form_data["email"] . "\n";
        // Sender URL
        $html.= "<strong>" . Lang::$position . ": </strong>" . $this->post["sender_url"] . "<br/>";
        $alt .= Lang::$position . $this->post["sender_url"] . "\n";

        // Send Message
        try {
            $mail->AddReplyTo($form_data["email"], $form_data["name"] . " " . $form_data["surname"]);
            $mail->AddAddress(Config::$owner_email, Config::$site_name . " Admin");
            $mail->SetFrom($form_data["email"], $form_data["name"] . " " . $form_data["surname"]);            
            $mail->Subject = Lang::$info_request . " - " . $form_data["name"] . " " . $form_data["surname"] . " (" . $form_data["specialization"] . ")";
            $mail->AltBody = $alt;
            $mail->MsgHTML($html);
            //$mail->AddAttachment('images/phpmailer.gif');      // attachment            
            $mail->Send();
            echo json_encode(array("status"=>1, "message"=>"email_sent"));
        } catch (phpmailerException $e) {
            json_encode(array("status"=>0, "message"=>$e->errorMessage()));
        } catch (Exception $e) {
            json_encode(array("status"=>0, $e->getMessage()));
        }
    }


}
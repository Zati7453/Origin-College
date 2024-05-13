<?php
namespace App\Helpers;

use App\Helpers\ReturnHelper;
use App\Models\CustomEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\EmailLog;
use App\Helpers\SystemHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EmailHelper
{

    public static function sendEmail($email, $subject, $email_type, $body, $attachments = [])
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        try {
            $chekAppEnv = SystemHelper::checkAppMailEvoirment($email);

            if($chekAppEnv) {
                $mail->isSMTP();
                $mail->Timeout = 60;
                $mail->CharSet = 'UTF-8';
                $mail->Host = 'smtp.zoho.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'itsupport@vrda1.net';
                $mail->Password = 'vrdaOne@1234';
                $mail->SMTPSecure = 'TLS';
                $mail->Port = 587;
                $mail->setFrom('itsupport@vrda1.net', 'VRDa1');
                $mail->addAddress($email);
                $mail->addReplyTo('noreply@vrda1.com', 'No-reply');
                $mail->isHTML(true);
                $mail->Subject = "VRDa1 - " . $subject;
                $mail->Body = $body;
                $mail->MsgHTML = $body;
                $mail->AltBody = $body;
                if(!empty($attachments)) {
                    if(count($attachments) > 1) {
                        foreach($attachments as $attachment) {
                            $mail->AddAttachment($attachment['abs_path'], $attachment['name']);
                        }
                    } else {
                        $mail->AddAttachment($attachments[0]['abs_path'], $attachments[0]['name']);
                    }
                }
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str"; echo "<br>";};
                // For most clients expecting the Priority header:
                // 1 = High, 2 = Medium, 3 = Low
                $mail->Priority = 1;
                // MS Outlook custom header
                // May set to "Urgent" or "Highest" rather than "High"
                $mail->AddCustomHeader("X-MSMail-Priority: High");
                // Not sure if Priority will also set the Importance header:
                $mail->AddCustomHeader("Importance: High");

                if (!$mail->send()) {
                    $response = $mail->getSMTPInstance()->getError();
                    self::emailLogSaved($email, "VRDa1 - ".$subject, $body, 'failed', $email_type,'try','Failed to send Email.',$response);
                    SystemHelper::Vrda1ErrorsLog('Email Try','','',$mail->getSMTPInstance()->getError(),'');
                    throw new \Exception("Failed to send Email. Please try again later");
                }

                self::emailLogSaved($email, "VRDa1 - ".$subject, $body, 'sent', $email_type);
            }
        } catch (Exception $e) {
            $response = $mail->getSMTPInstance()->getError();
            self::emailLogSaved($email, "VRDa1 - ".$subject, $body, 'failed', $email_type,'catch',$e->getMessage(),$response);

            SystemHelper::Vrda1ErrorsLog('Email Catch',$e->getLine(),$e->getFile(),$e->getMessage(),$e->getCode());
            throw new \Exception("Failed to send Email. Please try again later");
        }
    }

    public static function emailLogSaved($emailTo,$emailSubject,$emailBody,$emailStatus,$emailType,$type='try',$error_message=null,$response=null) {
        DB::beginTransaction();
        try {
            $emailLog = new EmailLog();
            $emailLog->email_to = $emailTo;
            $emailLog->email_subject = $emailSubject;
            $emailLog->email_content = $emailBody;
            $emailLog->email_status = $emailStatus;
            $emailLog->email_type = $emailType;
            $emailLog->type = $type;
            $emailLog->fail_message = $error_message;
            $emailLog->error = !empty($response) ? !empty($response['error']) ? $response['error'] : null : null;
            $emailLog->smtp_code = !empty($response) ? !empty($response['smtp_code']) ? $response['smtp_code'] : null : null;
            $emailLog->smtp_code_ex = !empty($response) ? !empty($response['smtp_code_ex']) ? $response['smtp_code_ex'] : null : null;
            $emailLog->action_by = (Auth::check() ? Auth::id() : 0);
            $emailLog->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Failed to send Email. Please try again later");
        }
    }

    public static function registerComplete($user)
    {
        $email = $user->email;
        self::sendEmail($email, "Welcome to VRDa1",'Register', view('emails.register')
            ->with('user', $user)
            ->render()
        );
    }

    public static function adminRegisterMail($user)
    {
        $email = $user['user_email'];
        self::sendEmail($email, "Welcome Admin to VRDa1",'Register', view('super_admin.email.admin_register')
            ->with('user', $user)
            ->render()
        );
    }
    public static function verificatonEmail($user, $type="Email Verification")
    {
        $url = encrypt($user);
        self::sendEmail($user->email, "Welcome to VRDa1", $type, view('emails.verification')
            ->with('user', $user)
            ->with('token', $url)
            ->render()
        );
    }

    public static function inviteEmail($url, $email, $sender_fullname, $to_invite_name)
    {
        self::sendEmail($email, "Joining Invitation", 'Invitation', view('emails.invite')
            ->with('url', $url)
            ->with('sender', $sender_fullname)
            ->with('full_name', $to_invite_name)
            ->render()
        );
    }

    public static function loginEmail($user, $time)
    {
        $email = $user->email;
        self::sendEmail($email, "Login alert", 'Login', view('emails.login')
            ->with('user', $user)
            ->with('time', $time)
            ->render()
        );
    }


    public static function sendTransactionForgetPassword($user,$module='web') {
        try {
            $url = Crypt::encrypt($user->id.'^'.$user->name);
            if($user->userBlock->email_status == 'active') {
                self::sendEmail($user->email, "Reset Transaction Password", 'Reset Transaction Password', view('emails.reset_transaction_password')
                    ->with('user', $user)
                    ->with('url', $url)
                    ->with('module', $module)
                    ->render()
                );

                return ReturnHelper::Success();
            }
        } catch (\Exception $e) {
            return ReturnHelper::Failed();
        }
    }

    public static function correctEmailVerify($user) {
        try {
            // $user['user_email']
            self::sendEmail($user['correct_email'], 'Email Verification', 'Email Verification', view('emails.correct_email_verification')
                ->with('user', $user)
                ->render()
            );

            return ReturnHelper::Success();
        } catch (\Exception $e) {
            return ReturnHelper::Failed();
        }
    }

    public static function sendCustomEmail($user_id, $send_to, $email_id, $attachments) {
        try {
            $user = User::where('id',$user_id)->first();
            $custom_email = CustomEmail::where('id',$email_id)->where('status','sending')->first();

            self::sendEmail($send_to, $custom_email->subject,'Custom Email', view('emails.custom_email')
                ->with('user', $user)
                ->with('subject', $custom_email->subject)
                ->with('banner', $custom_email->banner)
                ->with('body', $custom_email->content)
                ->render(),
                $attachments);

            return ReturnHelper::Success();
        } catch (\Exception $e) {
            return ReturnHelper::Failed();
        }
    }

    public static function customResetPasswordEmail($user, $token, $module='web') {
        try {
            self::sendEmail($user->email, 'Reset Password', 'Reset Password', view('emails.forgot_password')
                ->with('user', $user)
                ->with('token', $token)
                ->with('subject', 'Reset Password')
                ->with('module', $module)
                ->render());

            return ReturnHelper::Success();
        } catch (\Exception $e) {
            return ReturnHelper::Failed();
        }
    }

}

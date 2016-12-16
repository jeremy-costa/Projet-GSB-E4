<?php
namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use App\metier\LignComm;
use App\metier\Commande;
use Request;
use Illuminate\Support\Facades\Mail;



class EmailController extends Controller {
    
    
    public function sendMailWelcome($user_email, $user_name) {
           $title = "Welcome";
        $content = "je suis le contenu du mail";
       
        
       
            $data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'content' => $content];
            Mail::send('mail', $data, function($message) use($data)
            {
                $subject=$data['subject'];
                $message->from('SiteCopec@gmail.com');
                $message->to($data['email'], $data['email'])->subject($subject);
            });
        
     
    return redirect('/');
    
}


        }
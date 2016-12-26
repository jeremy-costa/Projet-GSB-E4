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
           $title = "Finalisation de l'inscription";
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
public function envoiMdp() {
    
      $login = Request::input('login');
      $mail = Request::input('email');
      $unClient = new Client();
        $connected = $unClient->getClientExistance($login, $mail);
       
    
        if ($connected) {
              $mdp= $unClient->getMdpClient($login, $mail);
              $title = "Nouveau mot de passe";
              $content = "je suis le contenu du mail";
              $erreur="";
        
       
            $data = ['email'=> $mail,'mdp'=> $mdp,'subject' => $title, 'content' => $content];
            Mail::send('mailMdp', $data, function($message) use($data)
            {
                
                $subject=$data['subject'];
                $message->from('SiteCopec@gmail.com');
                $message->to($data['email'], $data['email'])->subject($subject);
            });
            
            return view('formLogin', compact('erreur'));
        } else {
            $erreur = "Login ou email incorrect";
            return view('formMdpOublie', compact('erreur'));
        }
      
}

        }
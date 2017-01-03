<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use App\metier\LignComm;
use App\metier\Commande;
use Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmailController extends Controller {

    public function sendMailWelcome($user_email, $user_name) { //fonction pour le mail de bienvenue lors de l'inscription
        $title = "Welcome";
        $content = "je suis le contenu du mail";



        $data = ['email' => $user_email, 'name' => $user_name, 'subject' => $title, 'content' => $content]; // ici ce sont les données qui sont transmis dans le view utilisé lors de l'envoi du mail
        Mail::send('mail', $data, function($message) use($data) { //fonction send qui va envoyer la view " mail "
            $subject = $data['subject'];
            $message->from('SiteCopec@gmail.com');  //Adresse email de l'emetteur de l'email
            $message->to($data['email'], $data['email'])->subject($subject); //ici on definit l'adresse à laquelle on envoie le mail
        });


        return redirect('/');
    }

    public function sendRecapCommande($idCli, $total, $idCmde) {  //fonction qui concerne l'email envoyé après une commande.
        $title = "Récapitulatif de la commande numero $idCmde";
        $content = "je suis le contenu du mail";
        $client = new Client();
        $mail = $client->getEmailClient($idCli); // ici on recupère l'email du client grace à son ID.
        $carbon = Carbon::today();
        $timestamp = $carbon->timestamp;
        $format = $carbon->format('d/m/y'); //ici format aura la date du jour.
        $user_email = $mail->MAIL;

        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idCli);

        $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande); //ici on recupere les commandes du client en question.

        $LignComm = new LignComm();
        $mesLignComm = $LignComm->getlesChaussuresCommande($NumCommande);
        $uneChaussure = new Modele();
        foreach ($mesLignComm as $uneL) {
            $uneChaussure->miseAJourDonnee($uneL); //données mises à jour dans la base de données
        }
        $uneCommande->ValiderCommande($NumCommande);
        $data = ['email' => $user_email, 'numCommande' => $idCmde, 'total' => $total, 'date' => $format, 'lesChaussures' => $lesChaussures, 'subject' => $title, 'content' => $content];
        Mail::send('mailRecap', $data, function($message) use($data) {
            $subject = $data['subject'];
            $message->from('SiteCopec@gmail.com');
            $message->to($data['email'], $data['email'])->subject($subject);
        });

        return redirect('/');
    }

    public function envoiMdp() { //fonction qui concerne l'envoie de mail lors d'une demande de "mot de passe oublié"
        $login = Request::input('login');
        $mail = Request::input('email'); //ici on recupere le login et l'email passé par méthode post
        $unClient = new Client();
        $connected = $unClient->getClientExistance($login, $mail); // on verifie s'il y a bien un client avec cet email et de login dans la bdd


        if ($connected) {   //s'il existe bien un client, on envoi l'email et on est redirigé vers la view formLogin avec un message de confirmation
            $mdp = $unClient->getMdpClient($login, $mail);
            $title = "Nouveau mot de passe";
            $content = "je suis le contenu du mail";
            $erreur = "Le mot de passe vous a été envoyé à l'adresse $mail";


            $data = ['email' => $mail, 'mdp' => $mdp, 'subject' => $title, 'content' => $content];
            Mail::send('mailMdp', $data, function($message) use($data) {

                $subject = $data['subject'];
                $message->from('SiteCopec@gmail.com');
                $message->to($data['email'], $data['email'])->subject($subject);
            });

            return view('formLogin', compact('erreur'));
        } else {  //s'il n'existe pas, renvoi sur la viewformMdpOublie avec un message qui informe que le login ou l'email est incorrect.
            $erreur = "Login ou email incorrect";
            return view('formMdpOublie', compact('erreur'));
        }
    }

}

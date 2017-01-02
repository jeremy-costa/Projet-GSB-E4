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

    public function sendMailWelcome($user_email, $user_name) {
        $title = "Welcome";
        $content = "je suis le contenu du mail";



        $data = ['email' => $user_email, 'name' => $user_name, 'subject' => $title, 'content' => $content];
        Mail::send('mail', $data, function($message) use($data) {
            $subject = $data['subject'];
            $message->from('SiteCopec@gmail.com');
            $message->to($data['email'], $data['email'])->subject($subject);
        });


        return redirect('/');
    }

    public function sendRecapCommande($idCli, $total, $idCmde) {



        $title = "Récapitulatif de la commande numero $idCmde";
        $content = "je suis le contenu du mail";
        $client = new Client();
        $mail = $client->getEmailClient($idCli);
        $carbon = Carbon::today();
        $timestamp = $carbon->timestamp;
        $format = $carbon->format('d/m/y');
        $user_email = $mail->MAIL;

        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idCli);

        $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);

        $LignComm = new LignComm();
        $mesLignComm = $LignComm->getlesChaussuresCommande($NumCommande);
        $uneChaussure = new Modele();
        foreach ($mesLignComm as $uneL) {
            $uneChaussure->miseAJourDonnee($uneL);
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

    public function envoiMdp() {

        $login = Request::input('login');
        $mail = Request::input('email');
        $unClient = new Client();
        $connected = $unClient->getClientExistance($login, $mail);


        if ($connected) {
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
        } else {
            $erreur = "Login ou email incorrect";
            return view('formMdpOublie', compact('erreur'));
        }
    }

}

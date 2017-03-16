<!--Page qui permet la création du corps d'un email envoyé via la page contact du site-->
<!doctype html>
<html lang="fr">
    <body class="body">
        <p>Le {{$date}}</p>
        <p>Un email vous a été envoyé par {{ $nom }} {{$prenom}}, son adresse email est : {{$email}}</p> 
        <p>Son numéro de téléphone est : {{$tel}}</p>
        </br>
        <p>Le contenu de son message est :</p>
        <br/>
        <em>{{$content}}</em>
    </body>
    <footer>
        <hr />
        <address> Ceci est un message automatique du site Riotware </address>
    </footer>
</html>
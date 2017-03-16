<!--View utilisée pour l'envoi du mail récapitulatif de la commande.-->
<html>
    <body>
        <p>Bonjour, une commande a été effectuée le {{ $date }} , voici un mail récapitulatif de celle-ci.</p>
        <p>Le client est : {{$NomCli}}</p>
        <p>Son adresse email est : {{$EmailCli}}</p>
        <p>Son numéro de téléphone est : {{$TelCli}}</p>
        <p>Numero de commande : {{$idCommande}}</p>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Reference</th>
                    <th>Prix HT</th>
                    <th>Prix TTC</th>
                    <th>Quantité</th>
                    <th>Total TTC</th>


                </tr>


            </thead>


            @foreach($lesProduits as $unProduit)
            <tr>   
                <td>{{ $unProduit->label }}</td> 
                <td>{{ $unProduit->ref }}</td>
                <td>{{$unProduit->price}}€</td>
                <td>{{$unProduit->price_ttc}}€</td>
                <td>{{(int)$unProduit->quantite }}</td>
                @endforeach
                <td>{{ $total}}€</td>
            </tr>
            <BR> <BR>
        </table>

    </body>
    <footer>
        <hr />
        <address> Ceci est un message automatique du site Riotware </address>
    </footer>
</html>


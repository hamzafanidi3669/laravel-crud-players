<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <title>afficherJoueurs</title>
</head>
<body>
    <style>

        /* table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: .3em;
        } */
        .modified{
            background-color: yellow;
        }
    </style>
    <div class="container p-4">
        <table class="table table-striped mb-4">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>poste</th>
                <th>maillot</th>
                <th>sous contract</th>
                <th>salaire</th>
            </tr>
            @foreach ($selection as $joueur)
            @if ($id && $id == $joueur->id)
            <tr class="modified">
                <td>{{ $joueur->id }}</td>
                <td>{{ $joueur->nom }}</td>
                <td>{{ $joueur->prenom }}</td>
                <td>{{ $joueur->poste }}</td>
                <td>{{ $joueur->maillot }}</td>
                <td>{{ $joueur->sousContract }}</td>
                <td>{{ $joueur->salaire }}</td>
                <td><a href="modifierJoueur?id={{ $joueur->id }}" >modifier</a></td>
                <td><a href="supprimerJoueur?id={{ $joueur->id }}" onclick="return confirm('u oke?')>supprimer</a></td>
            </tr>
            @else
            <tr>
                <td>{{ $joueur->id }}</td>
                <td>{{ $joueur->nom }}</td>
                <td>{{ $joueur->prenom }}</td>
                <td>{{ $joueur->poste }}</td>
                <td>{{ $joueur->maillot }}</td>
                <td>{{ $joueur->sousContract }}</td>
                <td>{{ $joueur->salaire }}</td>
                <td><a href="modifierJoueur?id={{ $joueur->id }}" >modifier</a></td>
                <td><a href="supprimerJoueur?id={{ $joueur->id }}">supprimer</a></td>
            </tr>
            @endif
            @endforeach
            <table class="table table-striped mt-4">
                <tr>
                    <th>Poste</th>
                    <th>Valeur</th>
                </tr>
                @foreach ($nbrP as $p)
                    <tr>
                        <td>{{ $p->poste }}</td>
                        <td>{{ $p->nbrPoste }}</td>
                    </tr>

                @endforeach
            </table>
            <br><br>    
            <a href="ajouterJoueur">form</a>
    
        </table>
    </div>
    
    <!-- <a href="/dashboard">dashboard</a> -->
</body>
</html>
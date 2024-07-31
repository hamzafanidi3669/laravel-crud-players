<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Modifier Joueur</title>
</head>
<body>
    <style>
        #id{
            display: none;
        }
    </style>
    <div class="container p-4">
        <h1 class="h1 mb-4">Formulaire</h1>
    <form action="modifier" method="post">
        @csrf
        <p>ID: {{ $selectionModif[0]->id }}</p>
        <input type="text" name="id" id="id" value="{{ $selectionModif[0]->id }}">
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom" value="{{ $selectionModif[0]->nom }}"><br><br>
        <label for="prenom">prenom</label>
        <input type="text" name="prenom" id="prenom" value="{{ $selectionModif[0]->prenom }}"><br><br>
        <label for="poste">poste</label>

        <select name="poste" id="poste">
            <option value="milieu">milieu</option>
            <option value="defence">defence</option>
            <option value="attaque">attaque</option>
        </select><br><br>
        <label for="maillot">maillot</label>
        <input type="number" name="maillot" id="maillot" value="{{ $selectionModif[0]->maillot }}"><br><br>
        <label for="sousContract">Sous contract</label>
        <input type="radio" name="sousContract" id="oui" value="O">
        <label for="oui">oui</label>
        <input type="radio" name="sousContract" id="non" value="N">
        <label for="non">non</label><br><br>
        <label for="salaire">salaire</label>
        <input type="number" name="salaire" id="salaire" value="{{ $selectionModif[0]->salaire }}"><br><br>
        <input type="submit" class="btn btn-success" value="submit">
        <input type="reset" class="btn btn-danger" value="reset">
    </form>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Decharge Bim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br>
    <div class="container">
        <h2 class="text-center">DECHARGE SUITE A LA RECEPTION</h2>
        <h2 class="text-center">DES OUTILS DE TRAVAIL DE LA BIM S.A.</h2>
        <b>Date: {{ date('d-F-Y', strtotime($materielsorti->date_sorti)) }}</b>
        <br><br>
        <p>Je, M.<b>{{ $materielsorti->prenom.' '.$materielsorti->nom }}</b>, soussigné, reconnais que:</p>
        <ul>
            <li>Je dois utiliser les outils de travail qui m'ont été affectés, pour la réalisation des fonctions dont je serai en charge, exclusivement;</li>
            <br>
            <li>J'ai reçu les outils suivants en bon état, et m'engage à les préserver en bon état pendant l'exercice de mes fonctions</li>
            <br>
            <div class="container-fluid">
                 @php
                    $hobbies = json_decode($materielsorti->materiel_id)
                 @endphp
                 @foreach ($hobbies as $hobby)
                    <li>{{ $hobby }}</li>
                 @endforeach
            </div>
        </ul>
        <br>
        <div class="float-end">
            <b>Sugnature du collaborateur</b><br>
            <b class="ml-3">Lu et Apprové</b><br><br><br><br>
            M.{{ $materielsorti->prenom.' '.$materielsorti->nom }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

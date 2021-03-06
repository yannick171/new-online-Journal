<?php include("ressources/snippets/session.php"); ?>
<!--?php include("ressources/SQLData/initArticledb.php"); ?-->
<!--?php include("ressources/SQLData/initMagazine.php"); ?-->

<?php include("initDatabase.php"); ?>
<!--PHP Script for sorting Articles in the Lists and save modified Lists -->
<?php
$articlesDb = new PDO('sqlite:ressources/SQLData/articles.db');
$toProof = array();
$proofed = array();
$nextMagazine = array();

$result = $articlesDb->query('SELECT * FROM article');

foreach ($result as $article) {
    if (strcmp($article["statusOfArticle"], "0") == 0) {
        array_push($toProof, $article);
    }
    if (strcmp($article["statusOfArticle"], "1") == 0) {
        array_push($proofed, $article);
    }
    if (strcmp($article["statusOfArticle"], "2") == 0) {
        array_push($nextMagazine, $article);
    }
}
?>

<!-- PHP Script for getting the newest Magazine-->
<?php
$MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
$resultMagazine = $MagazineDb->query('SELECT * FROM Magazine');
global $newestMagazine;
$newestMagazine = $resultMagazine->fetch();
while ($magazine = $resultMagazine->fetch()) {
    if (($magazine["id"] > $newestMagazine["id"]) || is_null($newestMagazine)) {
        $newestMagazine = $magazine;
    }
}

?>
<!-- PHP Script for changing the Despription for the next Magazine-->
<?php

if (isset($_POST["newDescription"])) {
    $description = $_POST['newDescription'];
    $newMagazineId = $newestMagazine["id"];
    $MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
    $updateDescription = "UPDATE Magazine SET description = '$description' WHERE id = '$newMagazineId'";
    $ergebnis = $MagazineDb->exec($updateDescription);
    header("location: redakteur.php");
}
?>
<!-- PHP Script for changing the Title of the next Magazine-->
<?php
if (isset($_POST['newTitle'])) {
    $title = $_POST['newTitle'];
    $newMagazineId = $newestMagazine["id"];
    $MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
    $updateTitle = "UPDATE Magazine SET title = '$title' WHERE id = '$newMagazineId'";
    $ergebnis1 = $MagazineDb->exec($updateTitle);
    header("location: redakteur.php");
}
?>
<!-- PHP Script for changing the Url of the Title on Coverpage of the next Magazine-->
<?php
if (isset($_POST['bildUrl'])) {
    $bildUrl = $_POST['bildUrl'];
    $newMagazineId = $newestMagazine["id"];
    $MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
    $updateTitle = "UPDATE Magazine SET title = '$title' WHERE id = '$newMagazineId'";
    $ergebnis1 = $MagazineDb->exec($updateTitle);
    header("location: redakteur.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Redakteur Profil - Evolve
    </title>
    <?php include("ressources/snippets/globalsources.php") ?>

    <!--?php include("ressources/redakteurseite/php/updateAccepted.php");?-->

    <link rel="stylesheet" type="text/css" href="ressources/redakteurseite/redakteur.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="ressources/css/article.css" rel="stylesheet">
    <link href="ressources/css/countdown.css" rel="stylesheet">

</head>

<body>

<?php include("ressources/snippets/head.php"); ?>



<main class="defaultstyle">
    <h1>Redakteur Profil</h1>
    <article>
        <section class="grid-container-article">
            <div>
                <img class="profilpic" src="ressources/redakteurseite/profilbild.png" alt="picture"/>
                <button type="button">Bild ändern</button>

            </div>
            <div>
                <p class="item2">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Name: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Namh Cnupeno
                    </label>
                    <br><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Vorname: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Saitama
                    </label>
                    <br><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label>E-Mail: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        one.punchman@boredom.de
                    </label>
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button">Daten ändern</button>
                </p>
            </div>
            <div class="item-down-article">
                <h3>Info</h3>
                blabla dudu ich bin so ein Typ der in seinem Leben nichts anderes zu tun hat als Artikel für
                irgendsoeine Onlinezeitschrift zu prüfen die sowieso niemand liest und weil mein leben so langweilig ist
                bin ich nicht in der Lage einen Punkt zu schreiben blbablabla
                <button type="button">Ändern</button>
            </div>
        </section>
    </article>
    <h1>
        Redakteur Profil
    </h1>

    <h1>Arbeitsbereich</h1>


    <form id="toProofList">
        <div class="parentContainer">

            <div class="containerElement">
                <h2 id="zuPrüfen" class=workingArea>
                    zu prüfen
                </h2>
                <ul id="todoArticles" class="list-group">

                    <?php
                    foreach ($toProof as $proof) {
                        $id = uniqid();
                        echo '<li class = "list-group-item">'
                            . '<div class="card margin">'
                            . '<div class="card-header">'
                            . '<h5 class="mb-0">'
                            . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                            . $proof["title"]
                            . '</h5>'
                            . '</div>'
                            . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                            . '<div class="card-body">'
                            . $proof["abstract"]
                            . '</div>'
                            . '<button onclick="addArticleToProofed('.$proof["id"].')" class="btn btn-success btn-block">Artikel als geprüft markieren</button>'
                            . '</div>'
                            . '</div>'
                            . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
                            . '</li>';
                    }
                    ?>
                </ul>
            </div>

            <input type = "hidden" name = "seperator" value="a">
            <div class="containerElement">
                <h2 id="geprüft" class="workingArea">
                    geprüft
                </h2>
                <p id="testDerId"></p>
                <ul id="acceptedArticles" class="list-group">
                    <?php
                    foreach ($proofed as $proof) {
                        $id = uniqid();
                        echo '<li class = "list-group-item">'
                            . '<div class="card margin">'
                            . '<div class="card-header">'
                            . '<h5 class="mb-0">'
                            . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                            . $proof["title"]
                            . '</h5>'
                            . '</div>'
                            . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                            . '<div class="card-body">'
                            . $proof["abstract"]
                            . '</div>'
                            . '<button onclick="addArticleToMagazine('.$proof["id"].')" class="btn btn-success btn-block">Artikel zur nächsten Ausgabe hinzufügen</button>'
                            . '</div>'
                            . '</div>'
                            . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
                            . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </form>


        <h1>
            Nächste Ausgabe:
        </h1>

        <div class="nextMagazine">
            <div class="parentContainer">
                <div class="containerElement">
                    <div class="containerChild">
                        <h3>
                            Titel der Ausgabe
                        </h3>
                        <p id="nextMagazineTitle">
                            <?php echo $newestMagazine["title"]; ?>
                        </p>
                        <div class="centerButton">
                            <button type="button" data-toggle="modal" data-target="#modalTitle">
                                Titel ändern
                            </button>
                        </div>
                    </div>
                    <div class="containerChild">
                        <h3>
                            Titelbild der Ausgabe
                        </h3>
                        <img src="ressources/archivseite/TitelSeite.jpg" alt="Titelseite des Magazins"
                             class="centerImage">
                        <div class="centerButton">
                            <button type="button" data-toggle="modal" data-target="#modalImage">Bild ändern</button>
                        </div>
                    </div>
                    <div class="containerChild">
                        <h3>
                            Einleitungstext der Ausgabe
                        </h3>
                        <p>
                            <?php echo $newestMagazine["description"]; ?>
                        </p>
                        <div class="centerButton">
                            <button type="button" data-toggle="modal" data-target="#modalDescription">
                                Beschreibung ändern
                            </button>
                        </div>

                    </div>
                </div>
                <div class="containerElement">
                    <h3>
                        Inhalt
                    </h3>
                    <ul id="articleList" class="list-group">
                        <?php
                        foreach ($nextMagazine as $next) {
                            $id = uniqid();
                            echo '<li class = "list-group-item">'
                                . '<div class="card margin">'
                                . '<div class="card-header">'
                                . '<h5 class="mb-0">'
                                . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                                . $next["title"]
                                . '</h5>'
                                . '</div>'
                                . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                                . '<div class="card-body">'
                                . $next["abstract"]
                                . '</div>'
                                . '<button onclick="addArticleToProofedFromNextMagazine('.$next["id"].')" class="btn btn-danger btn-block">Artikel nach geprüft zurücklegen</button>'
                                . '</div>'
                                . '</div>'
                                . '<input type="hidden" name="id" value="' . $next["id"] . '">'
                                . '</li>';

                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <button type="submit" onclick="publish()" class="btn btn-primary btn-block">Ausgabe veröffentlichen</button>
        <!-- Here are the Modals-->

        <!-- Modal -->
        <div class="modal fade" id="modalTitle" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action= <?php $_SERVER['PHP_SELF'] ?>>
                        <div class="modal-body">
                            <p>Geben Sie den neuen Titel ein : </p>
                            <input name="newTitle" class="form-control mr-sm-2" type="text" placeholder="..."
                                   aria-label="text">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Anwenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalImage" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action= <?php $_SERVER['PHP_SELF'] ?>>
                        <div class="modal-body">
                            <p>Geben Sie die neue URL des Bildes an : </p>
                            <input name="bildUrl" class="form-control mr-sm-2" type="text" placeholder="..."
                                   aria-label="text">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Anwenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--PHP for action on change path of picture-->

        <!-- Modal -->
        <div class="modal fade" id="modalDescription" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" action= <?php $_SERVER['PHP_SELF'] ?>>
                        <div class="modal-body">
                            <p>Geben Sie eine neue Beschreibung an : </p>
                            <div class="form-group">
                                <label for="discription">neue Beschreibung : </label>
                                <textarea class="form-control" rows="5" id="comment" name="newDescription"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Anwenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</main>
<?php include("ressources/snippets/footer.php"); ?>
<?php include("ressources/snippets/loadjavascript.php"); ?>
<?php include("ressources/snippets/loadjavascriptRedakteur.php"); ?>
</body>
</html>

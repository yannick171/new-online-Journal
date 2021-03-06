<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <?php include("ressources/snippets/globalsources.php") ?>

</head>

<body>

  <!-- Header -->
  <?php include ("ressources/snippets/head.php") ;?>

<div class="hintergrundbild">
  <div class="defaultstyle">
    <main class="">
        <div class="wrapper">
          <div class="box-1">
            <img class="introimg" src="ressources/startseite/introimg.jpg">
          </div>
          <div class="box-2">
            <h2>sharing is caring!</h2> Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.  Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.  Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.
          </div>
          <div class="box-4">
            <h2>Aktuelle Ausgabe</h2>
            <h3>Do Voles Select Dense Vegetation for Movement Pathways at the Microhabitat Level?</h3>

            <h6>Biological Sciences</h6>
            The relationship between habitat use by voles (Rodentia: Microtus) and the density of vegetative cover was
            studied to determine if voles select forage areas at the microhabitat level.  Using live traps, I trapped,
            powdered, and released voles at 10 sites.  At each trap site I analyzed the type and height of the vegetation
            in the immediate area.  Using a black light, I followed the trails left by powdered voles through the vegetation.  I mapped the trails using a compass to ascertain the tortuosity, or amount the trail twisted and turned, and visually checked the trails to determine obstruction of the movement path by vegetation.  I also checked vegetative obstruction on 4 random paths near the actual trail, to compare the cover on the trail with other nearby alternative pathways.  There was not a statistically significant difference between the amount of cover on a vole trail and the cover off to the sides of the trail when
            completely covered; there was a significant difference between on and off the trail when the path was completely
            open.  These results indicate that voles are selectively avoiding bare areas, while not choosing among dense patches
            at a fine microhabitat scale.
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      1. Neue Erkenntnisse im Bereich der Fuzzy-Logik
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Aufgrund langer und intensiver Forschung konnten ich, der großartige Huan Lee,
                    und mein Team neue Erkenntnisse im Bereich der Fuzzy-Logik gewinnen. Welche dies genau sind,
                    können Sie in <a href="ressources/archivseite/Zeitung1/Fuzzy-Logik.txt">folgendem Artikel </a>lesen.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      2. Der Durchbruch im Verständnis der temporalen Logik
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Dieses Paper widmet sich der Frage nach dem Verständnis der temporalen Logik. Der Schlüsssel
                          unserer Forschung ist die Annahme, dass das Wichtigste bei dieser Diziplin das Tempo ist.Wie genau
                          das Tempo maßgeblich für das Verstehen der temporalen Logik ist,
                          können Sie in <a href="ressources/archivseite/Zeitung1/temporale-Logik.txt">folgendem Artikel </a>lesen.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      3. Neuer Durchbruch im Bereich der neuronalen Netze nutzenden Ki
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                    Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                    neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare

                    perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

      <div class="row" id="artikel">
        <button type = "button" id ="leftArrow">
            <i class="material-icons randomButton">keyboard_arrow_left</i>
        </button>
        <div class="randomArticleSlot-1" >
          <p id="randomArticle-1"> </p>
        </div>
        <div class="randomArticleSlot-2" >
          <p id="randomArticle-2" > </p>
        </div>
        <div class="randomArticleSlot-3" >
          <p id="randomArticle-3" > </p>
        </div>
        <button type = "button"  id ="rightArrow">
            <i class="material-icons randomButton">keyboard_arrow_right</i>
        </button>
      </div>
  </main>
</div>

  <?php include ("ressources/snippets/footer.php") ;?>

  <?php include ("ressources/snippets/loadjavascript.php") ;?>

  <script>
    $(document).ready(function() {
      var path = "ressources/archiv/artikel/";
      var files = [path+"artikel1.txt",path + "artikel2.txt",path + "artikel3.txt",path + "artikel4.txt",path + "artikel5.txt"];
      //var files = [path+"img1.jpeg",path + "img2.jpeg",path + "img3.png",path + "img4.jpeg",path + "img5.png"];

      for (var i = 0; i < files.length; i++) {
        var temp = files[i];
        var permutation = Math.floor((Math.random() * files.length));
        files[i] = files[permutation];
        files[permutation] = temp;
      }

      $("#randomArticle-1").load(files[0]);
      $("#randomArticle-2").load(files[1]);
      $("#randomArticle-3").load(files[2]);

      var relativePosition = 0;
      var range = 3;
      var fadeSpeed = 350;

      $(window).resize(function() {
        if ($(window).width() < 768) {
           range = 2;
        }
        else if($(window).width() < 600){
           range = 1;
        }
        else{
         range = 3;
        }
      })
      $("#rightArrow").click(function() {
              relativePosition = (relativePosition + range + files.length) % files.length;
              $("#randomArticle-1").fadeOut( fadeSpeed );

              setTimeout(function(){
                $("#randomArticle-1").load(files[relativePosition]);
                $("#randomArticle-1").fadeIn( fadeSpeed );
              },fadeSpeed);

              setTimeout(function(){
                $("#randomArticle-2").fadeOut( fadeSpeed );

                setTimeout(function(){
                  $("#randomArticle-2").load(files[(relativePosition+1) % files.length]);
                  $("#randomArticle-2").fadeIn( fadeSpeed );
                },fadeSpeed);

              },200);

              setTimeout(function(){
                $("#randomArticle-3").fadeOut( fadeSpeed );

                setTimeout(function(){
                  $("#randomArticle-3").load(files[(relativePosition+2) % files.length]);
                  $("#randomArticle-3").fadeIn( fadeSpeed );
                },fadeSpeed);

              },fadeSpeed);
      });

      $("#leftArrow").click(function() {
              relativePosition = (relativePosition - range + files.length) % files.length;
              $("#randomArticle-3").fadeOut( fadeSpeed );

              setTimeout(function(){
                $("#randomArticle-3").load(files[(relativePosition+2) % files.length]);
                $("#randomArticle-3").fadeIn( fadeSpeed );
              },fadeSpeed);

              setTimeout(function(){
                $("#randomArticle-2").fadeOut( fadeSpeed );

                setTimeout(function(){
                  $("#randomArticle-2").load(files[(relativePosition+1) % files.length]);
                  $("#randomArticle-2").fadeIn( fadeSpeed );
                },fadeSpeed);

              },200);

              setTimeout(function(){
                $("#randomArticle-1").fadeOut( fadeSpeed );

                setTimeout(function(){
                  $("#randomArticle-1").load(files[(relativePosition)]);
                  $("#randomArticle-1").fadeIn( fadeSpeed );
                },fadeSpeed);

              },fadeSpeed);
      });
    })
  </script>
</body>
</html>

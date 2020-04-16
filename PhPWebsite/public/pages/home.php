<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Hoofdpagina" ?>
<?php include('../../private/shared/header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

  <div id="container">

    <div class="slideshow-container">

    <div class="mySlides fade">
      <img src="../images/1.jpg" style="width:100%">
      <div class="text">Graafschap Festival 2020</div>
    </div>

    <div class="mySlides fade">
      <img src="../images/2.jpg" style="width:100%">
      <div class="text">Graafschap Festival 2019</div>
    </div>

    <div class="mySlides fade">
      <img src="../images/3.jpg" style="width:100%">
      <div class="text">Graafschap Festival 2018</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <img class="TicketAF2" src="../images/Ticket1.png" alt="Ticketlos">
    <p class="TicketNaam1">Premium</p>
    <img class="TicketAF3" src="../images/Ticket1.png" alt="Ticketlos">
    <p class="TicketNaam2">Basic</p>
    <img class="TicketAF4" src="../images/Ticket1.png" alt="Ticketlos">
    <p class="TicketNaam3">Vips</p>

    <div id="contentTicket1" class="CT1"> </div>
    <div id="contentTicket2" class="CT2"> </div>
    <div id="contentTicket3" class="CT3"> </div>

    <p class="TicketTekst1">
        Premium<br> <br>

    - 35 Munten aan consumptie<br>
    - Toegang tot het festival<br>
    - Speciale front-row plaatsen<br>
    - 50% korting op alles<br>
    <br>
    € 60-,
    </p>

    <p class="TicketTekst2">
    Basic<br> <br>

    - 10 Munten aan consumptie<br>
    - Toegang tot het festival<br>
    <br>
    € 40-,
    </p>

    <p class="TicketTekst3">
    Vips<br> <br>

    - 50 Munten aan consumptie<br>
    - Toegang tot het festival<br>
    -Meet & Greet met artiesten<br>
    - 60% korting op alles<br>
    <br>
    € 100-,
    </p>

  </div>

<form action='bestelling_account.php'>
    <button class='buttonBestel'>Bestel hier je Tickets!</button>
</form>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</div>




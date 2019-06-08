<?php

?>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" type="text/css" href="main.css">
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Plantilla">
      <meta name="keywords" content="HTML,CSS,PHP,SQL,Palntilla">
      <meta name="author" content="Costas Carles & Jordi Plà">
   </head>
   <body>
   	 <div class="browser">
       <script src="header.js"></script>
      <script src="navbar.js"></script>
      <section>
	   <button class="tablinks" onclick="openCity(event, 'London')">1</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">2</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">3</button>

  
  <div id="Paris" class="tabcontent">
   	 <div name="draggable" class="browser">
       <div id="Parisheader">
	   <script src="header.js"></script>
	   </div>
      <script src="navbar.js"></script>
  <h3>CARLETS 1/3!</h3>
  <p>El carlets</p>
  </div>
</div>


<div id="London" class="tabcontent">
   	 <div name="draggable" class="browser">
       <script src="header.js"></script>
      <script src="navbar.js"></script>
  <h3>CARLETS 2/3!</h3>
  <p>es un</p> 
  </div>
</div>

<div id="Tokyo" class="tabcontent">
   	 <div name="draggable" class="browser">
       <script src="header.js"></script>
      <script src="navbar.js"></script>
  <h3>CARLETS 3/3</h3>
  <p>mongolo!</p>
  </div>
</div>
	    </section>
      <script src="footer.js"></script>
    </div>

</body>
</html>

<script>

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
 // tabcontent = document.getElementsByClassName("tabcontent");
 // for (i = 0; i < tabcontent.length; i++) {
  //  tabcontent[i].style.display = "none";
 // }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

//////////////////////////////////////////

// Make the DIV element draggable:
dragElement(document.getElementById("Paris"));
dragElement(document.getElementById("London"));
dragElement(document.getElementById("Tokyo"));


function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV: 
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
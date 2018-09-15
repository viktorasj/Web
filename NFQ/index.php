<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main page</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans|Michroma">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="./css/custom.css" />
  </head>
  <body>
    <div class="container">
      <header class="row">
        <div class="col-sm-12 bg-secondary text-center">
          <a class="" id="order_list_button" href="./orders.php">Order list</a>
        </div>
      </header>
     <main class="row">
       <div class="col-sm-7">
         <div class="row p-5">
           <div class="col-sm-12 text-center">
             <p class="h1 michroma_font"><b>The Mystery Box</b></p>
           </div>
         </div>
         <div class="row p-3">
           <div class="col-sm-12 fira_font">
             <p class="h5">Dreaming about great purchace? Why not to get our <b>Mystery Box</b>?! Remember the golden phrase <a id="golden_phrase" target="_blank" href="https://www.youtube.com/watch?v=GKZJdaiJF84">"...A boat's a boat, but the Mystery Box could be anything! It could even be a boat!"</a>?</p>
             <br>
             <p class="h5"><b>Fill up</b> the form below, <b>pay</b> us and the <b>box is yours</b>!</p>
           </div>
         </div>
         <div class="row mt-4">
           <div class="col-sm-12">
             <div class="ml-5 mr-5 pt-5 pb-5" id="order_form">
               <form class="text-center" action="#" id="form">
                 <div class="text-center mt-2 fira_font" id="error_report"></div>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" id="name">
                   <label class="mdl-textfield__label" for="buyers_name">Name</label>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" id="email">
                   <label class="mdl-textfield__label" for="buyers_email">Email</label>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" id="sh_addr">
                   <label class="mdl-textfield__label" for="sh_addr">Shipping address</label>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="number" pattern="[0-9]*" min="1" id="qty">
                   <label class="mdl-textfield__label" for="qty">Qty</label>
                   <span class="mdl-textfield__error">Digits only</span>
                 </div>
                 <br>
                 <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mt-5" id="buy_button">Buy</button>
               </form>
             </div>
             <div class="ml-5 mr-5 p-5 fira_font" id="confirmation_window">
               <p class="h4">Congratulations! Your Mystery Box order was placed (order id number - <b><span id="order_id_nr"></span></b>). The more you pay - the more powerful your Mystery Box will be. We'll send you details soon to <b><span id="order_email"></span></b>.</p>
             </div>
            </div>
         </div>
       </div>
       <div class="col-sm-5 text-center">
         <img id="mystery_box_pic" src="./img/mystery_box.jpg" alt="">
       </div>
     </main>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script defer src="./js/main.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Michroma" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="./css/custom.css" />
  </head>
  <body>
    <div class="container">
      <header class="row">
        <div class="col-sm-12 bg-secondary">

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
             <p class="h5">Dreaming about great purchace? Why not to get our <b>Mystery Box</b>?! Remember the golden phrase "...A boat's a boat, but the Mystery Box could be anything! It could even be a boat!".</p>
             <br>
             <p class="h5"><b>Fill up</b> the form below, <b>pay</b> us and the <b>box is yours</b>!</p>
           </div>
         </div>
         <div class="row mt-4">
           <div class="col-sm-12">
             <div class="form_style ml-5 mr-5">
               <form class="text-center pt-5 pb-5" action="#">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" id="sample1">
                   <label class="mdl-textfield__label" for="sample1">Name</label>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="email" pattern="" id="sample2">
                   <label class="mdl-textfield__label" for="sample2">Email</label>
                   <span class="mdl-textfield__error">Wrong email</span>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" id="sample3">
                   <label class="mdl-textfield__label" for="sample3">Shipping address</label>
                 </div>
                 <br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="sample4">
                   <label class="mdl-textfield__label" for="sample4">Qty</label>
                   <span class="mdl-textfield__error">Digits only</span>
                 </div>
                 <br>
                 <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mt-5" id="buy_button">Buy</button>
               </form>
             </div>
            </div>
         </div>
       </div>
       <div class="col-sm-5 text-center">
         <img id="mystery_box_pic" src="./img/mystery_box.jpg" alt="">
       </div>
     </main>
    </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>

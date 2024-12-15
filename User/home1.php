<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="home1.css" />
    <title>Web Design Mastery | SoulTravel</title>
  </head>
  <body>
    


  
  <div class="header__container">
      <div class="header__image">
        <div class="header__image__card header__image__card-1">
          <span><i class="ri-key-line"></i></span>
          Hotel Booking
        </div>
        <div class="header__image__card header__image__card-2">
          <span><i class="ri-passport-line"></i></span>
          Flight Tickets
        </div>
        <div class="header__image__card header__image__card-3">
          <span><i class="ri-map-2-line"></i></span>
          Local Events
        </div>
        <div class="header__image__card header__image__card-4">
          <span><i class="ri-guide-line"></i></span>
          Tour Guide
        </div>
        <img src="header.png" alt="header" />
      </div>
      <div class="header__content">
        <h1>LET'S GO!<br />THE <span>ADVENTURE</span> IS WAITING FOR YOU</h1>
        <p>
          Embark on Your Journey Today and Discover Uncharted Wonders Around the
          World - Your Adventure Awaits with Exciting Experiences, Unforgettable
          Memories, and Endless Opportunities
        </p>
        <form action="/">
          <div class="input__row">
            <div class="input__group">
              <h5>Destination</h5>
              <div>
                <span><i class="ri-map-pin-line"></i></span>
                <input type="text" placeholder="Paris, France" />
              </div>
            </div>
            <div class="input__group">
              <h5>Date</h5>
              <div>
                <span><i class="ri-calendar-2-line"></i></span>
                <input type="text" placeholder="17 July 2024" />
              </div>
            </div>
          </div>
          <button type="submit">Search</button>
        </form>
             </div>
</div>


 
    <?php
include 'home2.php';
  ?>
  
  </body>
</html>
document.addEventListener("DOMContentLoaded", function () {
    const button1 = document.getElementById("checkIn");
    const button2 = document.getElementById("addData");
    const button3 = document.getElementById("about");
    const button4 = document.getElementById("logout");

    button1.addEventListener('click', function () {
      window.location.href =  "page0.php";
     });

      button2.addEventListener("click", function () {
      window.location.href =  'page2.php';
     });

     button3.addEventListener("click", function () {
      window.location.href =  'page3.php';
     });

      button4.addEventListener("click", function () {
      alert("Logging out!");
      window.location.href =  'index.html';    
     });

});
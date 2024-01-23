<link href="../style/hamburger.css" rel="stylesheet" />
<ul class="navbar">
  <li>
    <a href="login.php" id="seConnecter" style="padding: 0.4em 1em">
      Se Connecter
    </a>
  </li>
  <li><a href="aide.php" class="lien">Aide</a></li>
  <li><a href="cvl.php" class="lien">CVL</a></li>
  <li><a href="messagerie.php" class="lien">Messagerie</a></li>
  <li><a href="accueil.php" class="lien">Accueil</a></li>
</ul>


</div>

<button id="navBarBtn" class="hamburger hamburger--spin" type="button">
  <span class="hamburger-box">
      <span class="hamburger-inner"></span>
  </span>
</button>

<div id="dropdownNavBar" style="background:  #ff004a;">
    <a href="accueil.php">Accueil</a>
    <a href="messagerie.php">Messagerie</a>
    <a href="cvl.php">CVL</a>
    <a href="aide.php">Aide</a>
    <a href="login.php">Se Connecter</a>
</div>

<ul class="navBarFermer">

</ul>
<script>
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
    forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
        this.classList.toggle("is-active");

        }, false);
    });
    }

    var navBarBtn = document.getElementById('navBarBtn');
    var dropdownNavBar = document.getElementById('dropdownNavBar');

    dropdownNavBar.classList.add("animCacher");


    navBarBtn.addEventListener('click',function(){
        if(dropdownNavBar.style.display == "flex"){
            dropdownNavBar.classList.add("animCacher");
            setTimeout(() => {
            dropdownNavBar.style.display="none";

            }, 500);
            dropdownNavBar.classList.remove("animMontrer");
        }else{
            dropdownNavBar.style.display="flex"; 

            setTimeout(() => { 

            dropdownNavBar.classList.remove("animCacher");
            dropdownNavBar.classList.add("animMontrer");

            }, 100);
        }
    })
    window.addEventListener('resize',function(){
        if(window.innerWidth>=768){
            dropdownNavBar.style.display = "none";

            forEach(hamburgers, function(hamburger) {
              hamburger.classList.remove("is-active");
            });

        }
    })

    window.addEventListener('scroll',function(){
      if(dropdownNavBar.style.display == "flex"){
        dropdownNavBar.classList.add("animCacher");
        forEach(hamburgers, function(hamburger) {
          hamburger.classList.remove("is-active");
        });
        setTimeout(() => {
          dropdownNavBar.style.display="none";
          }, 500);
          dropdownNavBar.classList.remove("animMontrer");
      }
      
      
        
    })

        



    
</script>
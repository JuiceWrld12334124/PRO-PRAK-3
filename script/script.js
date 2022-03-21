window.addEventListener('scroll', function() {
    var scrollY = window.scrollY;
  
    if ( window.scrollY > 120 ) {
      document.querySelector('.navbar').classList.add('dark-nav');
    } 
    else 
    {
        document.querySelector('.navbar').classList.remove('dark-nav');
    }
    });

    var loader = document.querySelector(".loader")

    window.addEventListener("load", vanish);
    
    function vanish() {
      loader.classList.add("disppear");
    }


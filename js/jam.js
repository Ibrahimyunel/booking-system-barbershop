
function showJam(str) {
    var petugas = document.querySelector('#petugas').value;
    if (petugas == "") {
        document.getElementById("option-jam").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("option-jam").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "jam.php?q=" + str + "&o=" + petugas, true);
    xmlhttp.send();
}

function choosePetugas(str) {
    var date = document.querySelector('#date').value;
    var slides = document.querySelectorAll('.mySlides');
    var dots = document.querySelectorAll('.dot');

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[str-1].className += " active";
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[str-1].style.display = "block";

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("option-jam").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "jam.php?q=" + date + "&o=" + str, true);
    xmlhttp.send();
}


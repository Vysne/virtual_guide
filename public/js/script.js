function planNavigation()
{
    var scale = 1,
        panning = false,
        pointX = 0,
        pointY = 0,
        start = { x: 0, y: 0 },
        zoom = document.getElementById("plan_canvas");

    function setTransform() {
        zoom.style.transform = "translate(" + pointX + "px, " + pointY + "px) scale(" + scale + ")";
    }

    zoom.onmousedown = function (e) {
        e.preventDefault();
        start = { x: e.clientX - pointX, y: e.clientY - pointY };
        panning = true;
    }

    zoom.onmouseup = function (e) {
        panning = false;
    }

    zoom.onmousemove = function (e) {
        e.preventDefault();
        if(!panning) {
            return;
        }
        pointX = (e.clientX - start.x);
        pointY = (e.clientY - start.y);
        setTransform();
    }

    zoom.onwheel = function (e) {
        e.preventDefault();
        var xs = (e.clientX - pointX) / scale,
            ys = (e.clientY - pointY) / scale,
            delta = (e.wheelDelta ? e.wheelDelta : -e.deltaY);
        (delta > 0) ? (scale *= 1.2) : (scale /= 1.2);
        pointX = e.clientX - xs * scale;
        pointY = e.clientY - ys * scale;

        setTransform();
    }
}

function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let session = "AM";

    if(hh == 0){
        hh = 12;
    }
    if(hh > 12){
        hh = hh - 12;
        session = "PM";
    }

    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;

    let time = hh + ":" + mm + ":" + ss + " " + session;

    document.getElementById("clock").innerText = time;
    let t = setTimeout(function(){ currentTime() }, 1000);
}

function setGreeting() {
    const time = new Date().getHours();
    let greeting;
    if(document.getElementById('greetingLT')) {
        if(time < 10) greeting = "Labas rytas";
        else if(time < 20) greeting = "Laba diena";
        else greeting = "Labas vakaras";
    }
    else {
        if(time < 10) greeting = "Good morning";
        else if(time < 20) greeting = "Good afternoon";
        else greeting = "Good evening";
    }

    document.getElementById('greetingsTitle').innerHTML = greeting;

}

/* EVENT LISTENERS */
const filterSelect = document.querySelector('#filter');

filterSelect.addEventListener('change', (event) => {
   const bulletPoints = document.querySelectorAll('#plan_bullets > div');
   bulletPoints.forEach((bulletPoint) => {
      let filterTag = bulletPoint.dataset.filter;
      if(parseInt(event.target.value) === 0) {
          bulletPoint.style.display = 'block';
      }
      else {
          if(event.target.value !== filterTag) {
              bulletPoint.style.display = 'none';
          }
          else {
              bulletPoint.style.display = 'block';
          }
      }
   });
});

const bulletPoints = document.querySelectorAll('#plan_bullets > div img');
console.log(bulletPoints);

bulletPoints.forEach((bulletPoint) => {
    bulletPoint.addEventListener('click', (event) => {
        const bulletPointDesc = bulletPoint.nextElementSibling;
        console.log(bulletPointDesc);
        let displayStatus = bulletPointDesc.style.display;
        if(displayStatus != 'block') {
            bulletPointDesc.style.display = 'block';
        }
        else {
            bulletPointDesc.style.display = 'none';
        }
    });
});

var btnPcs = document.querySelectorAll('#redirect_pc > div button');

var btnRooms = document.querySelectorAll('#redirect_room > div button');

var btnPrints = document.querySelectorAll('#redirect_print > div button');

btnPcs.forEach((btnPc) => {
    btnPc.addEventListener('click', (event) => {
        document.location.href = 'https://aleph.library.lt/F?func=find-b-0&amp=&amp=&con%5Flng=LIT&local%5Fbase=KTU01&pds_handle=GUEST';
    });
});

btnRooms.forEach((btnRoom) => {
    btnRoom.addEventListener('click', (event) => {
        document.location.href = 'https://biblioteka.ktu.edu/paslaugos/#biblioteka';
    });
});

btnPrints.forEach((btnPrint) => {
    btnPrint.addEventListener('click', (event) => {
        document.location.href = 'https://biblioteka.ktu.edu/paslaugos#spausdinimas-kopijavimas';
    });
});

var btnPcsEn = document.querySelectorAll('#redirect_pc_en > div button');

var btnRoomsEn = document.querySelectorAll('#redirect_room_en > div button');

var btnPrintsEn = document.querySelectorAll('#redirect_print_en > div button');

btnPcsEn.forEach((btnPcEn) => {
    btnPcEn.addEventListener('click', (event) => {
        document.location.href = 'https://aleph.library.lt/F?func=option-update-lng&P_CON_LNG=ENG';
    });
});

btnRoomsEn.forEach((btnRoomEn) => {
    btnRoomEn.addEventListener('click', (event) => {
        document.location.href = 'https://library.ktu.edu/services/#university-campus-library';
    });
});

btnPrintsEn.forEach((btnPrintEn) => {
    btnPrintEn.addEventListener('click', (event) => {
        document.location.href = 'https://library.ktu.edu/services#copying-printing';
    });
});

currentTime();
setGreeting();

planNavigation();

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

console.log(filterSelect);

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

// function hideFilter(element) {
//
//     let select1 = document.getElementById('select1');
//
//     let select2 = document.getElementById('select2');
//
//     let select3 = document.getElementById('select3');
//
//     let select4 = document.getElementById('select4');
//
//     let select5 = document.getElementById('select5');
//
//     let select6 = document.getElementById('select6');
//
//     let select7 = document.getElementById('select7');
//
//     let select8 = document.getElementById('select8');
//
//     let select0 = document.getElementById('select0');
//
//     if (select1) {
//         document.getElementById('room').style.display = element.value == 1 ? 'block' : 'none';
//     }
//     if (select2) {
//         document.getElementById('enter').style.display = element.value == 2 ? 'block' : 'none';
//     }
//     if (select3) {
//         document.getElementById('services').style.display = element.value == 3 ? 'block' : 'none';
//
//     }
//     if (select4) {
//         document.getElementById('book').style.display = element.value == 4 ? 'block' : 'none';
//
//     }
//     if (select5) {
//         document.getElementById('stairs').style.display = element.value == 5 ? 'block' : 'none';
//
//     }
//     if (select6) {
//         document.getElementById('emergency').style.display = element.value == 6 ? 'block' : 'none';
//
//     }
//     if (select7) {
//         document.getElementById('work_relax').style.display = element.value == 7 ? 'block' : 'none';
//
//     }
//     if (select8) {
//         document.getElementById('disabled').style.display = element.value == 8 ? 'block' : 'none';
//
//     }
//     if (select0) {
//         document.getElementById('plan_bullets').style.display = element.value == 0 ? 'block' : '';
//         // document.getElementById('filter').onchange = function () {
//         //     window.location = location.href;}
//     }
//
// }

// function bulletPopup() {
//
// }

currentTime();
setGreeting();

planNavigation();
// bulletPopup();

// hideFilter();

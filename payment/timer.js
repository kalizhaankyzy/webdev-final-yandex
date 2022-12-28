var time = 3 * 60;

setInterval(function() {
  var seconds = time % 60;
  var minutes = (time - seconds) / 60;
  if (seconds.toString().length == 1) {
    seconds = "0" + seconds;
  }
  if (minutes.toString().length == 1) {
    minutes = "0" + minutes;
  }

  document.getElementById("time").innerHTML = minutes + ":" + seconds;

  time--;
  if (time < 0) {
    window.location.href = "http://localhost/yandex/all_services/all_services.html";
  }
}, 1000);
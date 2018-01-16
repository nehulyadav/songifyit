<!DOCTYPE html>
<html>
<head>
<script src='//vws.responsivevoice.com/v/e?key=lGte4szv'></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script>
<script>
  // Initialize Firebase
var config = {
    apiKey: "AIzaSyAm3dVYOrrJlYWX0jPOX37bee-kIImhVxA",
    authDomain: "jinx-5cd2c.firebaseapp.com",
    databaseURL: "https://jinx-5cd2c.firebaseio.com",
    projectId: "jinx-5cd2c",
    storageBucket: "jinx-5cd2c.appspot.com",
    messagingSenderId: "866918358078"
  };
  firebase.initializeApp(config);

function writeUserData(name) {
  var database = firebase.database();
  firebase.database().ref('users/now').set({
    title: name
  });
}

</script>



<script type="text/javascript">
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
</script>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
if (getCookie("person") == "") {
  var person = prompt("Please enter your name", "");
  if (person != null) {
    setCookie("person", person, 365);
  }
}


</script>



</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Songify It</a>
    </div>
   
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" id="inp2" class="form-control" placeholder="Search">
      </div>
      <button id="submit" type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</nav>

<div id="d" class="container" style="margin-top:100px">
</div>

 </body>


<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&q=wolve&key=AIzaSyCr46o3s9BFdDeDPLCVMmr7lsQphFx2KzI");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

//echo $result;

echo '
<script>
$.each(' . $result . ', function(i, field){
          if (i == "items") {
                    // console.log(field);
                    $.each(field, function(j, field2){
                //console.log(j + " " + field2);
                $.each(field2, function(k, field3){
                    if (k == "id") {
              setCookie("ide", field3["videoId"], 365);
                    }

                    if (k == "snippet") {
                      var url = "\"" + field3["thumbnails"]["high"]["url"] + "\"";
                      console.log(field3["thumbnails"]["high"]["url"]);

                      var height = "\"" + "137.64" + "\"";
                      var width = "\"" + "246" + "\"";
                      var title = field3["title"];
                      // var y = "https://www.youtube.com/watch?v=" +  
                      var c = field3["channelTitle"];
                      console.log(field3["title"]);
              console.log(field3["channelTitle"]);
                                  
              var str = "<img src=" + url + " height =" + height + " width = " + width + "/><b><a href=\"#\" class=\"testClick\" name=\"" + getCookie("ide")+ "\">" + title + "</a></b></br></br>";
              document.getElementById("d").innerHTML += str;
              

                    }

                  
            });

            });

          }
            });


$("#submit").click(function(){
  if (document.getElementById("inp2").value == "") {
    alert("don\'t you have a song to search?");
  } else {
    
    
}

});



</script> 


';

echo '
<script>

$(".testClick").click(function () {
        var addressValue = $(this).attr("name");
        alert(addressValue);
        responsiveVoice.speak(getCookie("person") + "added a song to play now");

        setTimeout(function(){writeUserData(addressValue);

        firebase.database().ref("/users/now").on("child_added", function(snapshot, prevChildKey) {
         location.replace("https://www.youtube.com/watch?v="+childSnapshot.val());
        });
          
      //     firebase.database().ref("/users/now").once("value").then(function(snapshot) {
      //               snapshot.forEach(function(childSnapshot) {
      //              location.replace("https://www.youtube.com/watch?v="+childSnapshot.val());

      //   });
      // });


        }, 6000);



        //location.replace("https://www.youtube.com/watch?v="+addressValue);
    });

</script>

';


?>
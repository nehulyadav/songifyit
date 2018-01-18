<!DOCTYPE html>
<html>
<div id="vid"></div>

<head>
<script src='//vws.responsivevoice.com/v/e?key=lGte4szv'></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script>


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

 // firebase.database().ref("/users/now").once("value").then(function(snapshot) {  
 //           snapshot.forEach(function(childSnapshot) {       
 //          // location.replace("https://www.youtube.com/watch?v="+childSnapshot.val());
 //          setCookie("now", childSnapshot.val(), 365);
 //          });
 //        });


 function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                if (getCookie("now") == allText.split(",")[1].trim()) {
                    setCookie("src", allText.split(",")[0].trim(), 365);

                }
            }
        }
    }
    rawFile.send(null);
}

// alert(getCookie("now"));
// readTextFile("file.txt");


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
   
    <button onclick="myFunction()">Click me</button>
<input id="inp2" onkeypress="return runScript(event)"></input>

  </div>
</nav>

<div id="d" class="container" style="margin-top:100px">
</div>


<script type="text/javascript">
  
  function myFunction() {
    if (document.getElementById("inp2").value == "") {
    alert("don\'t you have a song to search?");
  } else {
    setCookie("input12", document.getElementById("inp2").value, 365);
    //alert(getCookie("input12"));
    location.replace("http://localhost:8888/collate/newcode.php");
}

}


function runScript(e) {
    if (e.keyCode == 13) {
        if (document.getElementById("inp2").value == "") {
    alert("don\'t you have a song to search?");
  } else {
    setCookie("input12", document.getElementById("inp2").value, 365);
    //alert(getCookie("input12"));
    location.replace("http://localhost:8888/collate/newcode.php");
}
    }
}

 
</script>

 </body>

<?php

echo '
<script type="text/javascript">

function openNewBackgroundTab(){
  // alert(getCookie("i"));
  // alert(getCookie("i").split(",")[getCookie("i").split(",").length-1] + ".png");
    //alert(getCookie("newval"));

    var a = document.createElement("a");
    a.href = "w.php";
    var evt = document.createEvent("MouseEvents");    
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, true, false, false, false, 0, null);
    a.dispatchEvent(evt);

    var myVar = setInterval(function(){ 
      readTextFile("file.txt"); // after n.js sets it
                writeUserData(getCookie("now")); //sets now cookie

      var s = "<video id=\"myVideo\" controls autoplay><source src=\"" + getCookie("src") + "\" type=\"video/mp4\"><p>Your browser does not support H.264/MP4.</p></video>";
    //alert(s);
  document.getElementById("vid").innerHTML = s;

 var vid = document.getElementById("myVideo");

 vid.addEventListener("loadeddata", function () {

           clearInterval(myVar);

             //alert("Video has started loading successfully!");
  });

   }, 24000);


 // setTimeout(function(){ 

 //   if (getCookie("on") != "on") {
 //     document.getElementById("vid").innerHTML = "";
 //   }

 //   }, 17000);


}
</script>

';


?>


<?php
$ch = curl_init();
//echo $_COOKIE['input12'];

curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($_COOKIE['input12']) . "&key=AIzaSyCr46o3s9BFdDeDPLCVMmr7lsQphFx2KzI");
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





</script> 


';

echo '
<script>

$(".testClick").click(function () {
        var addressValue = $(this).attr("name");
        alert(addressValue);
        responsiveVoice.speak(getCookie("person") + "added a song to play now");

        setTimeout(function(){
          setCookie("now", addressValue, 365);
          // writeUserData(addressValue); //sets now cookie
          openNewBackgroundTab();

        //  firebase.database().ref("/users/now").once("value").then(function(snapshot) {
        //   snapshot.forEach(function(childSnapshot) {
        //   setCookie("newval", childSnapshot.val(), 365);
        //  // location.replace("https://www.youtube.com/watch?v="+childSnapshot.val());
        //   openNewBackgroundTab();
        //   //location.replace("w.php");
        //   });
        // });

      //     firebase.database().ref("/users/now").once("value").then(function(snapshot) {
      //               snapshot.forEach(function(childSnapshot) {
     //             setCookie("newval", childSnapshot.val(), 365);
       // openNewBackgroundTab();
      //              location.replace("https://www.youtube.com/watch?v="+childSnapshot.val());

      //   });
      // });


        }, 6000);



        //location.replace("https://www.youtube.com/watch?v="+addressValue);
    });


  setInterval(function(){ 

 //  firebase.database().ref("/users/now").once("value").then(function(snapshot) {  
 //            snapshot.forEach(function(childSnapshot) {       
 //            //location.replace("https:www.youtube.com/watch?v="+childSnapshot.val());
 //          if (getCookie("now") != childSnapshot.val()) {
 //                setCookie("now", childSnapshot.val(), 365);
 //             //location.replace("https:www.youtube.com/watch?v="+childSnapshot.val());
 //                alert("referes");
 //                if (document.getElementById("myVideo").src != getCookie("file") ) {
 //              var s = "<video id=\"myVideo\" controls autoplay><source src=\"" + getCookie("file") + "\" type=\"video/mp4\"><p>Your browser does not support H.264/MP4.</p></video>";
 //   document.getElementById("vid").innerHTML = s;
 // }
 //          }
 //           });
 //         });

firebase.database().ref("/users/now").on("child_changed", function(snapshot) {
  var changedPost = snapshot.val();
  var s = "<video id=\"myVideo\" controls autoplay><source src=\"" + changedPost + "\" type=\"video/mp4\"><p>Your browser does not support H.264/MP4.</p></video>";
   // alert(s);
  document.getElementById("vid").innerHTML = s;

  console.log("The updated post title is " + changedPost);
});


  }, 2000);


</script>

';


?>




</html>
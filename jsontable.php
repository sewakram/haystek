<!DOCTYPE html>

<html>
<head>
<title>Laravel CRUD </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <style>
      table {
      margin: 0 auto;
      font-size: large;
      border: 0px solid black;
      border-collapse: separate;
      border-spacing: 0 1em;
      }

      h1 {
      text-align: center;
      color: #006600;
      font-size: xx-large;
      font-family: 'Gill Sans', 
      'Gill Sans MT', ' Calibri', 
      'Trebuchet MS', 'sans-serif';
      }
      .center{
      position:relative;
      height: X px;
      width: Y px;
      left:40%;
      top:50%;
      margin-top:- X/2 px;
      margin-left:- Y/2 px;
      }
  
    </style>
</head>
<body style = "background-color:#17a2b8;">
<div class="container">
  <div class="row" style=" margin-left: 36%;margin-top: 5%;color: white;"><h3>PEOPLE DATA</h3>
    <input style="margin-left: 5%;" class="btn btn-danger" type = "button" id = "addmore" value = "Next Person" /></div>
  <div class="row">
  <table border="0" id = "stage" style="margin-top:10px;width:50% " >
         
  </table>
</div>
  <div class="row"><p class="center" style="color:white;">currently <span id='numpeople'>1</span > people showing</p></div></div>
</div>
</body>
<script>
$(document).ready(function () {
  $.getJSON("data.json",
      function (data) {
      console.log(data);
      $('#stage').html('<tr><td style="background-color:green;color:white;padding:10px;">1.</td><td style="background-color:white;"><p> Name: ' + data[0].name + '</p><p>Location : ' + data[0].location+ '</p></td></tr>');
      localStorage.setItem('added-items',JSON.stringify(data));
      });
  });
  var rowIdx = 1;
  $('#addmore').on('click', function () {
    // alert(++rowIdx);
    let rono=++rowIdx;
    var retrievedObject = localStorage.getItem('added-items');
  var parsedObject = JSON.parse(retrievedObject);
  let items=parsedObject[rono-1];
  console.log(parsedObject[rono-1]);
  if(items=== undefined){alert('SORRY NO DATA FOUND');}
      $('#stage').append('<tr><td style="background-color:green;color:white;padding:10px;">'+rono+'.</td><td style="background-color:white;"><p> Name: ' +items.name+'</p><p>Location : '+items.location+'</p></td></tr>');
      $('#numpeople').text(rono);
  });
</script>
</html>

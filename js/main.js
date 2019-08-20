//CUSTOMIZED JS

//FUNCTIONS THAT SHOWS THE STEP 2 ONLY AFTER THE CUSTOMER CHOOSES A SERVICE:

function ShowBooking(){
    document.getElementById('wrapper').style.display ='block';
  }

  //DATEPICKERS CONFIGURATION (CUSTOMER PAGE AND ADMINISTRATOR PAGE):

  $("#datep").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: 1,
    maxDate: '+3m',
    onChange: function(date){
      document.getElementById('datetry').innerHTML = date;
    },
    beforeShowDay: function(date){ return [date.getDay() != 0,""]},
    
  });

  $("#startdatepic").datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    maxDate: '+6m',
    onSelect: function(date){

        var selectedDate = new Date(date);
        var endDate = new Date(selectedDate);

       //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
        $("#enddatepic").datepicker( "option", "minDate", endDate );
        $("#enddatepic").datepicker( "option", "maxDate", '+6m' );

    }
});

$("#enddatepic").datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    maxDate: '+6m',
});

//MAKE DATEPICKER READ ONLY FOR USER
$(".readonly").keydown(function(e){
  e.preventDefault();
});

//GET CURRENT POSITION
var lat = 0;
var lon = 0;

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    document.getElementById('map').innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  lat = position.coords.latitude;
  lon = position.coords.longitude
  initMap(lat,lon);
}

//LIVE TRAFFIC

function initMap(lat,lon) {
  var currentLocation = {lat: lat, lng: lon};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 18,
    center: currentLocation
  });
  var marker = new google.maps.Marker({position: currentLocation, map: map});
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);
}

function onError(msg){

  console.log(msg);
}

function goBack() {
  window.history.back();
}


//MODAL

//Close button (x)

function close(){
  document.getElementById('modal1').style.display='none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}


//TEST NUMBER FOR MOBILE INPUT AT USER REGISTRATION

    function testNumber(evt){
        var ch = String.fromCharCode(evt.which);

        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }



//TEST NUMBER FOR QUANTITY MINIMUM=1 AT ADD ITEM
function testNumber2(evt){
  var ch = String.fromCharCode(evt.which);

  if(!(/[1-9]/.test(ch))){
      evt.preventDefault();
  }
}

//SCRIPT FOR CASCADING VEHICLE REGISTRATION
        
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='newuser.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='newuser.php?cat=' + val + '&cat3=' + val2 ;
}
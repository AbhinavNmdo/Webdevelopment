<?php 
session_start();
 ?><html>
<head>
	<title>Smart Automated Whatsapp Ordering - For Smart Users</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui"/>
	<meta name="description" content="Smart Innovative Automated Whatsapp Ordering System & Where Customer Meet Local Vendor."/>
	<link rel="stylesheet" type="text/css" href="css/notificationstyle.css" >
    <link rel="stylesheet" href="css/Organic/elegant-icons.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<style type="text/css">
body{
resize: none;
width: auto;
height: 100%;
}
#c1{
width: 100%;
height: 100%;	
}
</style>
<body onload="getLocation()">    

<div class="card" id="c1">
  <div class="card-header" style="font-family: 'Rubik', sans-serif; font-size: 20px; background-color: #2e7c4e; color: #fff;">
    <span style="margin: auto; float: left;"><img src="images/ogwp.png" style="width: 50px; height: 50px;" />WhatsApp Smart Subscription</span>
  </div>
  <div style="background-color: #CCFFCC; width: 100%;">
    <center>
    <span id="L001" style="margin-top: 5px;font-family: 'Rubik', sans-serif; font-size: 12px; color: #111111"></span>
    </center>
  </div>
  <div class="card-body" style="background-image: url(images/wpbg.png); background-repeat: no-repeat; background-size: cover;">
    <!-- <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <!-- <div style="border: 2px solid white; border-radius: 8px; box-shadow: 0 1px 1px -1px #666; margin: 2px; width: 50%; height: auto; background-color: white; color: black; font-family: 'Rubik', sans-serif; font-size: 12px; margin-top: 2%; float: left; margin-left: -10px;">
    	<p style="margin: 1%;">Please allow the location, to get registered.</p>
    	<div style=" bottom:-1px; float: right; font-family: 'Rubik', sans-serif; font-size: 8px; color: #111111; margin-top: 1px; margin-right: 2px;">
    	
    	</div>
    </div> -->
    <div style="border: 2px solid white; border-radius: 8px; box-shadow: 0 2px 15px -7px #666; margin: 2px; width: 95%; height: auto; background-color: white; color: black; font-family: 'Rubik', sans-serif; font-size: 14px; margin-top: 20%;">
    	<!-- <form method="post" action="#"> -->
			<div class="card-body">
			<ul class="list-group list-group-flush">
				<li class="list-group-item" style="border: 0; outline: 0">City : <span id="city"></span></li>
				<li class="list-group-item" style="border: 0; outline: 0">Pincode : <input style="border: 2px solid white; border-radius: 15px; outline: 0; background-color: white; color: #111111;" minlength="6" maxlength="6" type="text" id="postal_code" value="" required="" placeholder="Enter your pincode"></li>
				<br />
				<li class="list-group-item">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheck1" disabled="true">
						<label class="custom-control-label" for="customCheck1" id="nothing" style=" font-family: 'Rubik', sans-serif; font-size: 12px; color: #111111"></label>
							<ul style="list-style-type:none;">
								<div style="margin-left: -20%; background-color: #fcfcfc; border: 1px solid #fcfcfc; border-radius: 2px;">
									<li id="L002" style="margin: 5px;font-family: 'Rubik', sans-serif; font-size: 12px; color: #111111"></li>
								</div>
							</ul>
						<!-- </ul> -->
					</div>
				</li>
			</ul>
			<div class="card-footer" style="border: 0; outline: 0; background-color: #fff; margin-bottom: 0;">
				<button type="button" class="btn btn-success" id="allowbtn" disabled="" style="font-family: 'Rubik', sans-serif; font-size: 15px; width: 100%; height: auto;">Allow</button>
			</div>
			</div>
	    <!-- </form> -->
    </div>
  </div>
</div>


<!-- Get Lat and Long -->

	<script type="text/javascript">	

	const urlParams = new URLSearchParams(window.location.search);
	this.businessName = 'The Daily Fresh Store';
	this.source = urlParams.get('source');
	this.lang = urlParams.get('lang') || 'en_US';
	printHTML(this.lang, this.businessName);
	navigator.geolocation.getCurrentPosition(showPosition, error, options);
	
	// setTimeout(function() {
	// var pc = document.getElementById('postal_code').innerText;

	// if (pc.length > 4){
	document.getElementById('customCheck1').disabled = false;
	document.getElementById('customCheck1').addEventListener('change', ()=> {
	document.getElementById('allowbtn').disabled = !document.getElementById('customCheck1').checked;
	});
		// alert("values");
	document.getElementById('allowbtn').addEventListener('click', ()=> {
		// openWAMessage();
		if (document.getElementById("postal_code").value.length > 4){
			alert("Success!");	
		}else{
			alert("Enter a valid postal code.");
		}
		
	});
	// }
	
	// }, 5000);

	var options = {
	    enableHighAccuracy: true,
	    timeout: 5000,
	    maximumAge: 0
  	};

	async function openWAMessage() {
	var RAPIDAPI_API_URL = document.getElementById('base_URL').innerText + "/whatsapp/manageWAMessage";
	var options =
		{
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-Type': 'application/json'
		  },
		//make sure to serialize your JSON body
		body: JSON.stringify({
				address: document.getElementById('address').innerText,
				varlat: document.getElementById('varlet').innerText,
				varlong: document.getElementById('varlong').innerText,
				postal_code :document.getElementById('postal_code').innerText,
				state : document.getElementById('state').innerText,
				country : document.getElementById('country').innerText,
				city : document.getElementById('city').innerText,
				locality :document.getElementById('locality').innerText,
				neighborhood :document.getElementById('neighborhood').innerText,
				sublocality:document.getElementById('sublocality').innerText,
				subpremise:document.getElementById('subpremise').innerText,
				referral:document.getElementById('referral').innerText
			})
	  	}

    const response = 
     fetch(RAPIDAPI_API_URL,options)
	.then(response => 
		response.json())
    .then(data => 
        handleWAMessage(data))
    .catch(error => console.error('Unable to get items.', error));
};

function successData(data) {
	document.getElementById('address').innerText =  data.address;
	document.getElementById('postal_code').innerText =  data.allAddressParam.postal_code;
	document.getElementById('state').innerText =  data.allAddressParam.state;
	document.getElementById('country').innerText =  data.allAddressParam.country;
	document.getElementById('city').innerText =  data.allAddressParam.city;
	document.getElementById('locality').innerText =  data.allAddressParam.locality;
	document.getElementById('neighborhood').innerText =  data.allAddressParam.neighborhood;
	document.getElementById('sublocality').innerText =  data.allAddressParam.sublocality;
	document.getElementById('subpremise').innerText =  data.allAddressParam.subpremise;
}

  function error(err) {
	console.warn(`ERROR(${err.code}): ${err.message}`);
	document.getElementById('address').innerText =  null;
	document.getElementById('postal_code').innerText =  null;
	document.getElementById('state').innerText =  null;
	document.getElementById('country').innerText =  null;
	document.getElementById('city').innerText =  null;
	document.getElementById('locality').innerText =  null;
	document.getElementById('neighborhood').innerText =  null;
	document.getElementById('sublocality').innerText =  null;
	document.getElementById('subpremise').innerText =  null;
  }
  

	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  }
	}
		
	function showPosition(position) {
	
	  var latlag = "latlng=" + position.coords.latitude + "," + position.coords.longitude;
	  var findloc = "https://maps.googleapis.com/maps/api/geocode/json?"+latlag+"&key=AIzaSyCn4gxK-xrWGcCu6aIXvL5mz1EnthMEwUc";
	  // console.log(findloc);
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {
	    getResponse(this.responseText);
	   }
	   };
	  xhttp.open("GET", findloc, true);
	  xhttp.send();

	}	

	function getResponse(crd){
	
	var addressObj = {
            postal_code:'',
            state:'',
            country:'',
            city:'',
            locality:'',
            neighborhood:'',
            sublocality:'',
            subpremise:''
        };

	var jsonData = JSON.parse(crd);
	jsonData.results[0].address_components.forEach((item) =>
        {
        for(var i=0;i<item.types.length;i++)
        {
            switch(item.types[i]) {
                case 'postal_code':
                    addressObj.postal_code = item.short_name;
                    break;
                case 'administrative_area_level_2':
                    addressObj.city = item.short_name;
                    break;
                case 'administrative_area_level_1':
                    addressObj.state = item.short_name;
                    break;
                case 'locality':
                    addressObj.locality = item.short_name;
                    break;
                case 'sublocality':
                    addressObj.sublocality = item.short_name;
                    break;
                case 'neighborhood':
                    addressObj.neighborhood = item.short_name;
                    break;
                case 'subpremise':
                    addressObj.subpremise = item.short_name;
                    break;
                case 'country':
                    addressObj.country = item.long_name;
                    break;
            }
        }});

	var addressObj = addressObj;
    var addressGoogle = jsonData.results[0].formatted_address;
    // console.log(addressGoogle);

	document.getElementById("city").innerHTML = addressObj.city;
	document.getElementById("postal_code").value = addressObj.postal_code;
	}	


function printHTML(lang, businessName) {
	switch(lang) {
		case 'de': {
			text = {
				L001: "Chatten Sie mit $BusinessName auf WhatsApp.".replace("$BusinessName", businessName),
				L002: "Mit dem Absenden der folgenden Nachricht stimme ich dem Erhalt von Benachrichtigungen zu",
			};
			break;
		}
		case 'es': {
			text = {
				L001: "Chatea con $BusinessName en WhatsApp".replace("$BusinessName", businessName),
  			L002: "Acepto recibir notificaciones enviando el siguiente mensaje",
			};
			break;
		}
		case 'pt_BR': {
			text = {
				L001: "Converse com $BusinessName no WhatsApp".replace("$BusinessName", businessName),
				L002: "Ao enviar a seguinte mensagem, eu concordo em receber notificaÃ§Ãµes.",
			};
			break;
		}
		case 'ru': {
			text = {
				L001: "ÐŸÐ¾Ð³Ð¾Ð²Ð¾Ñ€Ð¸Ñ‚Ðµ Ñ $BusinessName Ñ‡ÐµÑ€ÐµÐ· WhatsApp".replace("$BusinessName", businessName),
				L002: "ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð»ÑÑ ÑÐ»ÐµÐ´ÑƒÑŽÑ‰ÐµÐµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ, Ñ ÑÐ¾Ð³Ð»Ð°ÑˆÐ°ÑŽÑÑŒ Ð½Ð° Ð¿Ð¾Ð»ÑƒÑ‡ÐµÐ½Ð¸Ðµ ÑƒÐ²ÐµÐ´Ð¾Ð¼Ð»ÐµÐ½Ð¸Ð¹.",
			};

			break;
		}
		case 'tr': {
			text = {
				L001: "WhatsApp'ta $BusinessName ile sohbet et".replace("$BusinessName", businessName),
				L002: "AÅŸaÄŸÄ±daki mesajÄ± gÃ¶ndererek bildirimleri almayÄ± kabul ediyorum",
			};
			break;
		}
		case 'it': {
			text = {
				L001: "Chatta con $BusinessName su WhatsApp".replace("$BusinessName", businessName),
				L002: "Accetto di ricevere le notifiche inviando il seguente messaggio",
			};
			break;
		}
		case 'nl': {
			text = {
				L001: "Chat met $BusinessName op WhatsApp".replace("$BusinessName", businessName),
			    L002: "Ik ga akkoord met het ontvangen van meldingen door het volgende bericht te sturen",
			};
			break;
		}
		default: {
			text = {
				L001: "Chat with $BusinessName on WhatsApp".replace("$BusinessName", businessName),
				L002: "I agree to receive notifications and sharing address information by sending this message",
			};
		}
	}
	document.getElementById('L001').innerText = text.L001;
	document.getElementById('L002').innerText = text.L002;
	
}
	

	// function openWAMessage() {
// curl --location --request POST 'https://api.gupshup.io/sm/api/v1/msg' \
// --header 'Cache-Control: no-cache' \
// --header 'Content-Type: application/x-www-form-urlencoded' \
// --header 'apikey: 2xxc4x4xx2c94xxxc2f9xx9d43xxxx8a' \
// --data-urlencode 'channel=whatsapp' \
// --data-urlencode 'source=917834811114' \
// --data-urlencode 'destination=918x98xx21x4' \
// --data-urlencode 'message=hi' \
// --data-urlencode 'src.name=DemoApp'
	// var xhttp = new XMLHttpRequest();
	// xhttp.onreadystatechange = function() {
	// 	if (this.readyState == 4 && this.status == 200) {
	// 		getResponse(this.responseText);
	// 	}
	// };
	// xhttp.open("GET", findloc, true);
	// xhttp.send();

	// }

	</script>


<!-- <script type="text/javascript" src="js/whatsappsubscription.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	
</body>
</html>
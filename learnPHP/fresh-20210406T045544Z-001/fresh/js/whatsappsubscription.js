var text;
//var ENVURL = 'http://Localhost:1111';
//const WHATSAPP_URL_ENDPOINT = 'https://dev-smsinbox.gupshup.io'; // // For dev
//const WHATSAPP_URL_ENDPOINT = 'https://qa-smsinbox.gupshup.io'; // For QA

(function(req,res) {
	const urlParams = new URLSearchParams(window.location.search);
	this.businessName = 'The Daily Fresh Store';
	this.source = urlParams.get('source');
	this.lang = urlParams.get('lang') || 'en_US';
	printHTML(lang, this.businessName);
	navigator.geolocation.getCurrentPosition(success, error, options);
	document.getElementById('checkBoxOptin').addEventListener('change', ()=> {
		document.getElementById('L015').disabled = !document.getElementById('checkBoxOptin').checked;
	});
	document.getElementById('L015').addEventListener('click', ()=> {
		openWAMessage();
	});
})();


var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };
  
  function success(pos) {
	var crd = pos.coords;
	// console.log('Your current position is:');    
    // console.log('Latitude : ${crd.latitude}');
    // console.log('Longitude: ${crd.longitude}');
    // console.log('More or less ${crd.accuracy} meters.');
    // prepareAddressInfo(crd);
    //getAddressInfo(crd);
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
  
const prepareAddressInfo = async (crd) => {

    var Address =
        await getAddressInfo(crd)
        .then((response) => {
        	console.log(response);
        	//try now
            return response;
        })
        .catch(err => { // eslint-disable-line
            console.log(err)
        
        // reject(err);
        });
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

        Address.results[0].address_components.forEach((item) =>
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
        }
    });
    var addressObj = addressObj;
    var addressGoogle = Address.results[0].formatted_address;
    alert(addressObj);
    alert(addressGoogle);
};

const getAddressInfo = async (crd) => {
//  function getAddressInfo(crd) {try
  	var urlParams= 'latlng='+crd.latitude+','+crd.longitude;
  	alert(urlParams);
	document.getElementById('varlet').innerText =  crd.latitude;
	document.getElementById('varlong').innerText =  crd.longitude;


    //Long : 73.95835470000002
    //Let : 18.4863541
    var RAPIDAPI_API_URL = "https://maps.googleapis.com/maps/api/geocode/json?"+urlParams+"&key=AIzaSyCn4gxK-xrWGcCu6aIXvL5mz1EnthMEwUc";
    var options = {
        'method': 'POST',
        'url': RAPIDAPI_API_URL,
        'headers': {
            'Content-Type': 'application/x-www-form-urlencoded'
            //,'apikey': '3d08cbbd784d42dfc208d7fc07a3e54c'
        }
    };
    return new Promise((resolve, reject) => {
      request(options, function(error, response) {
          if (error)
          { 
            console.log('error');
            reject(error);;
          }
          else {
          	console.log(response.body);
            resolve(JSON.parse(response.body));
          }
      });
    });


	alert('first func compelte');
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

function printHTML(lang, businessName) {
	switch(lang) {
		case 'de': {
			text = {
				L001: "Chatten Sie mit $BusinessName auf WhatsApp.".replace("$BusinessName", businessName),
				L002: "Mit dem Absenden der folgenden Nachricht stimme ich dem Erhalt von Benachrichtigungen zu",
  			L015: "Nachricht senden"
			};
			break;
		}
		case 'es': {
			text = {
				L001: "Chatea con $BusinessName en WhatsApp".replace("$BusinessName", businessName),
  			L002: "Acepto recibir notificaciones enviando el siguiente mensaje",
    		L015: "enviar mensaje",
			};
			break;
		}
		case 'pt_BR': {
			text = {
				L001: "Converse com $BusinessName no WhatsApp".replace("$BusinessName", businessName),
				L002: "Ao enviar a seguinte mensagem, eu concordo em receber notificaÃ§Ãµes.",
				L015: "enviar mensagem",
			};
			break;
		}
		case 'ru': {
			text = {
				L001: "ÐŸÐ¾Ð³Ð¾Ð²Ð¾Ñ€Ð¸Ñ‚Ðµ Ñ $BusinessName Ñ‡ÐµÑ€ÐµÐ· WhatsApp".replace("$BusinessName", businessName),
				L002: "ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð»ÑÑ ÑÐ»ÐµÐ´ÑƒÑŽÑ‰ÐµÐµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ, Ñ ÑÐ¾Ð³Ð»Ð°ÑˆÐ°ÑŽÑÑŒ Ð½Ð° Ð¿Ð¾Ð»ÑƒÑ‡ÐµÐ½Ð¸Ðµ ÑƒÐ²ÐµÐ´Ð¾Ð¼Ð»ÐµÐ½Ð¸Ð¹.",
				L015: "ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð¸Ñ‚ÑŒ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ",
			};

			break;
		}
		case 'tr': {
			text = {
				L001: "WhatsApp'ta $BusinessName ile sohbet et".replace("$BusinessName", businessName),
				L002: "AÅŸaÄŸÄ±daki mesajÄ± gÃ¶ndererek bildirimleri almayÄ± kabul ediyorum",
				L015: "Mesaj GÃ¶nder"
			};
			break;
		}
		case 'it': {
			text = {
				L001: "Chatta con $BusinessName su WhatsApp".replace("$BusinessName", businessName),
				L002: "Accetto di ricevere le notifiche inviando il seguente messaggio",
				L015: "Invia messaggio"
			};
			break;
		}
		case 'nl': {
			text = {
				L001: "Chat met $BusinessName op WhatsApp".replace("$BusinessName", businessName),
			    L002: "Ik ga akkoord met het ontvangen van meldingen door het volgende bericht te sturen",
				L015: "Bericht verzenden",
			};
			break;
		}
		default: {
			text = {
				L001: "Chat with $BusinessName on WhatsApp".replace("$BusinessName", businessName),
				L002: "I agree to receive notifications and sharing address information by sending the following message",
				L015: "Send Message",
			};
		}
	}
	document.getElementById('L001').innerText = text.L001;
	document.getElementById('L002').innerText = text.L002;
    document.getElementById('L015').innerText = text.L015;
}

async function handleWAMessage(res) {
	if (res && res.status === 'success' && res.consent && res.consent.url) {
        	//+document.getElementById('let').value+document.getElementById('long').value);
        window.open(res.consent.url, '_self');
	} else {
		toastr.error('Something went wrong.');
	}
}
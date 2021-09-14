router.post('/whatsapp/getAddress', async (req, res) => {
        await prepareEdressInfo(req,res);
        //console.log(addressObj);
        res.status(200).json({'address':res.addressGoogle,
                      'allAddressParam':res.addressObj});
});

const getAddressInfo = (req, res) => {
    var latLongPath = '';
    if(req.longitude && req.latitude)
    {
	    latLongPath= 'latlng='+req.latitude+','+req.longitude;
    }
    else if(req.body && req.body.urlParams)
    {
        latLongPath = req.body.urlParams;
    }

    //Long : 73.95835470000002
    //Let : 18.4863541
    var RAPIDAPI_API_URL = "https://maps.googleapis.com/maps/api/geocode/json?"+latLongPath+"&key=AIzaSyCn4gxK-xrWGcCu6aIXvL5mz1EnthMEwUc";
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
            resolve(JSON.parse(response.body));
          }
      });
    });
};

const prepareAddressInfo = async (req, res) => {

    var Address =
        await getAddressInfo(req, res)
        .then((response) => {
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
    res.addressObj = addressObj;
    res.addressGoogle = Address.results[0].formatted_address;
};


const manageWAMessage = (req, res) => {
  const RAPIDAPI_API_URL = 'https://whatsapp-support.gupshup.io/optinmanager/consent/request'; // For production

  var options = {
      'method': 'POST',
      'url': RAPIDAPI_API_URL,
		  'body' : 'a=dbde6b0b-8838-48c5-83ff-cb01d31e4628&s=WEB',
      'headers': {
          'Content-Type': 'application/x-www-form-urlencoded'
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
          resolve(JSON.parse(response.body));
        }
    });
  });
};

router.post('/whatsapp/manageWAMessage', async (req, res) => {
  var response =
              await manageWAMessage(req, res)
              .then((response) => {
                  return response;
              })
              .catch(err => { // eslint-disable-line
                  console.log(err)
                
                // reject(err);
              });
    var splitAll = response.consent.url.split(' ');
    var no = splitAll[8].split('&');
    const db = req.app.db;
    var subObj = 
    {
        subsciptionNo : no[0],
        lat : req.body.varlat,
        long: req.body.varlong,
        address:req.body.address,
        postal_code:req.body.postal_code,
        state:req.body.state,
        country:req.body.country,
        city:req.body.city,
        locality:req.body.locality,
        neighborhood:req.body.neighborhood,
        sublocality:req.body.sublocality,
        subpremise:req.body.subpremise,
        referral:req.body.referral
    }
    await db.whatsAppSubscriptionMsg.insertOne(subObj);
    res.status(200).json(response);
});
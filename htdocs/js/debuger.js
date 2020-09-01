function debugUpdate(debugUpdate){




https://deco3801-messy-eaters.uqcloud.net/api/receive?token=messyglutton&topic=sc/g/1&eui=ALEXTEST

$.ajax({
            url: "https://deco3801-messy-eaters.uqcloud.net/api/receive?token=messyglutton&topic=sc/g/1&eui=ALEXTEST",
            type: 'GET',
            success: function(data) {
                
	document.getElementById('debug').innerHTML = data; 
            }
        });





	//document.getElementById('debug').innerHTML = "pages/"+pageChange + ".html"; 
}
if(debug){
    console.log('functions.js INJECTED');
}

/*
 * ajaxbody = Array of variables, current used for example -> {url: 'login/submit', data:formdata, dataType: 'json', type: 'POST' ( can be get )}
 * successCallback -> what happens when it returns successfully
 * errorCallback -> same as success but for error handling
*/
function sendRequest(ajaxbody,successCallback,errorCallback){
    //any global data checks can been done here,
    if(ajaxbody.type==null)ajaxbody.type='POST';
    if(ajaxbody.data==null)ajaxbody.data=[];
    if(ajaxbody.dataType==null)ajaxbody.dataType='json';

    //send the request to the server
    $.ajax(ajaxbody)
    //what to do if successfull
    .done(function(response) {
        if(debug){
            console.log("successful request");

            var data = ajaxbody.data;
            var responsetext = response;

            //Displaying all of response data if its an object
             if(typeof(response) === 'object'){
                responsetext = '';
                for(var k in response){
                    responsetext += k + '=' + response[k] + '<br>';
                }
            } else {
                if(typeof(responsetext) === 'string'){
                    if(responsetext.indexOf("</") != -1){
                    //Displaying HTML code breaks the page
                    responsetext = "HTML CODE";
                }
            }
        }
            //Check if object, if so display all that info
            if(typeof(ajaxbody.data) === 'object'){
                data = '';
                for(var k in ajaxbody.data){
                    data += k + '=' + ajaxbody.data[k] + '<br>';
                }
            }

            //The info message used for debugging
            console.log({ message: "URL: " + ajaxbody.url + "<br>Response: " + responsetext + "<br>AjaxData: " + data});

        }

        if(successCallback!=null)successCallback(response);
    })

    //what to do if error ( mainly for server offline errors / debugging )
    .fail(function(event, jqxhr, settings, thrownError) {
        
        
        //if(errorCallback!=null)errorCallback(event, jqxhr, settings, thrownError);
    })
}

function defaultMessageHandling(data){
    if(data['error']){
        alertify.error(data['error']);
    }
    if(data['success']){
        alertify.success(data['success']);
    }
    if(data['redirect']){
        window.location.replace(data['redirect']);
    }
}
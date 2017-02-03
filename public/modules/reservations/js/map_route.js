/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function (jQuery, global) {

    //Global variables
    //These variables are to use in the script globally and set in different functions through out the process. 
    var map, serviceDistanceMatrix, directionsDisplay, directionsService, origin, destination, alerts_diary = [];

    //Initialize the process
    //function ot be run on document ready
    global.initializeMapRoute = function () {
        //instance of google map
        map = initMap();
        //distance matrix service instance
        serviceDistanceMatrix = new google.maps.DistanceMatrixService();
        //google map direction renderer instance
        directionsDisplay = new google.maps.DirectionsRenderer;
        //google map directions service
        directionsService = new google.maps.DirectionsService;
        //set map for direction api
        directionsDisplay.setMap(map);
        //pickup location
        var ciudad_pickup_id = document.getElementById('ciudad_pickup_id').value;
        //dropoff location
        var ciudad_dropoff_id = document.getElementById('ciudad_dropoff_id').value;
        //execute the process in case of values are preset 
        if (ciudad_pickup_id)
            getLatLong(ciudad_pickup_id, setOrigin);
        if (ciudad_dropoff_id)
            getLatLong(ciudad_dropoff_id, setDestination);
    };

    //function to get google map instance
    global.initMap = function () {
        var map = new google.maps.Map(document.getElementById('RouteMap'), {
            center: {lat: 23.6345, lng: 102.5528},
            zoom: 5
        });
        return map;
    };

    /**
     * function to get distance matrix of source and destination
     * 
     * use the callback for post response actions
     * 
     * @param callback callback 
     */
    global.getDistanceMatrix = function (callback) {
        return serviceDistanceMatrix.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: 'DRIVING'
                }, function (response, status) {
            if (status === 'OK') {
                if (typeof callback === 'function')
                    callback(response);
            }
            return false;
        });
    };

    /**
     * 
     * function to display the route from source to destination
     * 
     * use the callback for post response actions
     * 
     * @param callback callback
     */
    global.displayRoute = function (callback) {
        directionsService.route({
            origin: origin,
            destination: destination,
            travelMode: 'DRIVING'
        },
                function (response, status) {

                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                        if (typeof callback === 'function') {
                            callback(response);
                        }
                    } else
                        console.log('Error in route data');
                });
    };

    /**
     * callback to set origin coordinates
     * 
     * @param google.maps.LatLng position
     */
    global.setOrigin = function (position) {
        origin = position;
        if (position) {
            if (document.getElementById('ciudad_dropoff_id').value && destination) {
                global.getDistanceMatrix(global.displayDistance);
                global.displayRoute();
            }
            document.getElementById('ciudad_pickup_id_group').classList.remove('has-error');
            closeAlert('not_available_pickup');
        } else {
            document.getElementById('ciudad_pickup_id_group').classList.add('has-error');
            setAlert('alert-info', 'not_available_pickup', 'Coordenadas para esta ubicación no están disponibles . Por favor ingrese distancia manualmente.', 'ciudad_pickup_id_group');
            document.getElementById('save_ubicaciones').disabled = false;
            document.getElementById('distancia_calc').value = null;
        }
    };

    /**
     * callback finction to set destination
     * 
     * @param google.maps.LatLng position
     */
    global.setDestination = function (position) {
        destination = position;
        if (position) {
            if (document.getElementById('ciudad_pickup_id').value && origin) {
                global.getDistanceMatrix(global.displayDistance);
                global.displayRoute();
            }
            document.getElementById('ciudad_dropoff_id_group').classList.remove('has-error');
            closeAlert('not_available_dropoff');
        } else {
            document.getElementById('ciudad_dropoff_id_group').classList.add('has-error');
            setAlert('alert-info', 'not_available_dropoff', 'Coordenadas para esta ubicación no están disponibles . Por favor ingrese distancia manualmente.', 'ciudad_dropoff_id_group');
            document.getElementById('save_ubicaciones').disabled = false;
            document.getElementById('distancia_calc').value = null;
        }
    };

    /**
     * Function to get location's coordinates(lat, lng) from database 
     * 
     * @param {type} location_id
     * @param {type} callback  ajax request callback
     */
    global.getLatLong = function (location_id, callback) {
        if (!location_id)
            return;

        jQuery.ajax({
            url: urlToGetLocation,
            type: 'post',
            data: {id: location_id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success === true)
                    callback(new google.maps.LatLng(response.lat, response.long));
                else
                    callback(false);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    };

//function to displaay the distance
    global.displayDistance = function (data) {
        var distance = Math.ceil(data.rows[0].elements[0].distance.value / 1000);
        if (distance === 0)
            displayError();
        else
            closeAlert('common-alert');
        document.getElementById('distancia_calc').value = distance;
    };

//function to display error when location is same for both source and distance
    global.displayError = function () {
        document.getElementById('ciudad_pickup_id_group').classList.add('has-error');
        document.getElementById('ciudad_dropoff_id_group').classList.add('has-error');
        setAlert('alert-danger', 'same_location_alert', 'Ambas locaciones no pueden ser la misma.', 'common-alert', 'removeError');
        document.getElementById('save_ubicaciones').disabled = true;
    };

//function to remove error when location is not same for both source and distance
    global.removeError = function () {
        document.getElementById('ciudad_pickup_id_group').classList.remove('has-error');
        document.getElementById('ciudad_dropoff_id_group').classList.remove('has-error');
        document.getElementById('save_ubicaciones').disabled = false;
    };

    //function to append a bootstrap alert to an HTML element
    global.setAlert = function (alert_type, alert_id, alert_msg, append_to, on_close = null, appendIfExists = false) {
        if (alerts_diary.indexOf(alert_id) === -1) {
            alerts_diary.push(alert_id);
            var html = '<div class="alert ' + alert_type + ' alert-dismissible" id="' + alert_id + '"><button type="button" class="close close-alert" id="close_' + alert_id + '" data-dismiss="alert" aria-hidden="true"';
            if (on_close)
                html += ' onClick="' + on_close + '(\'' + alert_id + '\')"';
            html += '>×</button><ul><li>' + alert_msg + '</li></ul></div>';
            document.getElementById(append_to).insertAdjacentHTML('beforeend', html);
            registerAlertCloseEvent(alert_id);
        } else if (appendIfExists === true)
            document.getElementById(alert_id).getElementsByTagName('ul')[0].innerHTML += '<li>' + alert_msg + '</li>'
    };

    //function to be called in location change
    global.onLocationChange = function (location_id, callback) {
        var ciudad_pickup_id = document.getElementById('ciudad_pickup_id').value;
        var ciudad_dropoff_id = document.getElementById('ciudad_dropoff_id').value;

        if (ciudad_pickup_id && ciudad_dropoff_id) {
            if (ciudad_pickup_id === ciudad_dropoff_id) {
                displayError();
                return;
            }
            closeAlert('same_location_alert');
        }

        return getLatLong(location_id, callback);
    };

    global.closeAlert = function (alert_id) {
        if (alerts_diary.indexOf(alert_id) !== -1) {
            document.getElementById('close_'+ alert_id).click();
        }
    };
    
    global.registerAlertCloseEvent = function(alert_id){
        document.getElementById('close_'+alert_id).addEventListener('click', function(){
            alerts_diary.splice(alerts_diary.indexOf(alert_id), 1);
        });
    };
    //document.ready
    jQuery(document).ready(function () {
        global.initializeMapRoute();
    });
})(jQuery, window);
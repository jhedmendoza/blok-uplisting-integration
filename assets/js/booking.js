(function ($) {

    var xhr;

    $(document).ready(init);

    function init() {

        $('#check-availability').on('click', function(e) {
            e.preventDefault();

            var propertyID = $('#property').val();
            var checkin    = $('#check-in').val();
            var checkout   = $('#check-out').val();

            console.log(propertyID);
            Swal.fire({
                width: 945,
                template: '#booking-list'
            });
            getBookings(propertyID, checkin, checkout);
        });

    }

    function getProperties() {

    }

    function getBookings(propertyID, checkin, checkout) {

      if (xhr && xhr.readyState != 4) xhr.abort();

      xhr = $.ajax({
        url: pluginAjaxUrl,
        data: {
          'action'     :'blok_get_bookings',
          'property_id': propertyID,
          'check_in'   : checkin,
          'check_out'  : checkout
        },
        method: 'POST',
        beforeSend: function() {},
        complete: function() {},
        success: function(result) {
        },
      });


    
    }

    function createBooking() {}


}(jQuery));

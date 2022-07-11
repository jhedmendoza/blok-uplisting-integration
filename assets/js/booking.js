(function ($) {

    var xhr;

    $(document).ready(init);

    function init() {
      $('.__search-form').clone().appendTo('.uabb-module-content:first').css('margin-top', '40px').show();

      getProperties();

        $('#check-availability').on('click', function(e) {
            e.preventDefault();

            var propertyID = $('#property').val();
            var checkin    = $('#check-in').val();
            var checkout   = $('#check-out').val();

            createBooking(propertyID, checkin, checkout);
        });

        $('.property-template-default .uabb-button').on('click', function(e) {
          e.preventDefault();
          var __propertyIDs = JSON.parse(propertyIDs);
          var __uplistingID = __propertyIDs[uplistingPropertyID];

          if (typeof __uplistingID != 'undefined')
          {
            createBooking(__uplistingID, '', '');
          }
          else {
            Swal.fire({
              icon: 'error',
              title: 'No bookings found',
            })
          }

        });

    }

    function getProperties() {
      if (xhr && xhr.readyState != 4) xhr.abort();

      xhr = $.ajax({
        url: pluginAjaxUrl,
        data: {
          'action':'blok_get_properties',
        },
        method: 'GET',
        beforeSend: function() {},
        complete: function() {
          $('#property').removeClass('hidden');
          $('.d-preloader').addClass('hidden');
        },
        success: function(result) {
          
          var resp = JSON.parse(result);
          var properties = "";

          if (resp.status) {
            $.each(resp.data, function(i, e) {
              var val = (e.has_property) ? e.id : '';
              var isDisabled = (e.has_property)? '' : 'disabled';
              properties+='<option '+isDisabled+' value="'+val+'">'+e.property_name+'</option>';
            });  
            $('#property').append(properties);
          }
        },
      });

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
        beforeSend: function() {
          Swal.fire({
            width: 945,
            template: '#booking-list',
            title: 'Fetching bookings. Please wait.',
            showConfirmButton: false,
          });
        },
        complete: function() {
          $('.preloader').addClass('hidden');
          $('.bookings').removeClass('hidden');
          $('#swal2-title').text('Bookings');
        },
        success: function(result) {
          var resp = JSON.parse(result);
          var rowClosed = false;
          
          if (resp.status) {
            var html = '';

            $.each(resp.data, function(i, e) {

              rowClosed = false;

              var bgColor = (e.available) ? 'bg-available' : 'bg-not-available';
              var availability = (e.available) ? '' : 'display:none';

              if (i % 3 == 0) {
                html += '<div class="row">'; //this opens the row
              }
          
              // here are the three columns
              html += '<div class="card '+bgColor+'">';
              html += '<div class="card-body">';
              html += '<p class="card-text"><i class="fa fa-solid fa-calendar-day"></i><span class="booking-date"> '+e.date+'</span></p>';
              html += '<p class="card-text">price: $'+'<span class="booking-price">'+e.day_rate+'</span></p>';
              html += '<p class="card-text">minimum length of stay: '+e.minimum_length_of_stay+'</p>';
              html += '<p class="card-text">maximum available nights: '+e.maximum_available_nights+'</p>';
              html += '<a style="'+availability+'" href="#" class="card-link btn btn-primary book-now mt-4">Book</a>';
              html += '</div>';
              html += '</div>';
          
              if (i != 0 && i % 3 == 2) {
                html += '</div>'; 
              }

            });
          
            if (!rowClosed) {
              html += '</div>'; // this closes the row
            }
          
            $('.bookings').html(html);
          }
          else {
            Swal.fire({
              icon: 'error',
              title: 'No bookings found',
            })
          }



        },
      });

    }

    function createBooking(propertyID, checkin, checkout) {
      var url = '';

      if (checkin != '' && checkout != '')
        url = bookingUrl+'/'+propertyID+'?check_in='+checkin+'&check_out='+checkout;
      else  
        url = bookingUrl+'/'+propertyID;

      window.location.replace(url);
    }
    
}(jQuery));

<form action="#" method="get" name="searchForm" class="booking-form" id="bookingForm">
    <div class="form-row">

        <div class="form-group">
            <label for="property">Property</label>
            <select id="property" name="property">
                <option value="">Select Property</option>
                <?php foreach ($attributes as $value): ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['property_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group input-date">
            <label for="check-in">Check In</label>
            <input type="date" id="check-in" name="checkIn">
        </div>
        <div class="form-group input-date">
            <label for="check-out">Check Out</label>
            <input type="date" id="check-out" name="checkOut">
        </div>
        <div class="form-group">
            <button type="submit" class="search-button" id="check-availability">Check Availability</button>
        </div>
    </div>
</form>
<template id="booking-list">
  <swal-title>
   Bookings
  </swal-title>
  <swal-html>
      <div class="container booking-list">
          <div class="row">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa fa-solid fa-calendar-day"></i> 2022-07-02</p>
                    <p class="card-text"><i class="fa fa-solid fa-money-bill-1-wave"></i> 99.0</p>
                    <a href="#" class="card-link btn btn-primary">Book</a>
                </div>
            </div>
          </div>
      </div>    
  </swal-html>

  <swal-param name="allowEscapeKey" value="false" />
  <swal-param name="customClass" value='{ "popup": "my-popup" }' />
</template>
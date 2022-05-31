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
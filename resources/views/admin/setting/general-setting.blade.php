<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" class="form-control" name="site_name" value="">
                </div>
                <div class="form-group">
                    <label>Layout</label>
                    <select name="layout" id="" class="form-control">
                        <option value="LTR">LTR</option>
                        <option value="RTL">RTL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Email</label>
                    <input type="text" class="form-control" name="contact_email" value="">
                </div>
                <div class="form-group">
                    <label>Contact Phone</label>
                    <input type="text" class="form-control" name="contact_phone" value="">
                </div>
                <div class="form-group">
                    <label>Contact Address</label>
                    <input type="text" class="form-control" name="contact_address" value="">
                </div>
                <div class="form-group">
                    <label>Google Map Url</label>
                    <input type="text" class="form-control" name="map" value="">
                </div>

                <hr>
                <div class="form-group">
                    <label>Default Currecy Name</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Currency Icon</label>
                    <input type="text" class="form-control" name="currency_icon" value="">
                </div>
                <div class="form-group">
                    <label>Timezone</label>
                    <select name="time_zone" id="" class="form-control select2">
                        <option value="">Select</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                
            </form>
        </div>
    </div>
</div>

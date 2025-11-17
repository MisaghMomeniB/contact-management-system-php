<div class="card shadow p-4">
    <input type="text" name="company" class="form-control">
</div>


<div class="mb-3">
    <label class="form-label">Notes</label>
    <textarea name="notes" class="form-control" rows="3"></textarea>
</div>


<hr>


<!-- Phones section -->
<h5>Phone Numbers</h5>
<div id="phone-container">
    <div class="row mb-2 phone-row">
        <div class="col-md-4">
            <select name="phone_type[]" class="form-select">
                <option value="mobile">Mobile</option>
                <option value="home">Home</option>
                <option value="work">Work</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="text" name="phone_number[]" class="form-control" placeholder="Phone Number">
        </div>
        <div class="col-md-2 d-flex">
            <button type="button" class="btn btn-danger w-100 remove-phone"><i class="bi bi-x"></i></button>
        </div>
    </div>
</div>
<button type="button" id="add-phone" class="btn btn-outline-primary mb-3"><i class="bi bi-plus"></i> Add Phone</button>


<hr>


<!-- Emails section -->
<h5>Emails</h5>
<div id="email-container">
    <div class="row mb-2 email-row">
        <div class="col-md-10">
            <input type="email" name="email[]" class="form-control" placeholder="Email">
        </div>
        <div class="col-md-2 d-flex">
            <button type="button" class="btn btn-danger w-100 remove-email"><i class="bi bi-x"></i></button>
        </div>
    </div>
</div>
<button type="button" id="add-email" class="btn btn-outline-primary mb-3"><i class="bi bi-plus"></i> Add Email</button>


<button class="btn btn-success w-100">Save Contact</button>
</form>
</div>
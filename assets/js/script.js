const addPhoneBtn = document.getElementById("add-phone");
const phoneContainer = document.getElementById("phone-container");

addPhoneBtn.addEventListener("click", () => {
  const row = document.createElement("div");
  row.classList.add("row", "mb-2", "phone-row");
  row.innerHTML = `
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
</div>`;
  phoneContainer.appendChild(row);
});

phoneContainer.addEventListener("click", function (e) {
  if (e.target.closest(".remove-phone")) {
    e.target.closest(".phone-row").remove();
  }
});

const addEmailBtn = document.getElementById("add-email");
const emailContainer = document.getElementById("email-container");

addEmailBtn.addEventListener("click", () => {
  const row = document.createElement("div");
  row.classList.add("row", "mb-2", "email-row");
  row.innerHTML = `
<div class="col-md-10">
<input type="email" name="email[]" class="form-control" placeholder="Email">
</div>
<div class="col-md-2 d-flex">
<button type="button" class="btn btn-danger w-100 remove-email"><i class="bi bi-x"></i></button>
</div>`;
  emailContainer.appendChild(row);
});

emailContainer.addEventListener("click", function (e) {
  if (e.target.closest(".remove-email")) {
    e.target.closest(".email-row").remove();
  }
});

<section class="h-100-vh mb-8">
  <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
    style="background-image: url('public/assets/img/curved-images/curved14.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <p class="text-lead text-white">Use these awesome forms to login or create new account.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pt-4">
            <h5>Register New Account</h5>
          </div>
          <div class="card-body">
            <form role="form text-left" action="/soft/signup" method="POST">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Name" name="customer_name" id="customer_name"
                  value="<?= set_value('customer_name') ?>">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Password" name="customer_password" id="customer_password"
                  value="<?= set_value('customer_password') ?>">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your City" name="customer_city" id="customer_city"
                  value="<?= set_value('customer_city') ?>">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Phone" name="customer_phone" id="customer_phone"
                  value="">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Email" name="customer_email"
                  id="customer_email" value="">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your Address" name="customer_address"
                  id="customer_address" value="">
              </div>
              <div class="mb-3">
                <select id="country" name="customer_country" class="form-select">
                    <option value="null">Select a Country</option>         
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Netherland">Netherland</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="USA">USA</option>
                </select>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Enter Your ZipCode" name="customer_zipcode"
                  id="customer_zipcode" value="">
              </div>
              <?php if (isset($validation)): ?>
              <div class="col-12">
                <div class="alert alert-danger" role="alert">
                  <?= $validation->listErrors() ?>
                </div>
              </div>
              <?php endif; ?>
              <div class="form-check form-check-info text-left">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create Account</button>
              </div>
              <p class="text-sm mt-3 mb-0">Already have an account? <a href="/soft/login"
                  class="text-dark font-weight-bolder">Login</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<section>
  <div class="page-header my-4 ">
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-5 col-md-6 d-flex flex-column mx-auto">
          <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
              <h3 class="font-weight-bolder text-center text-info text-gradient">Contact Us</h3>
            </div>
            <?php if (session()->get('success')): ?>
            <div class="alert alert-success" role="alert">
              <?= session()->get('success') ?>
            </div>
            <?php endif; ?>
            <div class="card-body">
              <form role="form text-left" action="/soft/contactus" method="POST">
                <label>Name</label>
                <div class="mb-3">
                  <input type="text" class="form-control" name="name" id="name" >
                </div>
                <label>Email</label>
                <div class="mb-3">
                  <input type="text" class="form-control" name="email" id="email" >
                </div>
                <label>Phone Number</label>
                <div class="mb-3">
                  <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <label>Message</label>
                <div class="mb-3">
                    <textarea name="message" id="message" class="form-control"></textarea>
                </div>
                <?php if (isset($validation)): ?>
                <div class="mb-3">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
                <?php endif; ?>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
              style="background-image:url(' public/assets/img/curved-images/curved-8.jpg')"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
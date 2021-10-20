<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-xl-7 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">Existing Customers</h3>
                        <p class="mb-0">Enter your email and password to sign in</p>
                    </div>
                    <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form role="form text-left" action="/soft/customer/login" method="post">
                            <label>Email</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="customer_email" id="customer_email"
                                    value="<?= set_value('customer_email') ?>">
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="customer_password" id="customer_password" value="">
                            </div>
                            <?php if (isset($validation)): ?>
                            <div class="mb-3">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Don't have an account?
                            <a href="/soft/signup" class="text-info text-gradient font-weight-bold">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
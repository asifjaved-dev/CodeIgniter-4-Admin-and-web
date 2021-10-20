<?php
$session = \Config\Services::session();
?>

<div class="container py-4">
  <h4 class="">Latest Blogs</h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
        <article class="my-4">
            <h3><?=$post['title'] ?></h3>
            <h5><?= date('M d Y',strtotime($post['created_on'])) ?></h5>
            <p><?=$post['body'] ?></p>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item me-auto">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item">
                  <a class="page-link " href="">Next</a>
                </li>
              </ul>
            </nav>
            </article>
        </div>
        <div class="col-md-6">
            <div class="wrapper-image">
                <img src="<?="../public/uploads/blog/".$post['image']; ?>"  class="img-fluid img-thumbnail card-img-top" alt="Post Image">
            </div>
        </div>
    </div>
</div>
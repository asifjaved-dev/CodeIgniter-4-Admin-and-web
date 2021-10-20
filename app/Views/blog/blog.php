
<!-- Blogs -->
<section id="blogs">
  <div class="container py-4">
    <h4 class="font-rubik font-size-20">Latest Blogs</h4>
    <hr>
    <div class="owl-carousel owl-theme">
      <?php if ($blog) :?>
      <?php foreach ($blog as $post) :?>
      <?php $status=$post->status; ?>
      <?php if ($status>0) :?>
      <div class="item">
        <div class="card border-0 font-rale mr-5" style="width: 18rem;">
          <h5 class="card-title font-size-16"><a class="" href="blog/<?=$post->slug; ?>">
              <?php echo $post->title; ?>
            </a></h5>
          <img src="<?=" public/uploads/blog/".$post->image; ?>" alt="cart image" class="card-img-top">
          <p class="card-text font-size-14 text-black-50 py-1">
            <?php echo $post->slug; ?>
          </p>
          <a href="blog/<?=$post->slug; ?>" class="color-second text-left">Read More</a>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
      <?php else: ?>
      <p class="text-center">No Posts have been found!</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- !Blogs -->
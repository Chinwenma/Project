<div class="py-5 bg-dark text-white ">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4>MatrixShop</h4>
        <div class="underline mb-3"></div>

        <a href="#"><i class="fa fa-angle-right"></i>Home</a> <br>

        <a href="#"><i class="fa fa-angle-right"></i>About</a> <br>

        <a href="cart.php"><i class="fa fa-angle-right"></i>Cart</a> <br>

        <a href="categories.php"><i class="fa fa-angle-right"></i>Collections</a>


      </div>
      <div class="col-md-3">
        <h4>Address</h4>
        <p>shop 123, Verbum Plaza, welsey street,garriki, enugu </p>
        <a href="tel:+2340932467124"><i class="fa fa-phone"></i>+234 0932467124</a> <br>
        <a href="mailto:example@gmail.com "><i class="fa fa-envelope"></i> example@gmail.com</a>
      </div>
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126868.29328919585!2d7.430232724401146!3d6.441002533580085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3cf887d1a25%3A0x9e342e82908e0c3d!2sEnugu!5e0!3m2!1sen!2sng!4v1701757226776!5m2!1sen!2sng" class="w-100" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
<div class="py-2 bg-danger sticky-bottom">
  <div class="text-center">
    <p class="mb-0 text-white">All Rights Reserved. Copyright@ Tech_Matrix - <?= date('Y') ?></p>
  </div>
</div>









<script src="assets/js/jquery-3.6.4.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
  alertify.set('notifier', 'position', 'top-right');

  <?php
  if (isset($_SESSION['message'])) {
  ?>
    alertify.success('<?= $_SESSION['message']; ?>');
  <?php
    unset($_SESSION['message']);
  } ?>
</script>
<script>
      // Smooth scroll function
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
               behavior: 'smooth'
            });
         });
      });
   </script>


</body>

</html>
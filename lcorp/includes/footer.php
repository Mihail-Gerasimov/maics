      <!-- Close #app -->
      </div>
    <!-- Close .content-wrapper-->
    </div>

  <!-- Footer -->
  <footer>
  <div class="container center" style="padding: 40px 0;">
    <a class="ui-text-small" href="http://ldigital.ru">L.Corp</a>
    <span class="ui-text-small"> - <?=date("Y") ?> &copy; </span>
<!--    <a class="ui-text-small" href="https://github.com/t1mon">Dmitry G.</a>-->
  </div>
  </footer>

<!-- Close .wrapper -->
</div>

<!-- webpack js run with use_dev var-->
<?php if (WCMS_DEV) echo '<script src="' . WCMS_DEV_PORT . '/lcorp/assets/js/main.js"></script>';
      else echo '<script src="assets/js/main.js?ver=todofixit13241"></script>';?>

</body>
</html>

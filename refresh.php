<?php
echo "Refreshing the page...";
echo '<script>
  setTimeout(function() {
    window.location.href = "homepage.php";
  }, 1000);
</script>';
exit;
?>
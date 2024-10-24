
<?php
    if(isset($_SESSION['result'])) :
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?=$_SESSION['result'] ;?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php
    unset($_SESSION['result']);
    endif;
?>
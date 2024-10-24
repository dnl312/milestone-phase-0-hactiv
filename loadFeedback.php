<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Blue Archive</title>
  </head>
  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-light"
        style="margin-left: 20px"
      >
        <a class="navbar-brand" href="index.html">
          <img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Blue_Archive_JP_logo.svg/512px-Blue_Archive_JP_logo.svg.png"
            alt="Logo"
            width="100"
            height="40"
            class="d-inline-block align-text-top"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="school.html">Schools</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.html">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="form.html">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Reach Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <div class="row">
        <div class="col-sm-6" style="margin-left: auto; margin-right: auto;">
        <?php include("result.php");?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Event #</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created date</th>
                    </tr>
                </thead>
                <tbody id="dynamic_data">
                </tbody>
            </table>
           
            <button type="button" class="btn btn-success" onclick="display_data()">Load more</button>
            <input type="hidden" id="rowcount" name="rowcount" value="0">
        </div><!-- end col -->
        </form>
    </div><!--  end row -->
</div>
    </main>

    <footer
      class="d-flex flex-wrap justify-content-between align-items-center py-2 my-3 border-top"
      style="margin-right: 40px"
    >
      <div class="col-md-4 d-flex align-items-center">
        <a
          href="/"
          class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1"
        >
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted">2024 - Daniel Putra Jaya</span>
      </div>
      <div class="col-md-4 d-flex align-items-center">
        <a
          href="/"
          class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1"
        >
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted"
          >* educational purpose only, all rights belong to original
          artist</span
        >
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3">
          <audio
            id="audioPlayer"
            autoplay="autoplay"
            loop="loop"
            controls
            style="margin-left: auto; margin-right: auto"
          >
            <source
              src="audio/Blue Archive_Target for love_Piano Ver. (Covered by FONZI M).mp3"
              type="audio/mp3"
            />
            Your browser does not support the audio element.
          </audio>
        </li>
      </ul>
    </footer>

    <script type="text/javascript">
        display_data();
        function display_data() {
            var rowcount =  $("#rowcount").val();
            $.ajax({
                url: "display_data.php",
                type: "POST",
                data: {
                    rowcount: rowcount
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $("#rowcount").val(response.rowcount);
                        $('#dynamic_data').append(response.data);
                    } else {
                        alert(response.msg);
                    }
                },
                error: function(xhr, status) {
                    console.log('ajax error = ' + xhr.statusText);
                    alert(response.msg);
                }
            });
        }
    </script>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

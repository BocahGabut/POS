<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static " data-open="hover" data-menu="horizontal-menu" data-col="4-columns">

  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-align-justify"></i></a></li>
            </ul>
          </div>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">Admin</span><span class="user-status">Available</span>
                </div>
                <span>
                  <div class="avatar mr-2">
                    <div class="avatar-content">
                      <i class="avatar-icon fa fa-user"></i>
                    </div>
                  </div></i>
                </span>
              </a>
              <div class="dropdown-menu"><a class="dropdown-item"><i class=" fa fa-user"></i>Selamat Datang</a>
                <div class="dropdown-divider"></div><a onclick="logout_message()" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <script>
    function logout_message() {
      event.preventDefault();
      Swal.fire({
        title: "Anda Yakin ?",
        text: "Akan Logout ???",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Logout!",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: !1
      }).then(function(t) {
        t.value ? Swal.fire({
            type: "success",
            text: "Logout Baerhasil :)",
            confirmButtonClass: "btn btn-success"
          }).then(function(succ) {
            window.location.href = "<?php echo base_url(); ?>kasir/transmasuk/logout";
          }) :
          t.dismiss === Swal.DismissReason.cancel && Swal.fire({
            title: "Cancelled",
            text: "Logout Gagal :)",
            type: "error",
            confirmButtonClass: "btn btn-success"
          })
      })
    };
  </script>
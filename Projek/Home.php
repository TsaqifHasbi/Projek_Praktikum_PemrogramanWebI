<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Boxicons Cdn Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="DesignSideNav1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Web</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo_content">
        <a href="Home.html">
          <div class="logo">
            <i class="bx bx-globe"></i>
            <div class="logo_name">TSF.</div>
          </div>
        </a>
        <i class="bx bx-menu" id="button"></i>
      </div>
      <ul class="nav_list">
        <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search...." />
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="Home.html">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="Profile.html">
            <i class="bx bx-user"></i>
            <span class="links_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="Messages.html">
            <i class="bx bxs-chat"></i>
            <span class="links_name">Messages</span>
          </a>
          <span class="tooltip">Messages</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-pie-chart-alt-2"></i>
            <span class="links_name">Analytics</span>
          </a>
          <span class="tooltip">Analytics</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-folder"></i>
            <span class="links_name">File Manager</span>
          </a>
          <span class="tooltip">File</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cart-alt"></i>
            <span class="links_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-bookmark"></i>
            <span class="links_name">Save</span>
          </a>
          <span class="tooltip">Save</span>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-cog"></i>
            <span class="links_name">Setting</span>
          </a>
          <span class="tooltip">Setting</span>
        </li>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <a href="Profile.html">
              <img src="PP.jpeg" alt="" />
              <div class="name_job">
                <div class="name">Tsaqif Hasbi</div>
                <div class="job">Web Designer</div>
              </div>
            </a>
          </div>
          <i class="bx bx-log-out" id="log_out"></i>
        </div>
      </div>
    </div>
    <div class="home_content">
      <div class="text">Home Content</div>
    </div>

    <script>
      let button = document.querySelector('#button');
      let sidebar = document.querySelector('.sidebar');
      let searchbutton = document.querySelector('.bx-search');

      button.onclick = function () {
        sidebar.classList.toggle('active');
      };
      searchbutton.onclick = function () {
        sidebar.classList.toggle('active');
      };
    </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Boxicons Cdn Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="DesignSideNav1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile</title>
    <style>
      .data img {
        width: 200px;
        max-width: 100%;
        height: 200px;
        border-radius: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      h2 {
        margin-top: 15px;
      }
      p {
        margin-top: 15px;
        text-align: center;
        font-size: 16px;
      }
      .data {
        padding-top: 140px;
      }
      .sm {
        display: flex;
        justify-content: center;
        margin: 20px 0px;
      }
      .sm a {
        color: black;
        width: 56px;
        font-size: 40px;
        margin: 0 15px;
      }
      .sm .ig a {
        color: black;
        transition: 0.3s linear;
      }
      .sm .ig a:hover {
        background: linear-gradient(to top right, yellow, orange, red, purple, blue);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-size: 50px;
      }
      .sm .tw a {
        color: black;
        transition: 0.3s linear;
      }
      .sm .tw a:hover {
        color: rgb(62, 154, 190);
        -webkit-background-clip: text;
        background-clip: text;
        font-size: 50px;
      }
      .sm .sptfy a {
        color: black;
        transition: 0.3s linear;
      }
      .sm .sptfy a:hover {
        color: green;
        -webkit-background-clip: text;
        background-clip: text;
        font-size: 50px;
      }
    </style>
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
          <a href="#">
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
              <img src="Gambar/PP.jpeg" alt="" />
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
      <div class="data">
        <img src="Gambar/PP.jpeg" alt="Foto_Profile" title="Foto Profile Saya" />
        <h2 style="text-align: center">Tsaqif Hasbi Aghna Syarief 20209241</h2>
        <p>XIT11</p>
        <p>
          Nama saya Tsaqif Hasbi Aghna Syarief, saya adalah seorang pelajar<br />
          saya bersekolah di SMKS Telkom Sandhy Putra Jakarta, saya kelas 11<br />
          dikelas ini saya belajar banyak tentang bahasa pemrograman dan mendesain web<br />
          saya berumur 16 tahun dan saya tinggal di kecamatan kalideres, Jakarta Barat
        </p>
        <p>Follow My Social Media & My Spotify</p>
        <div class="sm">
          <div class="ig">
            <a href="https://www.instagram.com/tsaqif_hasbi/"><i class="bx bxl-instagram"></i></a>
          </div>
          <div class="tw">
            <a href="https://twitter.com/TsaqifHasbi17?t=jot9H78I46MgPBj14Xk12w&s=08"><i class="bx bxl-twitter"></i></a>
          </div>
          <div class="sptfy">
            <a href="https://open.spotify.com/user/21c2iygultzcmsl6lisvlu7tq?si=fyURqvnZTxWf1PttYhtcgQ&utm_source=copy-link"><i class="bx bxl-spotify"></i></a>
          </div>
        </div>
      </div>
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

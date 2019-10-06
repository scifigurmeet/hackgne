<?php
$part = request()->segment(count(request()->segments()));
$userValue = request()->session()->get('gndecDOC');
$dbValue = getUserToken();
if($userValue != $dbValue){header('Location: '.getHomeURL().'/login?loginFirst=True'); exit;}
?>
<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="theme-color" content="#dd2466">
	<script>
		window.addEventListener('load', () => {
		  registerSW();
		});
		async function registerSW() {
		  if ('serviceWorker' in navigator) {
			try {
			  await navigator.serviceWorker.register('./sw.js');
			} catch (e) {
			  console.log(`SW registration failed`);
			}
		  }
		}
	</script>
  <link rel='manifest' href='manifest.webmanifest'>
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Document Management System GNDEC
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.0/b-colvis-1.6.0/b-flash-1.6.0/b-html5-1.6.0/b-print-1.6.0/r-2.2.3/datatables.min.css"/>
  <script src="assets/js/core/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
		{{ getUserFullName() }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($part == '') echo 'active'; ?>">
            <a class="nav-link" href="{{getHomeURL()}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
		  <li class="nav-item <?php if($part == 'sharedDocuments') echo 'active'?>">
            <a class="nav-link" href="sharedDocuments">
              <i class="material-icons">whatshot</i>
              <p>Documents Wall</p>
            </a>
          </li>
          <li class="nav-item <?php if($part == 'AllFiles') echo 'active'?>">
            <a class="nav-link" href="AllFiles">
              <i class="material-icons">library_books</i>
              <p>Uploaded Documents</p>
            </a>
          </li>
		  <li class="nav-item <?php if($part == 'sentDocuments') echo 'active'?>">
            <a class="nav-link" href="sentDocuments">
              <i class="material-icons">send</i>
              <p>Sent Documents</p>
            </a>
          </li>
          <li class="nav-item <?php if($part == 'groups') echo 'active'?>">
            <a class="nav-link" href="groups">
              <i class="material-icons">group</i>
              <p>Groups</p>
            </a>
          </li>
		  <li class="nav-item  <?php if($part == 'forms') echo 'active'?>">
            <a class="nav-link" href="forms">
              <i class="material-icons">list_alt</i>
              <p>Forms</p>
            </a>
          </li>
		  <li class="nav-item  <?php if($part == 'text2Image') echo 'active'?>">
            <a class="nav-link" href="text2Image">
              <i class="material-icons">image</i>
              <p>Text To Image</p>
            </a>
          </li>
		  <li class="nav-item  <?php if($part == 'reverseImageSearch') echo 'active'?>">
            <a class="nav-link" href="reverseImageSearch">
              <i class="material-icons">important_devices</i>
              <p>Reverse Image Search</p>
            </a>
          </li>
		  <li class="nav-item  <?php if($part == 'ocr') echo 'active'?>">
            <a class="nav-link" href="ocr">
              <i class="material-icons">offline_bolt</i>
              <p>Text Recognition (OCR)</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">GNDEC Document Management System</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
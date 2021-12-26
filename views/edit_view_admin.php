<?php
  include '../models/User.php';
  include '../controllers/connection_controller.php';


  session_start();

  if(isset($_SESSION['current_user'])){
    if (isset($_GET['edit'])) {
      $id = $_GET['edit'];
      $record = $mysqli->query("SELECT * FROM Users WHERE ID=$id");

      if (count($record) == 1 ) {
        $result = mysqli_fetch_array($record);
        $username = $result['Username'];
        $password = $result['Password'];
        $email = $result['Email'];


      }
    }
  
  }else {
    header('location: views/login_view.php');

  }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">  

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title> Registerss Page</title>
  </head>
  <body>
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-blueGray-800">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
      <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="../../index.html">Home</a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
        <i class="text-white fas fa-bars"></i>
      </button>
    </div>
    <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden bg-blueGray-800" id="example-collapse-navbar">
      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
			<form method="GET" action="../controllers/authentification_controller.php" >
        <li class="inline-block relative">
					<input name="logout" value="Logout" type="submit" class=" text-blueGray-700 rounded-lg hover:bg-sky-600 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"></button>
        </li>
		</form>
        <li class="flex items-center">
          <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F" target="_blank"><i class="lg:text-blueGray-200 text-blueGray-400 fab fa-facebook text-lg leading-lg"></i><span class="lg:hidden inline-block ml-2">Share</span></a>
        </li>
        <li class="flex items-center">
          <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F&amp;text=Start%20your%20development%20with%20a%20Free%20Tailwind%20CSS%20and%20JavaScript%20UI%20Kit%20and%20Admin.%20Let%20Notus%20JS%20amaze%20you%20with%20its%20cool%20features%20and%20build%20tools%20and%20get%20your%20project%20to%20a%20whole%20new%20level." target="_blank"><i class="lg:text-blueGray-200 text-blueGray-400 fab fa-twitter text-lg leading-lg"></i><span class="lg:hidden inline-block ml-2">Tweet</span></a>
        </li>
        <li class="flex items-center">
          <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="https://github.com/creativetimofficial/notus-js?ref=njs-register" target="_blank"><i class="lg:text-blueGray-200 text-blueGray-400 fab fa-github text-lg leading-lg"></i><span class="lg:hidden inline-block ml-2">Star</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div name="main" style="padding-top: 100px;">
<section class=" py-1 bg-blueGray-50">
<div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-center flex justify-between">
        <h6 class="text-blueGray-700 text-xl font-bold">
          My account
        </h6>
        <form method="POST" action="../controllers/account_controller.php" >
        <li class="inline-block relative">
					<input name="save_user" value="Submit Changes" type="submit" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"></button>
        </li>
      </div>
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <?php 
          if(isset($_SESSION["status"])){
            $error = $_SESSION['status'];
            echo "<span>$error</span>";
          }
          ?>
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
          User Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                </label>
                <input name="username" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?php echo $username;?>">
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Email address
                </label>
                <input name='email' type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?php echo $email;?>">
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Password
                </label>
                <input name='password' type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?php echo $password;?>">
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <input type='hidden' name='id'  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?php echo $id;?>">
              </div>
            </div>
          </div>
          
          <hr class="mt-6 border-b-1 border-blueGray-300">
          
        </form>
      </div>
    </div>
</div>
</section>
</div>
  </body>
</html>

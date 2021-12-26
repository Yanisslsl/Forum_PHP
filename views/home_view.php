<?php
  include '../controllers/connection_controller.php';
  include '../models/User.php';
  session_start();
	if(isset($_SESSION['current_user'])){
		$is_admin = $_SESSION['current_user']->get_is_admin();
		$user_id = $_SESSION['current_user']->get_id();
    $results = $mysqli->query("SELECT * FROM Articles ORDER BY ID DESC");
  
  }else {
    header('location: ../views/login_view.php');

  }

  



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <title> Home Page</title>
  </head>
  <body>


<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-blueGray-800">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
      <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="../views/home_view.php">Home</a><button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
        <i class="text-white fas fa-bars"></i>
      </button>
    </div>
    <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden bg-blueGray-800" id="example-collapse-navbar">
      <ul class="flex flex-col lg:flex-row list-none mr-auto">
			<?php if($is_admin){?>
				<li class="flex items-center">
				 <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="admin_dashboard.php"><i class="lg:text-blueGray-200 text-blueGray-400 far fa-file-alt text-lg leading-lg mr-2"></i>
					 Admin Dashboard</a>
			 </li>
					

				<?php	}?>
					

			

      </ul>
      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
			<form method="GET" action="../controllers/authentification_controller.php" >
        <li class="inline-block relative">
					<input name="logout" value="Logout" type="submit" class=" text-blueGray-700 rounded-lg hover:bg-sky-600 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"></button>
        </li>
				<li class="inline-block relative">
          <a class="text-blueGray-700 rounded-lg hover:bg-sky-600 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold" href="account_view.php">My account</a>
        </li>
		</form>
    <form class='flex' action="../views/home_view.php" method="GET">
        <div class="pt-2 relative mx-auto text-gray-600 ">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
          type="search" name="search" placeholder="Search">
        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
          <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
        

      </div>
      
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
<?php
if (isset($_GET['search'])) {
    $safe_value = mysqli_real_escape_string($mysqli, $_GET['search']);
    $query ="SELECT * FROM Articles WHERE `Title` LIKE '%$safe_value%'";
  	$results = $mysqli->query("SELECT * FROM Articles WHERE `Title` LIKE '%$safe_value%'");
    // while ($row = mysqli_fetch_array($results)) { 
    while ($row = mysqli_fetch_array($results)) { 
       ?>
      <div name="main" style="padding-top: 100px;">
<div class="h-1/3  flex items-center justify-center">
  <div class="px-10">
    <div class="bg-white  max-w-2xl  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
		<?php if($row['User_ID'] ==  $user_id){?>
			 <a href="edit_view.php?edit=<?php echo $row['ID']; ?>"  >Edit</a>
			 <a href="../controllers/articles_controller.php?del=<?php echo $row['ID']; ?>" >Delete</a>
		<?php	}?>


      <div class="mt-4">
        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer"><?php echo $row['Title']; ?></h1>
        <div class="flex mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </div>
        <p class="mt-4 text-md text-gray-600"><?php echo $row['Description']; ?></p>
        <div class="flex justify-between items-center">
          <div class="mt-4 flex items-center space-x-4 py-6">
            <div class="">
              <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80" alt="" />
            </div>
            <div class="text-sm font-semibold">
							<?php  
								$user_id = $row["User_ID"];
							 $result = $mysqli->query("SELECT * FROM Users WHERE ID=$user_id");
							 $user = mysqli_fetch_assoc($result);
							 echo $user['Username']
							?> 
							<span class="font-normal"> 5 minutes ago</span></div>
          </div>
					<div>
						<h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer"> <a href="create_view.php">Create new Post</a></h1>
						<div class="p-6 bg-yellow-400 rounded-full h-4 w-4 flex items-center justify-center text-2xl text-white mt-4 shadow-lg cursor-pointer"><a href="create_view.php">+</a></div>

					</div>

        </div>
      </div>
    </div>
  </div>
</div>
   
        <?php 
  
}
}
  ?>
<?php while ($row = mysqli_fetch_array($results)) { ?>
<div name="main" style="padding-top: 100px;">
<div class="h-1/3  flex items-center justify-center">
  <div class="px-10">
    <div class="bg-white max-w-2xl rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
		<?php 
      $article_id = $row["ID"];
      $q ="SELECT * FROM Articles_Users WHERE Article_ID='$article_id' AND User_ID='$user_id'";
  	  $res = $mysqli->query($q);
      if (mysqli_num_rows($res) == 1) {?>
        <a href="../controllers/articles_controller.php?add_to_fav=<?php echo $row['ID']; ?>" >
        <button class="p-2 pl-5 pr-5 bg-yellow-500 text-gray-100 text-lg rounded-lg focus:border-4 border-yellow-300">Retirer des favoris</button>
      </a>
      <?php	} else { ?>
        <a href="../controllers/articles_controller.php?add_to_fav=<?php echo $row['ID']; ?>">
          <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-yellow-500 text-yellow-500 text-lg rounded-lg hover:bg-yellow-500 hover:text-gray-100 focus:border-4 focus:border-yellow-300">Ajouter aux favoris</button>
        </a>
      <?php	}?>

		<?php if($row['User_ID'] ==  $user_id){?>
      <div class="alpha">
        <a href="edit_view.php?edit=<?php echo $row['ID']; ?>"  >Edit</a>
        <a href="../controllers/articles_controller.php?del=<?php echo $row['ID']; ?>" >Delete</a>
      </div>
		<?php	}?>


      <div class="mt-4">
        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer"><?php echo $row['Title']; ?></h1>
        <div class="flex mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </div>
        <p class="mt-4 text-md text-gray-600"><?php echo $row['Description']; ?></p>
        <div class="flex justify-between items-center">
          <div class="mt-4 flex items-center space-x-4 py-6">
            <div class="">
              <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80" alt="" />
            </div>
            <div class="text-sm font-semibold">
							<?php  
								$user_id = $row["User_ID"];
							 $result = $mysqli->query("SELECT * FROM Users WHERE ID=$user_id");
							 $user = mysqli_fetch_assoc($result);
							 echo $user['Username']
							?> 
							<span class="font-normal"> 5 minutes ago</span></div>
          </div>
					<div>
          <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer"> <a href="create_view.php">Create new Post</a></h1>
						<div class="p-6 bg-yellow-400 rounded-full h-4 w-4 flex items-center justify-center text-2xl text-white mt-4 shadow-lg cursor-pointer"><a href="create_view.php">+</a></div>

					</div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</div>
  </body>
</html>


  <?php

  // require_once 'firestore.php';

  // $fs = new Firestore('places');
  // print_r($fs->getDocument('qXuWZ4zcAO8WkdPahsUV'));

// ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>People monitoring</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="sb-admin-2.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


   <script scr="bootstrap.min.js">



   </script>


</head>

<body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

       <?php
       $auth = true;
       // jukuk ko sesion
       if ($auth) {
       ?>
       <!-- Sidebar -->

        @include('firebase.inc.sidebar')

       <?php
       }
       ?>
       <!-- End of Sidebar -->

       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">

               <?php
               // jukuk ko sesion
               if ($auth) {
               ?>
               <!-- Topbar -->
                @include('firebase.inc.navbar')
               <?php
               // jukuk ko sesion
               }else{
               ?>
                    <br>
                    <div style = "  margin: auto;
                                    width: 60%;
                                    padding: 10px;">
                    <a href="login.html" class="btn btn-primary btn-user btn-block"> Login </a>

                    </div>

               <?php } ?>
               <!-- End of Topbar -->

               <!-- Begin Page Content -->
               @yield('content')
           <!-- End of Main Content -->

           <!-- Footer -->
           <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                   <div class="copyright text-center my-auto">
                       <span>Copyright &copy; People Monitoring IoT</span>
                   </div>
               </div>
           </footer>
           <!-- End of Footer -->

       </div>
       <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#logoutModal">
                            <i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                    </li>


               </div>
           </div>
       </div>
   </div>

     <!-- Bootstrap core JavaScript-->
     <script src="jquery.min.js"></script>
     <script src="bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="vendor/chart.js/Chart.min.js"></script>

     <!-- Page level custom scripts -->
     <script src="js/demo/chart-area-demo.js"></script>
     <script src="js/demo/chart-pie-demo.js"></script>


   <script src="code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script>
       let senggang = 10
       let hampirPenuh = 40
       let penuh = 50
       let color, width

       // <<---- jukuk firebise

       // if total <= senggang {
       //     color = "w3-blue"
       //     width = 30
       // }
       // if total <= hampirPenuh {
       //     olor = "w3-blue"
       //     width = 30
       // }

       // if total == penuh {
       //     olor = "w3-blue"
       //     width = 300%
       // }

       // <--
       // document.getElementById("bar").className = color;
       // document.getElementById("bar").style.width = width+"%";
       // document.getElementById("TotalPengunjung").innerHTML =

   </script>



</body>

</html>




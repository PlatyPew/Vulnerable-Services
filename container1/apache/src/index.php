<?php
    ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <?php
            include "head.inc.php";
        ?>
        
        <style>
            .gradient {background: linear-gradient(to right, #080600, #4B2B19, #8D512F, #C73D3D);}
        </style>
    </head>
    <body>
        <?php
            include "navbar.php";
        ?>
        <main>
            <section class="h-100 gradient-form" style="background-color: #eee;">
               <div class="container py-5 h-100">
                 <div class="row d-flex justify-content-center align-items-center h-100">
                   <div class="col-xl-10">
                     <div class="card rounded-3 text-black">
                       <div class="row g-0">
                         <div class="col-lg-6">
                           <div class="card-body p-md-5 mx-md-4">

                             <div class="text-center">
                               <img src="https://img.freepik.com/premium-vector/cartoon-skull-with-red-flower-traditional-tattoo-design-simple-cute-style-isolated-clip-art-ill_537358-18.jpg"
                                 style="width: 185px;" alt="logo">
                               <h4 class="mt-1 mb-5 pb-1">Hello</h4>
                             </div>

                             <form action="process_login.php" method="post">
                                <p>Please login to your account</p>

                                <div class="form-group mb-4">
                                  <label for="email">Email:</label>
                                  <input type="email" id="email" class="form-control" required name="email" placeholder="Email"/>
                                </div>

                                <div class="form-group mb-4">
                                  <label for="password">Password:</label>
                                  <input type="password" id="password" class="form-control" required name="password" placeholder="Password"/>
                                </div>

                                <div class="form-group text-center pt-1 mb-5 pb-1">
                                  <button class="btn btn-primary btn-block fa-lg gradient mb-3" type="submit">Log in</button>
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                  <p class="mb-0 me-2">Don't have an account?</p>
                                  <button type="button" class="btn btn-outline-danger" onclick="location.href='register.php';">Create new</button>
                                </div>

                             </form>

                           </div>
                         </div>
                         <div class="col-lg-6 d-flex align-items-center gradient">
                           <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                             <h4 class="mb-4">Online Store 29</h4>
                             <p class="small mb-0">Welcome blah blah blah Best online store you ever seen Blah blah blah blah blah 
                                 Believe in teamwork and dedication blah blah blah top priority is ethics and professionalism blah 
                                 blah blah blah blah blah blah blah blah good luck</p>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </section>
        </main>
        <?php
            include "footer.php";
        ?>
    </body>
</html>

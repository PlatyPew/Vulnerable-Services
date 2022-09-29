<?php
    ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <?php
            include "head.inc.php";
        ?>
        <style>
            .div-side {
                background-color: black;
            }
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

                             <form action="process_register.php" method="post">
                               <p>Please login to your account</p>

                               <div class="form-group mb-4">
                                 <label for="email">Email:</label>
                                 <input type="email" id="email" maxlength="30" required name="email" class="form-control" placeholder="Email"/>
                               </div>

                               <div class="form-group mb-4">
                                 <label for="password">Password:</label>
                                 <input type="password" id="password" maxlength="30" required name="password" class="form-control" placeholder="Password"/>
                               </div>
                               
                               <div class="form-group mb-4">
                                 <label for="password_confirm">Confirm Password:</label>
                                 <input type="password" id="password_confirm" maxlength="30" required name="password_confirm" class="form-control" placeholder="Confirm Password"/>
                               </div>
                               
                               <p>By creating an account you agree to our <a href="https://youtu.be/dQw4w9WgXcQ">Terms & Privacy</a>.</p>
                              
                               <div class="form-group text-center pt-1 mb-5 pb-1">
                                 <button class="btn btn-primary btn-block fa-lg btn btn-success mb-3" type="submit">Register</button>
                               </div>


                             </form>

                           </div>
                         </div>
                         <div class="div-side col-lg-6 d-flex align-items-center black">
                           <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                             <h4 class="mb-4">WELCOME TO ONLINE STORE 29</h4>
                             <p class="small mb-0">THANK YOU! YOU'LL BE ADDED TO OUR MAILING LIST AND WILL NOW BE AMONG THE FIRST TO HEAR ABOUT NEW ARRIVALS AND SPECIAL OFFERS.
                             AS A SPECIAL GIFT, ENJOY 29% OFF YOUR NEXT ONLINE PURCHASE WITH CODE ILUV-TEAM-29-4EVER-TH3-BEST-TEAM-EVER AT CHECKOUT.</p>
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


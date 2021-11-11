<?php
include_once "layout.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Layout::siteTitle("Contact Us"); ?></title>

    <?php Layout::stylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

    <main>

        <?php Layout::navbar(); ?>

        <!--contact section start-->
        <section class="contact section-padding" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-2 mb-3 text-center">Contact Us</h2>

                        <p class="text-center"><strong>Comparing Climate Change Policy Networks (COMPON):</strong></p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-7 col-12 mx-auto">

                        <form action="#" method="post" class="contact-form" role="form" data-aos="fade-up">

                            <div class="row">
                                
                                <div class="col-lg-6 col-6">
                                    <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                                </div>

                                <div class="col-lg-6 col-6">
                                    <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                </div>

                                <div class="col-12 my-4">
                                    <label for="message" class="form-label">How can we help?</label>

                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tell us how can we help" required></textarea>
                                    
                                </div>

                            </div>

                            <div class="col-lg-5 col-12 mx-auto mt-5">
                                <button type="submit" class="form-control">Send Message</button>
                            </div>
                        </form>
                        
                    </div>

                </div>
            </div>
        </section>

        <section class="google-map">
            <iframe class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.242047916177!2d80.23071131503652!3d26.512338783301637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c3701c4a8be71%3A0x3afbe880abc38436!2sIndian%20Institute%20of%20Technology%20Kanpur!5e0!3m2!1sen!2sin!4v1630597609086!5m2!1sen!2sin" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"></iframe>
        </section>
        <!--contact section end-->

    </main>

    <?php Layout::footer(); ?>
    <?php Layout::scripts(); ?>

</body>

</html>
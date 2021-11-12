<html>
<head>
    <link rel="stylesheet" href="css/aboutcontact.css">
</head>

<body>
<?php require_once("process/header.php"); ?>
<section id="contact" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h3><span>Get in touch</span></h3>
                </div>
                <div class="sub-heading">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4><i class="icon-envelope"></i><strong>Contact form</strong></h4>
                <p>
                    Want to work with us or just want to say hello? Don't hesitate to get in touch!
                </p>
                <div class="cform" id="contact-form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                   data-rule="email" data-msg="Please enter a valid email">
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-theme">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Find our location</h4>
                <p>View from google map</p>
                <div id="section-map" class="clearfix">
                    <iframe id="smallmap"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1562.0932074899956!2d90.42441691536628!3d23.8148109545373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e1!3m2!1sen!2sbd!4v1586688203691!5m2!1sen!2sbd">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("process/footer.php"); ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <title>Contact Us | Coast to Coast Communications Inc.</title>
        <meta name="description" content="We are a privately owned company, founded in 2004, specializing in underground fiber optic installation.">
        <meta name="keywords" content="Fiber, Optic, Installation, Underground">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/superfish.css">

        <!--[if lt IE 8]>
            <div style=' clear: both; text-align:center; position: relative;'>
                <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
                    <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
                </a>
            </div>
        <![endif]-->

        <!--[if lt IE 9]>
            <script src="/assets/js/html5shiv.js"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/ie.css">
        <![endif]-->
    </head>

    <body>

        <!-- Header -->
        <?php require('pages/partials/header.html.php'); ?>

        <!-- Page Content -->
        <section class="content">
            <div class="container">

                <div class="row">
                    <div class="grid_6 clearfix">
                        <div class="map_wrapper">
                            <h2>Contact Us</h2>
                            <p>Please fill out the adjacent form to Send us a Message, or Call Us 24/7.</p>
                            <img id="map_canvas" src="/assets/images/contact-1.jpg" alt="Contact Us">
                        </div>
                    </div>

                    <div class="grid_6">
                        <h2>Send us a Message</h2>
                        <form method="post" id="contact-form">
                            <label class="name">
                                <input type="text" name="name" placeholder="Name*:" data-constraints="@Required @JustLetters">
                                <span class="empty-message">*This field is required.</span>
                                <span class="error-message">*This is not a valid name.</span>
                            </label>
                            <label class="email">
                                <input type="text" name="email" placeholder="Email*:" data-constraints="@Required @Email">
                                <span class="empty-message">*This field is required.</span>
                                <span class="error-message">*This is not a valid email.</span>
                            </label>
                            <label class="phone">
                                <input type="text" name="phone" placeholder="Phone:" data-constraints="@JustNumbers">
                                <span class="empty-message">*This field is required.</span>
                                <span class="error-message">*This is not a valid phone.</span>
                            </label>
                            <label class="message">
                                <textarea placeholder="Message*:" name="message" data-constraints="@Required @Length(min=20,max=999999)"></textarea>
                                <span class="empty-message">*This field is required.</span>
                                <span class="error-message">*The message is too short.</span>
                            </label>
                            <div class="form_buttons">
                                <a href="#" data-type="submit" class="btn">Send</a>
                                <a href="#" data-type="reset" class="btn">Clear</a>
                            </div>
                            <div style="display: none;">
                                <input type="text" name="spam_check" value="">
                                <input type="hidden" name="form_id" value="contact-form">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!-- Footer -->
        <?php require('pages/partials/footer.html.php'); ?>

        <!-- Scripts -->
        <script type="text/javascript" src="/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/assets/js/jquery-migrate-1.2.1.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/assets/js/script.js"></script>
        <script type="text/javascript" src="/assets/js/superfish.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.mobilemenu.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.ui.totop.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.equalheights.js"></script>
        <script type="text/javascript" src="/assets/js/TMForm.js"></script>
    </body>

</html>
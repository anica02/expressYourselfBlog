<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  include('includes/head.php');
  include('config/connection.php');
  include('functions/function.php');
  $_SESSION['page']="index";
  include('includes/header.php');

  ?>

  <body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    
    <div id="preloader">
        <div id="spinner"></div>
    </div>
   
    <?php
        include('includes/slider.php');
        include('includes/steps.php');
    ?>
    
  
    
    <!-- Start Video Section -->
     <section class="video-bg overlay-dark" style="background-image:url(img/video-bg.jpg)">
        <div class="js-height-full container">
            <!-- video setting -->
            <div class="video-player" data-property="{videoURL:'https://youtu.be/dwfjayxRvqw',containment:'.video-bg',autoPlay:true, mute:true, loop:true, showControls:false, startAt:0, opacity:1}"></div>

            <div class="vertical-section">
                <div class="vertical-content">
                    <div class="video-caption text-center white-color">
                        <h2 class="p-top-20">You gotta start somewhere</h2>
                        <div class="divider-center-small divider-white"></div>

                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- End Video Section -->



    <?php include('includes/clients.php') ?>

    <!-- Start Contact -->
    <section id="contact" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer time dance hero of though narrow marked at.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div>  <!-- /.row -->

            <div class="row">

                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-30">
                    <div class="contact-form row">

                        <form name="ajax-form" id="ajax-form" action="contact.php" method="post">
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="name" id="name" type="text"   placeholder="Your Name: *"/>
                                <span class="error" id="err-name">please enter name</span>
                            </div>
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="email" id="email" type="text"  placeholder="E-Mail: *"/>
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>
                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-sm-12 contact-form-item">
                                <button class="send_message btn btn-main btn-theme wow fadeInUp" id="send" data-lang="en">submit</button>
                            </div>
                            <div class="clear"></div>
                            <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
                            <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
                            <div class="error" id="err-state"></div>
                        </form>

                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                <!-- === Contact Information === -->
                <div class="col-md-5 col-sm-5 p-bottom-30">
                    <address class="contact-info">

                        <p class="m-bottom-30 wow slideInRight">Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps.</p>

                        <!-- === Location === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <div class="contact-info-title">
                                Address:
                            </div>
                            <div class="contact-info-text">
                                149 Null Street, New York, NY 098
                            </div>
                        </div>

                        <!-- === Phone === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-title">
                                Phone number:
                            </div>
                            <div class="contact-info-text">
                                +1-000-1111-3333
                            </div>
                        </div>

                        <!-- === Mail === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-title">
                                Email:
                            </div>
                            <div class="contact-info-text">
                                support@tabthemes.com
                            </div>
                        </div>

                    </address>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Contact -->


   
   <?php 
   include('includes/footer.php');
   ?>
   


   

    <script>
      var tpj = jQuery;

      var revapi280;
      tpj(document).ready(function() {
          if (tpj("#rev_slider_nagency").revolution == undefined) {
              revslider_showDoubleJqueryError("#rev_slider_nagency");
          } else {
              revapi280 = tpj("#rev_slider_nagency").show().revolution({
                  sliderType: "standard",
                  sliderLayout: "fullscreen",
                  dottedOverlay: "none",
                  delay: 90000,
                  navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                      touchenabled:"on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                    }
                    ,
                    arrows: {
                          style: "uranus",
                          enable: true,
                          hide_onmobile: true,
                          hide_under: 496,
                          hide_onleave: true,
                          hide_delay: 200,
                          hide_delay_mobile: 1200,
                          tmp: '',
                          left: {
                              h_align: "left",
                              v_align: "center",
                              h_offset: 20,
                              v_offset: 0
                          },
                          right: {
                              h_align: "right",
                              v_align: "center",
                              h_offset: 20,
                              v_offset: 0
                          }
                      }
                  },
                  responsiveLevels: [1200, 991, 767, 480],
                  visibilityLevels: [1200, 991, 767, 480],
                  gridwidth: [1200, 991, 767, 480],
                  gridheight: [868, 768, 960, 720],
                  lazyType: "none",
                  parallax: {
                    type:"mouse+scroll",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,6,7,12,16,10,50],
                    disable_onmobile:"on"
                  },
                  shadow: 0,
                  spinner: "spinner2",
                  autoHeight: "off",
                  fullScreenAutoWidth: "off",
                  fullScreenAlignForce: "off",
                  fullScreenOffsetContainer: "",
                  fullScreenOffset: "0",
                  disableProgressBar: "on",
                  hideThumbsOnMobile: "off",
                  hideSliderAtLimit: 0,
                  hideCaptionAtLimit: 0,
                  hideAllCaptionAtLilmit: 0,
                  debugMode: false,
                  fallbacks: {
                      simplifyAll: "off",
                      disableFocusListener: false,
                  }
              });
          }
      }); 
  </script>

  </body>
</html>
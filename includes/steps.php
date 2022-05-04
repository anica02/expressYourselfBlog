<section id="service" class="p-top-80 p-bottom-80">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s"><strong>How to post your blog</strong></h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Here are some steps that you need to do before creating your first blog</em></p>
                    </div>
                </div> 
            </div>  
            <?php 
            $stepsTxt=[
                0=>[
                    "title"=>"Sign up",
                    "des"=>"The first thing you need to do is to go to section register and create an account",
                    "icon"=>"fas fa-user-plus"
                ],
                1=>[
                    "title"=>"Log in",
                    "des"=>"If you already have an account, log in and  go to the section for creating posts",
                    "icon"=>"fas fa-sign-in-alt"
                ],
                2=>[
                    "title"=>"Write it",
                    "des"=>"When you are logged in go to the section post and write what your heart desire",
                    "icon"=>"fas fa-pen-alt"
                ],
                3=>[
                    "title"=>"Post it",
                    "des"=>"When you are all done writing your post, click on the button upload and check your feed",
                    "icon"=>"fas fa-upload"
                ]
                ];
             
            ?> 
            <div class="row">
                 <?php foreach($stepsTxt as $s){?>
                    <div class="col-md-3 col-sm-6 m-bottom-20">
                    <div class="service wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="service-icon">
                            <i class="<?=$s['icon']?>" aria-hidden="true"></i>
                        </div>
                        <h4><?=$s['title']?></h4>
                        <div class="service-text">
                            <p><?=$s['des']?></p>
                        </div>
                    </div>
                </div> 
                <?php }?> 
            </div>

        </div>
    </section>
<section id="client" class="light-bg p-top-80 p-bottom-80">

        <div class="section-title text-center m-bottom-40">
            <h2>Our Clients</h2>
            <div class="divider-center-small"></div>
        </div>

        <div class="container ">
            <div class="row">
                    <?php 
                        $clientImg=[
                            0=>[
                                "src"=>"img/client/1.png",
                                "alt"=>"Client 1"
                            ],
                            1=>[
                                "src"=>"img/client/2.png",
                                "alt"=>"Client 2"
                            ],
                            2=>[
                                "src"=>"img/client/3.png",
                                "alt"=>"Client 3"
                            ],
                            3=>[
                                "src"=>"img/client/4.png",
                                "alt"=>"Client 4"
                            ],
                            4=>[
                                "src"=>"img/client/5.png",
                                "alt"=>"Client 5"
                            ],
                            5=>[
                                "src"=>"img/client/6.png",
                                "alt"=>"Client 6"
                            ],
                            6=>[
                                "src"=>"img/client/7.png",
                                "alt"=>"Client 7"
                            ],
                        ];
                        
                    ?>
                <div id="owl-clients" class="owl-carousel owl-theme client text-center">
                        <?php foreach($clientImg as $img){?>
                            <div class="client-item text-center">
                            <img class="img-responsive" src="<?=$img["src"]?>" alt="<?=$img["alt"]?>">
                        </div>
                        <?php } ?>
                </div>
            </div> 
        </div> 
    </section>
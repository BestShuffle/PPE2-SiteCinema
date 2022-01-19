<html class="no-js">
    <?php
		include("includes/head.php");
	?>
	<body>
    <?php
		include("includes/header.php");
	?>
        <!-- 
        ================================================== 
            Page globale
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Planning</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Accueil
                                    </a>
                                </li>
                                <li class="active">Planning</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 
        ================================================== 
            Company Description Section Start
        ================================================== -->
        <section class="company-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeInLeft" data-wow-delay=".3s" >
						<?php
							include("includes/tab_planning.php");
						?>
                </div>
            </div>
        </section>
		
        
    <?php
		include("includes/footer.php");
	?>
</html>
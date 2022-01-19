<!--
        ==================================================
						Header
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
						<a href="index.php" >
							<img height="35" src="images/logo.png" alt="">
						</a>
					</div> <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
					<!-- Barre de navigation -->
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="planning.php">Planning</a></li>
                            <li><a href="reserv.php">Réservation</a></li>
							<li><a>
							<form action="rechercher.php" method="POST">
									<label>Rechercher un film</label>
									<input type="text" name="txtRech" />
									<input type="submit" value="Rechercher" />
							</form>
							</a></li>
						
                        </ul>
                    </div>
                </nav> <!-- /main nav -->
            </div>
        </header>
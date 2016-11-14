<div class="row">
	<div class="col-xs-12">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					        data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?php echo bloginfo( 'url' ); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php wp_nav_menu( [
						'theme_location'  => 'primary',
						'container'       => false,
						'container_class' => 'navbar navbar-light bg-faded',
						'menu_class'      => "nav navbar-nav navbar-right"
					] ) ?>
				</div>
			</div>
		</nav>
	</div>
</div>

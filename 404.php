	<?php get_header(); ?>
      <div class="row">

        <div class="col-sm-8 blog-main">

		<h1><?php _e( 'Oops... Soubor nebo stránka neexistují.', 'wpboot' ); ?></h1>
		<p><?php _e( 'Nedávno jsme provedli změny na našich webových stránkách, a stránka, kterou hledáte, mohla být odstraněna nebo přesunuta.', 'wpboot' ); ?> <a href="<?php echo home_url(); ?>"><?php _e( 'Přejděte na domovskou stránku', 'wpboot' ); ?></a>.</p>
		<p><?php _e( 'Omlouváme se za nepříjemnosti.', 'wpboot' ); ?>.</p>
        </div><!-- /.blog-main -->

	<?php get_sidebar(); ?>
</div>
	<?php get_footer(); ?>
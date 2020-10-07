<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<!--	<label class="assistive-text" for="s">-->
<!---->
<!--    </label>-->
	<div class="d-inline-flex" id="search-container">

		<input class="field form-control" id="search-input" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
        <i class="fa fa-search"></i>



        <span class="input-group-append">
<!--			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"-->
<!--			value="--><?php //esc_attr_e( 'Search', 'understrap' ); ?><!--">-->
	    </span>

	</div>
</form>

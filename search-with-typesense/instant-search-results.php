<?php
/*
 * tmpl-cmswt-Result-itemTemplate--[post-type-slug]
 * for different templates for different post types add the post type slug instead of [post-type-slug] as the id
 * example tmpl-cm-typesense-shortcode-page-search-results or tmpl-cm-typesense-shortcode-book-search-results
 */
?>
<script type="text/html" id="tmpl-cm-typesense-shortcode-page-search-results">
    <# if(data.taxonomy === undefined){ #>
    <div class="hit-header">
		<?php
		//comment have to check //assets/placeholder.jpg because unfortunately that's how we saved it before version 1.6.0     
		?>
		<?php // post_thumnail_html if exists ?>
        <# if(data.post_thumbnail_html !== undefined){ #>
        <a href="{{{data._highlightResult.permalink.value}}}" class="hit-header--link" rel="nofollow noopener">
            {{{data.post_thumbnail_html}}}
        </a>
        <# } #>
		<?php // post_thumbnail exists (backward compatibility) ?>
        <#
        if(
        (data.post_thumbnail_html === undefined || data.post_thumbnail_html === '')
        && (data.post_thumbnail !== undefined
        && data.post_thumbnail != "<?php echo plugins_url( '', CODEMANAS_TYPESENSE_FILE_PATH ) . '//assets/placeholder.jpg'; ?>"
        && data.post_thumbnail != "" )
        ){
        #>
        <a href="{{{data._highlightResult.permalink.value}}}" class="hit-header--link" rel="nofollow noopener">
            <img src="{{{data.post_thumbnail}}}"/>
        </a>
        <# } #>
		<?php //Fallback ?>
        <# if(
        (data.post_thumbnail_html === undefined || data.post_thumbnail_html === '')
        && (data.post_thumbnail === undefined
        || data.post_thumbnail === '<?php echo plugins_url( '', CODEMANAS_TYPESENSE_FILE_PATH ) . '//assets/placeholder.jpg'; ?>'
        || data.post_thumbnail === ''
        )
        ) { #>
        <a href="{{{data._highlightResult.permalink.value}}}" class="hit-header--link" rel="nofollow noopener">
            <img src="<?php echo plugins_url( '/assets/images/placeholder-300x300.jpg', CODEMANAS_TYPESENSE_FILE_PATH ); ?>"/>
        </a>
        <# } #>
    </div>
    <# } #>
    <div class="hit-content">
        <# if(data._highlightResult.permalink !== undefined ) { #>
        <a href="{{{data._highlightResult.permalink.value}}}" rel="nofollow noopener"><h5 class="title">{{{data.formatted.post_title}}}</h5></a>
        <# } #>
        <# if( data.post_type === 'post' ) { #>
        <div class="hit-meta">
            <span class="posted-on">
                <time datetime="">{{data.formatted.postedDate}}</time>
            </span>
            <# if ( Object.keys(data.formatted.cats).length > 0 ) { #>
            <div class="hit-cats">
                <# for ( let key in data.formatted.cats ) { #>
                <div class="hit-cat"><a href="{{{data.formatted.cats[key]}}}">{{{key}}}</a>,</div>
                <# } #>
            </div>
            <# } #>
            <# } #>
            <div class="hit-description">{{{data.formatted.post_content}}}</div>
            <div class="hit-link">
                <a href="{{data.permalink}}"><?php _e( 'Read More...', 'search-with-typesense' ); ?></a>
            </div>
        </div>
    </div>
</script>
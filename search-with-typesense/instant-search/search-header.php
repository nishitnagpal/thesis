<?php

$facets = $args['facet'] ?? [];
$config = $args['config'] ?? [];
$schema = $args['schema'] ?? [];
?>
<div class="cmswt-Header">
    <div class="cmswt-SearchBox"></div>
    <div class="cmswt-SubHeader">
		<?php
		/**
		 * Codemanas\Typesense\Main\TemplateHooks index_switcher - 5
		 * Codemanas\Typesense\Main\TemplateHooks sort_by - 10
		 */
		do_action( 'cm_typesense_instant_search_sub_header', $args['passed_args'], $config, $facets, $schema );
		?>
    </div>
</div>
<div class="wds-dropdown page-header__languages page-header__variants">
	<div class="wds-dropdown__toggle">
		<? // There is intentionally no new line between span and svg to not render additional space between text na svg icon ?>
		<span data-tracking="variant-dropdown"><?= $variants->currentVariantName ?></span><?= DesignSystemHelper::renderSvg(
			'wds-icons-dropdown-tiny',
			'wds-icon wds-icon-tiny wds-dropdown__toggle-chevron'
		) ?>
	</div>
	<div class="wds-dropdown__content wds-is-right-aligned">
		<ul class="wds-list wds-is-linked">
			<?php foreach ( $variants as $variant ) : ?>
				<li>
					<a href="<?= Sanitizer::encodeAttribute( $variant['href'] ); ?>"
					   id="ca-varlang-<?= $id ?>"
					   rel="nofollow"><?= htmlspecialchars( $variant['id'] ); ?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>

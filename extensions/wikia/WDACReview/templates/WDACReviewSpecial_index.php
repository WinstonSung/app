<header id="WDACReviewSpecialPageHeader">
	<h2><?= $toolName ?></h2>
</header>

<form action="<?= $submitUrl ?>" method="post" id="WDACReviewForm">
	<fieldset>
		<legend>Bulk choice change</legend>
		<span>Set following option for each item below</span>
		<input type="button" value="<?= wfMessage('wdacreview-approve')->plain() ?>" id="wdac-approve-all"/>
		<input type="button" value="<?= wfMessage('wdacreview-disapprove')->plain() ?>" id="wdac-disapprove-all"/>
		<input type="button" value="<?= wfMessage('wdacreview-undetermined')->plain() ?>" id="wdac-undetermined-all"/>
	</fieldset>

	<ul class="wdac-review-list">
	<?php
	if ( is_array($aCities) && count($aCities) > 0) {
	?>
		<?php
		foreach($aCities as $id => $city) {
			$name = "city-{$id}";
		?>

			<li class="state-">
				<h3><?= $city['t'] ?></h3>
				<a href="<?= $city['u']?>"><?= $city['u'] ?></a>
				<input type="radio" name="<?= $name ?>" value="<?= WDACReviewSpecialController::FLAG_APPROVE ?>" id="<?= $name ?>-true"/><label for="<?= $name ?>-true"><?= wfMessage('wdacreview-approve')->plain() ?></label>

				<input type="radio" name="<?= $name ?>" value="<?= WDACReviewSpecialController::FLAG_DISAPPROVE ?>" id="<?= $name ?>-false"/><label for="<?= $name ?>-false"><?= wfMessage('wdacreview-disapprove')->plain() ?></label>

				<input type="radio" name="<?= $name ?>" value="<?= WDACReviewSpecialController::FLAG_UNDETERMINED ?>" id="<?= $name ?>-undetermined"/><label for="<?= $name ?>-undetermined"><?= wfMessage('wdacreview-undetermined')->plain() ?></label>
			</li>

		<?php
		}
		?>
	</ul>

	<input id="nextButton"  type="submit" class="wikia-button" value="Review selected" />

	<?php
	} else {
		echo wfMsg( 'wdacreview-noresults' )."<br>";
		echo Xml::element( 'a', array( 'href' => $fullUrl, 'class' => 'wikia-button', 'style' => 'float: none' ), 'Refresh page' );
	}
	?>

</form>

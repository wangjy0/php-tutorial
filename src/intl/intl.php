<?php

$coll = new Collator('en_US');
$al = $coll->getLocale(Locale::ACTUAL_LOCALE);
echo "Actual locale: $al\n";

$formatter = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
echo $formatter->format(1234567);

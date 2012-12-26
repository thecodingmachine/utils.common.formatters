<?php
/*
 * Copyright (c) 2012 David Negrier
*
* See the file LICENSE.txt for copying permission.
*/

require_once __DIR__."/../../../autoload.php";

use Mouf\Actions\InstallUtils;
use Mouf\MoufManager;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();
if (!$moufManager->instanceExists("replaceNullWithHyphen")) {
	$nullWithHyphen = $moufManager->createInstance("Mouf\\Utils\\Common\\Formatters\\NullTransformationFormatter");
	// Let's set a name for this instance (otherwise, it would be anonymous)
	$nullWithHyphen->setName("replaceNullWithHyphen");
	$nullWithHyphen->getProperty("value")->setValue("-");
}
if (!$moufManager->instanceExists("boldFormatter")) {
	$boldFormatter = $moufManager->createInstance("Mouf\\Utils\\Common\\Formatters\\PrefixSuffixFormatter");
	$boldFormatter->setName("boldFormatter");
	$boldFormatter->getProperty("prefix")->setValue("<b>");
	$boldFormatter->getProperty("suffix")->setValue("</b>");
}
if (!$moufManager->instanceExists("italicFormatter")) {
	$italicFormatter = $moufManager->createInstance("Mouf\\Utils\\Common\\Formatters\\PrefixSuffixFormatter");
	// Let's set a name for this instance (otherwise, it would be anonymous)
	$italicFormatter->setName("italicFormatter");
	$italicFormatter->getProperty("prefix")->setValue("<i>");
	$italicFormatter->getProperty("suffix")->setValue("</i>");
}
if (!$moufManager->instanceExists("readOnlyCheckBoxFormatter")) {
	$italicFormatter = $moufManager->createInstance("Mouf\\Utils\\Common\\Formatters\\ReadOnlyCheckboxFormatter");
	// Let's set a name for this instance (otherwise, it would be anonymous)
	$italicFormatter->setName("readOnlyCheckBoxFormatter");
}
if (!$moufManager->instanceExists("timestampToFrdateFormatter")) {
	$timestampToFrdateFormatter = $moufManager->createInstance("Mouf\\Utils\\Common\\Formatters\\DateFormatter");
	// Let's set a name for this instance (otherwise, it would be anonymous)
	$timestampToFrdateFormatter->setName("timestampToFrdateFormatter");
	$timestampToFrdateFormatter->getProperty("sourceFormat")->setValue("timestamp");
	$timestampToFrdateFormatter->getProperty("destFormat")->setValue("d/m/Y");
}

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();
?>




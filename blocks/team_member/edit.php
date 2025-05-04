<?php /** @noinspection DuplicatedCode */

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Application\Service\FileManager;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\View\View;

/** @var string $email */
/** @var string $phone */
/** @var string $fullName */
/** @var string $position */
/** @var int|null|string $photoFileId */

/** @var string $website */
/** @var string $xing */
/** @var string $linkedin */
/** @var string $facebook */
/** @var string $twitter */
/** @var string $instagram */

/** @var string $buttonLabel */

$app = Application::getFacadeApplication();
/** @var Form $form */
/** @noinspection PhpUnhandledExceptionInspection */
$form = $app->make(Form::class);
/** @var FileManager $fileManager */
/** @noinspection PhpUnhandledExceptionInspection */
$fileManager = $app->make(FileManager::class);

$email = $email ?? "";
$phone = $phone ?? "";

$website = $website ?? "";
$xing = $xing ?? "";
$linkedin = $linkedin ?? "";
$facebook = $facebook ?? "";
$twitter = $twitter ?? "";
$instagram = $instagram ?? "";

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/help_blocktypes", [], "team_member");

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/did_you_know", [], "team_member");
?>

<div class="form-group">
    <?php echo $form->label("photoFileId", t("Photo")); ?>
    <?php echo $fileManager->image("photoFileId", "photoFileId", t("Please choose image"), $photoFileId); ?>
</div>

<div class="form-group">
    <?php echo $form->label("fullName", t("Full Name"), ["class" => "control-label"]); ?>
    <?php echo $form->text("fullName", $fullName, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("position", t("Position"), ["class" => "control-label"]); ?>
    <?php echo $form->textarea("position", $position, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("email", t("Email"), ["class" => "control-label"]); ?>
    <?php echo $form->text("email", $email, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("phone", t("Phone"), ["class" => "control-label"]); ?>
    <?php echo $form->text("phone", $phone, ["class" => "form-control", "max-length" => "255"]); ?>
</div>


<div class="form-group">
    <?php echo $form->label("website", t("Website"), ["class" => "control-label"]); ?>
    <?php echo $form->text("website", $website, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("xing", t("Xing"), ["class" => "control-label"]); ?>
    <?php echo $form->text("xing", $xing, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("linkedin", t("LinkedIn"), ["class" => "control-label"]); ?>
    <?php echo $form->text("linkedin", $linkedin, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("facebook", t("Facebook"), ["class" => "control-label"]); ?>
    <?php echo $form->text("facebook", $facebook, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("twitter", t("Twitter"), ["class" => "control-label"]); ?>
    <?php echo $form->text("twitter", $twitter, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

<div class="form-group">
    <?php echo $form->label("instagram", t("Instagram"), ["class" => "control-label"]); ?>
    <?php echo $form->text("instagram", $instagram, ["class" => "form-control", "max-length" => "255"]); ?>
</div>

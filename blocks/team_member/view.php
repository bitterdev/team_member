<?php /** @noinspection DuplicatedCode */

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Entity\File\Version;
use Concrete\Core\File\File;
use Concrete\Core\Entity\File\File as FileEntity;
use Concrete\Core\Package\PackageService;
use Concrete\Core\Support\Facade\Application;
use Concrete\Package\TeamMember\Controller;

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

$app = Application::getFacadeApplication();
/** @var PackageService $packageService */
/** @noinspection PhpUnhandledExceptionInspection */
$packageService = $app->make(PackageService::class);
$pkgEntity = $packageService->getByHandle("team_member");
/** @var Controller $pkg */
$pkg = $pkgEntity->getController();

$imageUrl = $pkg->getRelativePath() . "/images/team_member_default_image.jpg";

$imageFile = File::getByID($photoFileId);

if ($imageFile instanceof FileEntity) {
    $imageFileVersion = $imageFile->getApprovedVersion();

    if ($imageFileVersion instanceof Version) {
        $imageUrl = $imageFileVersion->getThumbnailURL("team_member_thumbnail");
    }
}

$email = $email ?? "";
$phone = $phone ?? "";
$website = $website ?? "";
$xing = $xing ?? "";
$linkedin = $linkedin ?? "";
$facebook = $facebook ?? "";
$twitter = $twitter ?? "";
$instagram = $instagram ?? "";
?>

<div class="team-member">
    <img src="<?php echo h($imageUrl); ?>" alt="<?php echo h($fullName); ?>" class="img-fluid"/>

    <p>
        <strong>
            <?php echo strip_tags($fullName); ?>
        </strong>

        <br>

        <?php echo nl2br(strip_tags($position)); ?>
    </p>

    <div class="links">
        <?php if (!empty($email)) { ?>
            <a href="mailto:<?php echo h($email); ?>">
                <i class="fas fa-envelope"></i>
            </a>
        <?php } ?>

        <?php if (!empty($phone)) { ?>
            <a href="tel:<?php echo t(str_replace(" ", "", $phone)); ?>">
                <i class="fas fa-phone"></i>
            </a>
        <?php } ?>

        <?php if (!empty($website)) { ?>
            <a href="<?php echo $website; ?>" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        <?php } ?>

        <?php if (!empty($linkedin)) { ?>
            <a href="<?php echo $linkedin; ?>" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        <?php } ?>

        <?php if (!empty($xing)) { ?>
            <a href="<?php echo $xing; ?>" target="_blank">
                <i class="fab fa-xing"></i>
            </a>
        <?php } ?>

        <?php if (!empty($facebook)) { ?>
            <a href="<?php echo $facebook; ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php } ?>

        <?php if (!empty($twitter)) { ?>
            <a href="<?php echo $twitter; ?>" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        <?php } ?>

        <?php if (!empty($instagram)) { ?>
            <a href="<?php echo $instagram; ?>" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        <?php } ?>
    </div>
</div>
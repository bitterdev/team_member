<?php

namespace Concrete\Package\TeamMember\Block\TeamMember;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Database\Connection\Connection;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Validation;
use Doctrine\DBAL\Exception;
use Illuminate\Contracts\Container\BindingResolutionException;

class Controller extends BlockController
{
    protected $btTable = 'btTeamMember';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockOutputLifetime = 300;
    protected $btExportFileColumns = ["photoFileId"];

    public function getBlockTypeDescription(): string
    {
        return t("Add a team member to your site.");
    }

    public function getBlockTypeName(): string
    {
        return t("Team Member");
    }

    /**
     * @throws \Exception
     */
    public function add()
    {
        $this->set("fullName", "");
        $this->set("position", "");
        $this->set("phone", "");
        $this->set("email", "");
        $this->set("photoFileId", null);
    }

    public function validate($args): ErrorList|bool
    {
        $errorList = parent::validate($args);

        /** @var Validation $formValidator */
        /** @noinspection PhpUnhandledExceptionInspection */
        $formValidator = $this->app->make(Validation::class);

        $formValidator->setData($args);
        $formValidator->addRequired("fullName", t("You need to enter a the full name."));

        if (!$formValidator->test()) {
            $errorList = $formValidator->getError();
        }

        return $errorList;
    }

    public function save($args)
    {
        if (isset($args["photoFileId"]) && !is_numeric($args["photoFileId"])) {
            unset($args["photoFileId"]);
        }

        parent::save($args);
    }
}
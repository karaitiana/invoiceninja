<?php

namespace App\Ninja\Presenters;

use Utils;
use DropdownButton;

/**
 * Class ProposalPresenter.
 */
class ProposalPresenter extends EntityPresenter
{
    public function moreActions()
    {
        $proposal = $this->entity;
        $invitation = $proposal->invitations->first();
        $actions = [];

        $actions[] = ['url' => $invitation->getLink('proposal'), 'label' => trans("texts.view_as_recipient")];

        $actions[] = DropdownButton::DIVIDER;

        if (! $proposal->trashed()) {
            $actions[] = ['url' => 'javascript:onArchiveClick()', 'label' => trans("texts.archive_proposal")];
        }
        if (! $proposal->is_deleted) {
            $actions[] = ['url' => 'javascript:onDeleteClick()', 'label' => trans("texts.delete_proposal")];
        }

        return $actions;
    }

}
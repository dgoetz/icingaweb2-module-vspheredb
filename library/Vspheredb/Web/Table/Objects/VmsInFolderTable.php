<?php

namespace Icinga\Module\Vspheredb\Web\Table\Objects;

use dipl\Html\Link;

class VmsInFolderTable extends VmsTable
{
    public function getColumnsToBeRendered()
    {
        return [
            $this->translate('Name'),
            $this->translate('CPUs'),
            $this->translate('Memory'),
        ];
    }

    public function renderRow($row)
    {
        $caption = Link::create(
            $row->object_name,
            'vspheredb/vm',
            ['id' => $row->id]
        );

        $tr = $this::row([$caption, $row->hardware_numcpu, $row->hardware_memorymb]);
        $tr->attributes()->add('class', [$row->runtime_power_state, $row->overall_status]);

        return $tr;
    }
}
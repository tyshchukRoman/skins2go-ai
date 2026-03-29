<?php

function codelibry_acf_fields_stats_banner(): array {
    return [
        [
            'label'        => 'Items',
            'name'         => 'stats-banner-items',
            'type'         => 'repeater',
            'button_label' => 'Add Item',
            'sub_fields'   => [
                [
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'label' => 'Description',
                    'name'  => 'description',
                    'type'  => 'text',
                ],
            ],
        ],
    ];
}

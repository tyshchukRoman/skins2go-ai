<?php

function codelibry_acf_fields_hero(): array {
    return [
        [
            'label' => 'Subtitle (Badge)',
            'name'  => 'hero-subtitle',
            'type'  => 'text',
        ],
        [
            'label' => 'Title',
            'name'  => 'hero-title',
            'type'  => 'text',
        ],
        [
            'label' => 'Description',
            'name'  => 'hero-description',
            'type'  => 'textarea',
            'rows'  => 3,
        ],
        [
            'label' => 'Button 1',
            'name'  => 'hero-button-1',
            'type'  => 'link',
        ],
        [
            'label' => 'Button 2',
            'name'  => 'hero-button-2',
            'type'  => 'link',
        ],
    ];
}

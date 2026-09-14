<?php
/**
 * Block Name: Section Container
 */

$id = $block['anchor'] ?? 'info-block_' . $block['id'];
$customClass = $block['className'] ?? '';

// Шаблон внутренних блоков по умолчанию при вставке блока
$template = [
    [
        'core/columns',
        ['className' => 'info-block-wrapper'],
        [
            [
                'core/column',
                ['className' => 'info-block__image'],
                [
                    ['core/image', []]
                ]
            ],
            [
                'core/column',
                ['className' => 'info-block-text'],
                [
                    ['core/heading', ['level' => 2, 'placeholder' => 'Заголовок']],
                    ['core/paragraph', ['placeholder' => 'Введите описание...']],
                    ['core/list', []]
                ]
            ]
        ]
    ]
];

// Список разрешенных блоков внутри контейнера
$allowed_blocks = [
    'core/columns',
    'core/column',
    'core/image',
    'core/heading',
    'core/paragraph',
    'core/list',
    'core/button',
    'core/buttons'
];
?>

<section id="<?= esc_attr($id) ?>" class="info-block <?= esc_attr($customClass) ?>">
    <div class="info-block__container">
        <InnerBlocks 
            template="<?= esc_attr(json_encode($template)) ?>" 
            allowedBlocks="<?= esc_attr(json_encode($allowed_blocks)) ?>"
            templateLock="false"
        />
    </div>
</section>
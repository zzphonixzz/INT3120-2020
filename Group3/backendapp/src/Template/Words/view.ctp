<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Word $word
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="words view large-9 medium-8 columns content">
    <h3><?= h($word->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($word->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Character') ?></th>
            <td><?= h($word->start_character) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sound') ?></th>
            <td><?= h($word->sound) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($word->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($word->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($word->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Synonymous') ?></h4>
        <?= $this->Text->autoParagraph(h($word->synonymous)); ?>
    </div>
    <div class="row">
        <h4><?= __('Antonymous') ?></h4>
        <?= $this->Text->autoParagraph(h($word->antonymous)); ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grammar $grammar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grammar'), ['action' => 'edit', $grammar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grammar'), ['action' => 'delete', $grammar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grammar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grammars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grammar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grammars view large-9 medium-8 columns content">
    <h3><?= h($grammar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($grammar->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sound') ?></th>
            <td><?= h($grammar->sound) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lesson') ?></th>
            <td><?= $grammar->has('lesson') ? $this->Html->link($grammar->lesson->name, ['controller' => 'Lessons', 'action' => 'view', $grammar->lesson->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grammar->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($grammar->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($grammar->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Meaning') ?></h4>
        <?= $this->Text->autoParagraph(h($grammar->meaning)); ?>
    </div>
</div>

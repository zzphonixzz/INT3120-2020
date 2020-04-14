<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson $lesson
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lesson'), ['action' => 'edit', $lesson->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lesson'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grammars'), ['controller' => 'Grammars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grammar'), ['controller' => 'Grammars', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lessons view large-9 medium-8 columns content">
    <h3><?= h($lesson->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($lesson->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lesson->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lesson->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lesson->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Thumbnail') ?></h4>
        <?= $this->Text->autoParagraph(h($lesson->thumbnail)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($lesson->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Grammars') ?></h4>
        <?php if (!empty($lesson->grammars)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Word') ?></th>
                <th scope="col"><?= __('Sound') ?></th>
                <th scope="col"><?= __('Meaning') ?></th>
                <th scope="col"><?= __('Lesson Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lesson->grammars as $grammars): ?>
            <tr>
                <td><?= h($grammars->id) ?></td>
                <td><?= h($grammars->word) ?></td>
                <td><?= h($grammars->sound) ?></td>
                <td><?= h($grammars->meaning) ?></td>
                <td><?= h($grammars->lesson_id) ?></td>
                <td><?= h($grammars->created) ?></td>
                <td><?= h($grammars->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grammars', 'action' => 'view', $grammars->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grammars', 'action' => 'edit', $grammars->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grammars', 'action' => 'delete', $grammars->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grammars->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grammar[]|\Cake\Collection\CollectionInterface $grammars
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grammar'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grammars index large-9 medium-8 columns content">
    <h3><?= __('Grammars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sound') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lesson_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grammars as $grammar): ?>
            <tr>
                <td><?= $this->Number->format($grammar->id) ?></td>
                <td><?= h($grammar->word) ?></td>
                <td><?= h($grammar->sound) ?></td>
                <td><?= $grammar->has('lesson') ? $this->Html->link($grammar->lesson->name, ['controller' => 'Lessons', 'action' => 'view', $grammar->lesson->id]) : '' ?></td>
                <td><?= h($grammar->created) ?></td>
                <td><?= h($grammar->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grammar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grammar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grammar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grammar->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

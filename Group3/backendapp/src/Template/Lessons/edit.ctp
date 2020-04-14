<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson $lesson
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lesson->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Grammars'), ['controller' => 'Grammars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grammar'), ['controller' => 'Grammars', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lessons form large-9 medium-8 columns content">
    <?= $this->Form->create($lesson) ?>
    <fieldset>
        <legend><?= __('Edit Lesson') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('thumbnail');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

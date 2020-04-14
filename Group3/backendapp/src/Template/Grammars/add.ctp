<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grammar $grammar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grammars'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grammars form large-9 medium-8 columns content">
    <?= $this->Form->create($grammar) ?>
    <fieldset>
        <legend><?= __('Add Grammar') ?></legend>
        <?php
            echo $this->Form->control('word');
            echo $this->Form->control('sound');
            echo $this->Form->control('meaning');
            echo $this->Form->control('lesson_id', ['options' => $lessons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="content-wrapper">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?= $this->Flash->render() ?>
    </div>
    <!-- content starts here -->
    <?php echo $this->fetch('content'); ?>
    <!-- content ends here -->
</div>


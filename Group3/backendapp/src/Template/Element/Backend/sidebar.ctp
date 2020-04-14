<?php
$currentController = $this->request->params['controller'];
$currentAction = $this->request->params['action'];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Opening Day</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $this->Url->assetUrl('/backend/img/avatar04.png') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview <?= $currentController == 'Words' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $currentController == 'Words' && $currentAction == 'index' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Danh sách từ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['controller' => 'Words', 'action' => 'index']) ?>" class="nav-link <?= $currentController == 'Words' && $currentAction == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= $this->Url->build(['controller' => 'Words', 'action' => 'add']) ?>" class="nav-link <?= $currentController == 'Words' && $currentAction == 'add' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm từ mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= $currentController == 'Lessons' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $currentController == 'Lessons' && $currentAction == 'index' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Danh sách bài học
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['controller' => 'Lessons', 'action' => 'index']) ?>" class="nav-link <?= $currentController == 'Lessons' && $currentAction == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= $this->Url->build(['controller' => 'Lessons', 'action' => 'add']) ?>" class="nav-link <?= $currentController == 'Lessons' && $currentAction == 'add' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm bài học</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= $currentController == 'Tests' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $currentController == 'Tests' && $currentAction == 'index' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Danh sách mục kiểm tra
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['controller' => 'Tests', 'action' => 'index']) ?>" class="nav-link <?= $currentController == 'Tests' && $currentAction == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= $this->Url->build(['controller' => 'Tests', 'action' => 'add']) ?>" class="nav-link <?= $currentController == 'Tests' && $currentAction == 'add' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mục kiểm tra</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= $currentController == 'Exercises' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $currentController == 'Exercises' && $currentAction == 'index' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Danh sách bài tập
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['controller' => 'Exercises', 'action' => 'index']) ?>" class="nav-link <?= $currentController == 'Exercises' && $currentAction == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= $this->Url->build(['controller' => 'Exercises', 'action' => 'add']) ?>" class="nav-link <?= $currentController == 'Exercises' && $currentAction == 'add' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mục kiểm tra</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

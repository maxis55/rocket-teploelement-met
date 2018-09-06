<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    [
                        'label' => 'Страницы',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Просмотреть', 'icon' => 'eye', 'url' => ['/admin/pages'],],
                            ['label' => 'Добавить', 'icon' => 'file', 'url' => ['/admin/pages-create'],],
                        ],
                    ],
                    [
                        'label' => 'Категории',
                        'icon' => 'folder-open',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Просмотреть', 'icon' => 'eye', 'url' => ['/admin/categories'],],
                            ['label' => 'Добавить', 'icon' => 'file', 'url' => ['/admin/category-create'],],
                        ],
                    ],

                    ['label' => 'Медиа', 'icon' => 'image', 'url' => ['/admin/media']],
                    ['label' => 'Новости', 'icon' => 'calendar-plus', 'url' => ['/admin/news']],
                    ['label' => 'Login', 'url' => ['/admin/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

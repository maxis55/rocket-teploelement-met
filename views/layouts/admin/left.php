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
	                [
		                'label' => 'Новости',
		                'icon' => 'newspaper-o',
		                'url' => '#',
		                'items' => [
			                ['label' => 'Просмотреть', 'icon' => 'eye', 'url' => ['/admin/news'],],
			                ['label' => 'Добавить', 'icon' => 'file', 'url' => ['/admin/news-create'],],
		                ],
	                ],
                    ['label' => 'Медиа', 'icon' => 'image', 'url' => ['/admin/media']],
	                ['label' => 'Продукты', 'icon' => 'gear', 'url' => ['/admin/products']],
	                ['label' => 'Характеристики', 'icon' => 'gear', 'url' => ['/admin/characteristics']],
	                ['label' => 'Сообщения', 'icon' => 'envelope', 'url' => ['/admin/messages']],
	                ['label' => 'Заказы', 'icon' => 'object-group', 'url' => ['/admin/orders']],
                    ['label' => 'Настройки', 'icon' => 'gear', 'url' => ['/admin/settings']],
                ],
            ]
        ) ?>

    </section>

</aside>

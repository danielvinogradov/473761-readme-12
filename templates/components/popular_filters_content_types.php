<div class="popular__filters filters">
    <b class="popular__filters-caption filters__caption">Тип контента:</b>
    <ul class="popular__filters-list filters__list">
        <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
            <a class="filters__button filters__button--ellipse filters__button--all filters__button--active"
               href="#">
                <span>Все</span>
            </a>
        </li>
        <?php foreach ($content_types as $content_type): ?>
            <li class="popular__filters-item filters__item">
                <a class="filters__button filters__button--<?= $content_type['class_name'] ?> button" href="#">
                    <span class="visually-hidden"><?= $content_type['name'] ?></span>
                    <?php if ($content_type['class_name'] === 'photo'): ?>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-photo"></use>
                        </svg>
                    <?php elseif ($content_type['class_name'] === 'video'): ?>
                        <svg class="filters__icon" width="24" height="16">
                            <use xlink:href="#icon-filter-video"></use>
                        </svg>
                    <?php elseif ($content_type['class_name'] === 'text'): ?>
                        <svg class="filters__icon" width="20" height="21">
                            <use xlink:href="#icon-filter-text"></use>
                        </svg>
                    <?php elseif ($content_type['class_name'] === 'quote'): ?>
                        <svg class="filters__icon" width="21" height="20">
                            <use xlink:href="#icon-filter-quote"></use>
                        </svg>
                    <?php elseif ($content_type['class_name'] === 'link'): ?>
                        <svg class="filters__icon" width="21" height="18">
                            <use xlink:href="#icon-filter-link"></use>
                        </svg>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

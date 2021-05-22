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
                    <svg class="filters__icon"
                        <?php if ($content_type['class_name'] === 'photo'): ?>
                            width="22" height="18"
                        <?php elseif ($content_type['class_name'] === 'video'): ?>
                            width="24" height="16"
                        <?php elseif ($content_type['class_name'] === 'text'): ?>
                            width="20" height="21"
                        <?php elseif ($content_type['class_name'] === 'quote'): ?>
                            width="21" height="20"
                        <?php elseif ($content_type['class_name'] === 'link'): ?>
                            width="21" height="18"
                        <?php endif; ?>
                    >
                        <use xlink:href="#icon-filter-<?= $content_type['class_name'] ?>"></use>
                    </svg>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

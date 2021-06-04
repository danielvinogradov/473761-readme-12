<div class="comments">
    <form class="comments__form form" action="#" method="post">
        <div class="comments__my-avatar">
            <img class="comments__picture" src="../img/userpic-medium.jpg"
                 alt="Аватар пользователя">
        </div>
        <div class="form__input-section form__input-section--error">
                                <textarea class="comments__textarea form__textarea form__input"
                                          placeholder="Ваш комментарий"></textarea>
            <label class="visually-hidden">Ваш комментарий</label>
            <button class="form__error-button button" type="button">!</button>
            <div class="form__error-text">
                <h3 class="form__error-title">Ошибка валидации</h3>
                <p class="form__error-desc">Это поле обязательно к заполнению</p>
            </div>
        </div>
        <button class="comments__submit button button--green" type="submit">Отправить</button>
    </form>
    <div class="comments__list-wrapper">
        <ul class="comments__list">
            <li class="comments__item user">
                <div class="comments__avatar">
                    <a class="user__avatar-link" href="#">
                        <img class="comments__picture" src="../img/userpic-larisa.jpg"
                             alt="Аватар пользователя">
                    </a>
                </div>
                <div class="comments__info">
                    <div class="comments__name-wrapper">
                        <a class="comments__user-name" href="#">
                            <span>Лариса Роговая</span>
                        </a>
                        <time class="comments__time" datetime="2019-03-20">1 ч назад</time>
                    </div>
                    <p class="comments__text">
                        Красота!!!1!
                    </p>
                </div>
            </li>
            <li class="comments__item user">
                <div class="comments__avatar">
                    <a class="user__avatar-link" href="#">
                        <img class="comments__picture" src="../img/userpic-larisa.jpg"
                             alt="Аватар пользователя">
                    </a>
                </div>
                <div class="comments__info">
                    <div class="comments__name-wrapper">
                        <a class="comments__user-name" href="#">
                            <span>Лариса Роговая</span>
                        </a>
                        <time class="comments__time" datetime="2019-03-18">2 дня назад</time>
                    </div>
                    <p class="comments__text">
                        Озеро Байкал – огромное древнее озеро в горах Сибири к северу от
                        монгольской
                        границы. Байкал считается самым глубоким озером в мире. Он окружен сетью
                        пешеходных маршрутов, называемых Большой байкальской тропой. Деревня
                        Листвянка, расположенная на западном берегу озера, – популярная
                        отправная
                        точка для летних экскурсий. Зимой здесь можно кататься на коньках и
                        собачьих
                        упряжках.
                    </p>
                </div>
            </li>
        </ul>
        <a class="comments__more-link" href="#">
            <span>Показать все комментарии</span>
            <sup class="comments__amount">45</sup>
        </a>
    </div>
</div>

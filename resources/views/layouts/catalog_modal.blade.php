<div class="modall modall-request">
    <div class="modall-body">
        <form class="form">
            @csrf
            <span class="close"></span>
            <h4>
                Оставить заявку
            </h4>
            <img src="{{asset('custom_catalog')}}/img/popup-img.png" alt="">
            <div class="form-row">
                <div class="form-column">
                    <span class="eror">!</span>
                    <!-- за включение текста ошибки отвечает класс .active -->
                    <input required type="text" name="name" placeholder="Ваше имя">
                </div>
                <div class="form-column">
                    <span class="eror">!</span>
                    <!-- за включение текста ошибки отвечает класс .active -->
                    <input required type="tel" name="phone" class="only_number phone_mask" placeholder="Телефон">
                </div>
            </div>
            <div class="form-action">
                <button type="button" class="btn reply">Отправить<i class="icon-left-arrow"></i></button>
            </div>
        </form>
    </div>
</div>
<div class="modall modall-reply">
    <div class="modall-body">
        <span class="close"></span>
        <div class="content">
            <h4>Благодарим за вашу заявку!</h4>
            <p>Менеджер свяжется с Вами в ближайшее время
            </p>
        </div>
    </div>
</div>


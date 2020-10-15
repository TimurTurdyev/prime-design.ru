@component('mail::message')
    <h2>Новая заявка!</h2>
    <ul>
        <li>Имя: {{$formData['name']}}</li>
        @isset($formData['phone'])
            <li>Тел: {{$formData['phone']}}</li>
        @endisset
        @isset($formData['email'])
            <li>Тел: {{$formData['email']}}</li>
        @endisset
        @isset($formData['location'])
            <li>Со страницы: {{$formData['location']}}</li>
        @endisset
    </ul>
    @component('mail::button', ['url' => config('app.url')])
        Перейти на сайт
    @endcomponent
    Best regards, <br>{{ config('app.name') }}
@endcomponent

@component('mail::message')
#Bienvenido a mi App!
Hola {{$user->name }} Gracias por entrar a mi App Postea!

Que tengas un buena experiencia.<br>
{{ config('app.name') }}
@endcomponent

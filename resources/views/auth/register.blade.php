@extends('../front.layout')

@section('content')

<main class="content">
    <section class="register-section" id="register">
        {{-- ---------- FORMULARIO DE REGISTRO ---------- --}}


        <form class="form" method="POST" action="{{ route('register') }}">
            <h1 class="form__title">Registrate</h1>
            @csrf

            <div class="form__group">
                <label for="name" class="form__group__text-label">{{ __('Nombre') }}</label>

                 <div class="form_group_jsregister">


                <input id="name" type="text" class="form__group__text-field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                <div id="ok_name" class "error_name"></div>
                <div id="error_name" class "error_name"></div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
</div>
            </div>

            <div class="form__group">
                <label for="lastname" class="form__group__text-label">{{ __('Apellido') }}</label>

                  <div class="form_group_jsregister">
                <input id="lastname" type="text" class="form__group__text-field form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                  <div id="ok_lastname" class "error_lastname"></div>
                  <div id="error_lastname" class "error_lastname"></div>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div></div>

            <div class="form__group">
                <label for="email" class="form__group__text-label">{{ __('E-Mail') }}</label>

<div class="form_group_jsregister">
                <input id="email" type="email" class="form__group__text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                  <div id="ok_email" class "error_email"></div>
                  <div id="error_email" class "error_email"></div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div></div>

            <div class="form__group">
                <label for="password" class="form__group__text-label">{{ __('Contraseña') }}</label>

<div class="form__group">
                <input id="password" type="password" class="form__group__text-field form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                  <div id="ok_password" class "ok_password"></div>
                  <div id="error_password" class "error_password"></div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form__group">
                <label for="password-confirm" class="form__group__text-label">{{ __('Repetir Contraseña') }}</label>

<div class="form_group_jsregister">
                <input id="password-confirm" type="password" class="form__group__text-field form-control" name="password_confirmation"  autocomplete="new-password">
                <div id="ok_password-confirm" class "ok_password-confirm"></div>
                <div id="error_password-confirm" class "error_password-confirm"></div>
            </div>
              </div>



            <button type="submit" id="submit_button" class="form__btn btn btn-primary">
                {{ __('Registrarse') }}
            </button>

        </form>

    </section>
    @section('scripts')
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/registerValidation.js')}}"></script>

    @endsection



</main>


@endsection

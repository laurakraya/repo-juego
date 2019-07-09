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
                
                
                <input id="name" type="text" class="form__group__text-field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            
            <div class="form__group">
                <label for="lastname" class="form__group__text-label">{{ __('Apellido') }}</label>
                
                
                <input id="lastname" type="text" class="form__group__text-field form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            
            <div class="form__group">
                <label for="email" class="form__group__text-label">{{ __('E-Mail') }}</label>
                
                
                <input id="email" type="email" class="form__group__text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            
            <div class="form__group">
                <label for="password" class="form__group__text-label">{{ __('Contraseña') }}</label>
                
                
                <input id="password" type="password" class="form__group__text-field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            
            <div class="form__group">
                <label for="password-confirm" class="form__group__text-label">{{ __('Repetir Contraseña') }}</label>
                
                
                <input id="password-confirm" type="password" class="form__group__text-field form-control" name="password_confirmation" required autocomplete="new-password">
                
            </div>
            
            
            
            <button type="submit" class="form__btn btn btn-primary">
                {{ __('Registrarse') }}
            </button>
            
            
        </form>
        
        
    </section>
</main>
@endsection

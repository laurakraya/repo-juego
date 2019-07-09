@extends('../front.layout')

@section('content')
<main class="content">
    <section class="login-section" id="login">
    
            
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="form__title">Login</h1>
                <div class="form__group">
                    <label class="form__group__text-label" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    
                    <input id="email" type="email" class="form__group__text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
                <div class="form__group">
                    <label class="form__group__text-label" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    
                    
                    <input id="password" type="password" class="form__group__text-field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
                <div class="form__group">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            
                            <label class="form-check-label" for="remember">
                                {{ __('Recordame') }}
                            </label>
                        </div>
                    </div>
                </div>
                
   
                  
                        <button type="submit" class="form__btn btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        
{{--                         @if (Route::has('password.request'))
                        <a class="form__btn btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                        @endif --}}
                   
                    <p class="form__not-registered">¿No tenés cuenta?<a class="form__not-registered__link" href="/register">Registrate</a></p>
               
            </form>
        
        
        
    </section>
</main>
@endsection

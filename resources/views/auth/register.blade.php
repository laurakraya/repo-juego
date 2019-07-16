@extends('../front.layout')

@section('content')

<main class="content">
    <section class="section-flex register-section" id="register">
        {{-- ---------- FORMULARIO DE REGISTRO ---------- --}}
        
        
        <form class="form" method="POST" action="{{ route('register') }}">
            <h1 class="form__title">Registrate</h1>
            @csrf
            
            <div class="form__group">
                <label for="name" class="form__group__text-label">{{ __('Nombre') }}</label>
                
                <div class="form_group_jsregister">
                    
                    <div class="input-container">
                        <input id="name" type="text" class="form__group__text-field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        <div id="ok_name"></div>
                    </div>
                    <div id="error_name" class="error"></div>
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
                    <div class="input-container">
                        <input id="lastname" type="text" class="form__group__text-field form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                        <div id="ok_lastname"></div>
                    </div>
                    <div id="error_lastname" class="error"></div>
                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div></div>
                
                <div class="form__group">
                    <label for="email" class="form__group__text-label">{{ __('E-Mail') }}</label>
                    
                    <div class="form_group_jsregister">
                        <div class="input-container">
                            <input id="email" type="email" class="form__group__text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                            <div id="ok_email" ></div>
                        </div>
                        <div id="error_email" class="error"></div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div></div>
                    
                    <div class="form__group">
                        <label for="password" class="form__group__text-label">{{ __('Contraseña') }}</label>
                        
                        <div class="form__group">
                            <div class="input-container">
                                <input id="password" type="password" class="form__group__text-field form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                <div id="ok_password" class="ok_password"></div>
                            </div>
                            <div id="error_password" class="error"></div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                        
                        <div class="form__group">
                            <label for="password-confirm" class="form__group__text-label">{{ __('Repetir Contraseña') }}</label>
                            
                            <div class="form_group_jsregister">
                                <div class="input-container">
                                    <input id="password-confirm" type="password" class="form__group__text-field form-control" name="password_confirmation"  autocomplete="new-password">
                                    <div id="ok_password-confirm" class="ok_password-confirm"></div>
                                </div>
                                <div id="error_password-confirm" class="error"></div>
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

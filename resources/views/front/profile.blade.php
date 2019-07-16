@extends('front.layout')

@section('metatags')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
<main style="overflow-x: hidden">
  <section class="section-flex profile">
    <h1 class="profile__title"></h1>
    <div class="profile__info">
      <div class="profile__info__avatar">
        <div class="profile__info__avatar__pic" style="background-image: url('@if (Auth::check() && (Auth::user()->user_image == null)){{asset('img/profile-placeholder.png')}} @else /storage/profile/{{Auth::user()->user_image }}@endif')"></div>
      </div>
      <div class="profile__info__data">
        <ul class="profile-data__list">
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Nombre:</span>
            <span class="profile-data__list__item__data">{{ Auth::user()->name }}</span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Apellido:</span>
            <span class="profile-data__list__item__data">{{ Auth::user()->lastname }}</span>
          </li>
          <li class="profile-data__list__item">
            <span class="profile-data__list__item__label">Mail:</span>
            <span class="profile-data__list__item__data profile-data__list__item__data--lowercase">{{ Auth::user()->email }}</span>
          </li>
        </ul>
      </div>
    </div>
    <div class="change-avatar">
      <form class="change-avatar__form" action="" method="POST" enctype="multipart/form-data">

          @csrf
        <label class="change-avatar__form__label" for="avatar">Cambiar avatar:</label>
        <div>
          <input class="change-avatar__form__input" type="file" id="user_image" class="form-control" name="user_image">

          <button class="change-avatar__form__btn" name="submit" type="submit">Subir</button>
        </div>
        <div class="alert alert-danger" role="alert">
          @if ($errors->has('user_image'))
              <span class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('user_image') }}</strong>
                </span>
            @endif
        </div>
      </form>
    </div>
  </section>
</main>
@endsection

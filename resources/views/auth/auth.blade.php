@extends('layouts.app')

@section('user')

    <img src="/assets/images/icons/person-cabinet.png" class="cabinet-active__menu-photo" alt="person">
    <div class="mb-2 text-center">{{ $user->name }}</div>
    <a href="#" class="mb-4 cabinet-active__menu-link">
        <img src="/assets/images/cabinet-icons/history-icon.png" alt="">
        <div class="cabinet-active__menu-text mr-5">
            <span>История заказов</span>
            <i class="arrow right"></i>
        </div>
    </a>
    <a href="/cabinet-busket" class="mb-4 cabinet-active__menu-link">
        <img src="/assets/images/cabinet-icons/basket-icon.png" alt="">
        <div class="cabinet-active__menu-text   mr-5">
            <span>Корзина</span>
            <i class="arrow right"></i>
        </div>
    </a>
    <a href="#" class="mb-4 cabinet-active__menu-link">
        <img src="/assets/images/cabinet-icons/card-icon.png" alt="">
        <div class="cabinet-active__menu-text mr-5">
            <span>Мои карты</span>
            <i class="arrow right"></i>
        </div>
    </a>
    <a href="#" class="mb-4 cabinet-active__menu-link">
        <img src="/assets/images/cabinet-icons/setting-icon.png" alt="">
        <div class="cabinet-active__menu-text active mr-5">
            <span>Настройки аккаунта</span>
            <i class="arrow right"></i>
        </div>
    </a>

@endsection

@section('content')

@endsection

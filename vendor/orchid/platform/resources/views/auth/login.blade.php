@extends('platform::auth')
@section('title',__('Sign in to your account'))

@section('content')
    <h1 class="h4 text-black mb-4">{{__('Sign in to your account')}}</h1>

    <form class="m-t-md"
          role="form"
          method="POST"
          data-controller="form"
          data-form-need-prevents-form-abandonment-value="false"
          data-action="form#submit"
          action="{{ route('platform.login.auth') }}">
        @csrf

        @includeWhen($isLockUser,'platform::auth.lockme')
        @includeWhen(!$isLockUser,'platform::auth.signin')


<span class="text-muted" style="width: 80%;display: block;margin: 16px auto -1px;"> {{__("Don't have an Account?")}}  <a href="{{route('user.registration','user')}}" style="cursor: pointer ; font-weight: bold" class="small">
            {{__("Sign Up Now")}}
        </a></span>

    </form>
@endsection

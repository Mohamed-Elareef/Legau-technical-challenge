<a class="dropdown-item" href="{{route('profile')}}"><span class="dropdown-icon oi oi-person"></span> {{trans('profile.profile')}}</a>
<!--a class="dropdown-item" href="{{route('subscription')}}"><span class="dropdown-icon oi oi-star"></span> {{trans('subscriptions.subscriptions')}}</a-->
<a class="dropdown-item" href="{{route('tickets')}}"><span class="dropdown-icon oi oi-info"></span> {{trans('ticket.help_center')}}</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#" onclick="$('#logout-form').submit();"><span class="dropdown-icon oi oi-account-logout"></span> {{trans('general.logout')}}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>

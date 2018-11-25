
@if(count($notifications) > 0) 
	@foreach($notifications as $n)
		<a class="dropdown-item text-center" href="{{ route('notification.read', encrypt($n->id)) }}">{{ ucwords($n->message) }}</a>
	@endforeach
@else
	<a class="dropdown-item text-center" href="javascript:void(0)">No Notifications</a>
@endif
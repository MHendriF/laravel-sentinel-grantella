<h1>Hello</h1>

<p>
	Please click the following link to activate your account,

	<a href="http://localhost:8000/activate/{{ $user->email }}/{{ $code }}">activate account</a>
	{{-- <a href="{{ env("APP_KEY") }}" >Visit</a> --}}
</p>
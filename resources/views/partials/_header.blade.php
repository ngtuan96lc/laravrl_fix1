<header id="header">
	<a href="/" class="logo">My Blog</a>
</header>

<!-- Nav -->
<nav id="nav">
	@if(!Request::is('admin/*'))
	<ul class="links">
		<li {!! Request::is('/')?'class="active"':'' !!}><a href="/">Home</a></li>
		@if(Request::is('blog*'))
		<li class="active"><a href="#">Blog</a></li>
		@endif
		<li {!! Request::is('about')?'class="active"':'' !!}><a href="/about">About us</a></li>
		<li {!! Request::is('contact')?'class="active"':'' !!}><a href="/contact">Contact us</a></li>
		<li><a href="/admin">Admin <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
	</ul>
	<ul class="icons">
		<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
		<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
		<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
		<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
	</ul>
	@else
	<ul class="links">
		<li {!! Request::is('admin/posts*')?'class="active"':'' !!}><a href="{{ route('posts.index') }}">Post</a></li>
		<li {!! Request::is('admin/catagories*')?'class="active"':'' !!}><a href="{{ route('catagories.index') }}">Catagories</a></li>
		<li {!! Request::is('admin/tags*')?'class="active"':'' !!}><a href="{{ route('tags.index') }}">Tags</a></li>
		<li {!! Request::is('admin/contacts*')?'class="active"':'' !!}><a href="{{ route('contacts.index') }}">Contacts <span class="badge badge-secondary" style="font-size: 14px">{{ App\Contact::where('read',false)->count() }}</span></a></li>
	</ul>
	<ul class="icons">
		<li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
		<li style="display: none;">
			<form id="logout-form" action="{{ route('logout') }}" method="POST">
				{{ csrf_field() }}
        	</form>
    	</li>
	</ul>
	@endif
	
</nav>
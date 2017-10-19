@if(!Request::is('admin/*'))
<!-- Footer -->
	<footer id="footer">
		<section>
			<div class="form-field">
				<form method="post" action="{{ route('guest.contacts') }}" id="contactForm">
					{{ csrf_field() }}
					<div class="field">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" />
					</div>
					<div class="field">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" />
					</div>
					<div class="field">
						<label for="message">Message</label>
						<textarea name="message" id="message" rows="3"></textarea>
					</div>
					<ul class="actions">
						<li><input type="submit" value="Send Message" /></li>
					</ul>
				</form>
			</div>
		</section>
		<section class="split contact">
			<section class="alt">
				<h3>Address</h3>
				<p>3F-K1 Team Developer - Laravel</p>
			</section>
			<section>
				<h3>Phone</h3>
				<p><a href="#">(0164) 789 5560</a></p>
			</section>
			<section>
				<h3>Email</h3>
				<p><a href="#">banghia.violet@gmail.com</a></p>
			</section>
			<section>
				<h3>Social</h3>
				<ul class="icons alt">
					<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
				</ul>
			</section>
		</section>
	</footer>
@endif
<!-- Copyright -->
	<div id="copyright">
		<ul><li>&copy; 3F Team</li><li>DEVELOPER: <a href="#">Violet</a></li></ul>
	</div>

</div>

<!-- Scripts -->
<script src="{{ asset('libs/jquery.min.js') }}"></script>
@if(!Request::is('admin/*'))
<script src="{{ asset('libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate-contact-form.js') }}"></script>
@endif
@yield('scripts')
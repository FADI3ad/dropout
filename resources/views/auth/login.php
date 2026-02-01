	<?php require_once __DIR__ . "/../components/header.php" ?>
	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="account-thumb">
									<h2>Login now</h2>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="account-content">
									<form action="/login" method="post">
										<div class="single-acc-field">
											<label for="email">Email</label>
											<input type="email" id="email" placeholder="Enter your Email" name="email">
										</div>
										<div class="single-acc-field">
											<label for="password">Password</label>
											<input type="password" id="password" placeholder="Enter your password" name="password">
										</div>
										<div class="single-acc-field boxes">
											<input type="checkbox" id="checkbox">
											<label for="checkbox">Remember me</label>
										</div>
										<div class="single-acc-field">
											<button type="submit">Login Account</button>
										</div>

									</form>
									<a href="forget-password.html">Forget Password?</a>
									<a href="/register">Not Account Yet?</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php require_once __DIR__ . "/../components/footer.php" ?>
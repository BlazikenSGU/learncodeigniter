<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resume</title>

	<link rel="stylesheet" type="text/css" href="/frontend/admin/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/frontend/admin/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
	.title_id {
		display: flex;
		flex-direction: column;
	}

	a:hover {
		text-decoration: none;
		color: red;
	}
</style>

<body>
	<div class="container">
		<h2>Resume</h2>

		<section>
			<div class="title_id" style="margin-bottom:2rem ;">
				<span><a href="#info">1. info</a></span>
				<span><a href="#skill">2. skill</a></span>
				<span><a href="#education">3. education</a></span>
				<span><a href="#work">4. work exp</a></span>
				<span><a href="#project">5. project</a></span>
			</div>

			<div class="info" id="info">
				<h2>INFO</h2>


				<div style="width: 50%;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Infomation</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Name</th>
								<td>NGUYEN NHAT TRUONG</td>
							</tr>
							<tr>
								<th scope="row">Role</th>
								<td>Backend Fresher <span class="badge badge-success">(1.5 yoe)</span> </td>
							</tr>
							<tr>
								<th scope="row">Dob</th>
								<td>30/01/1999</td>
							</tr>
							<tr>
								<th scope="row">Address</th>
								<td>TPHCM</td>
							</tr>
							<tr>
								<th scope="row">Email</th>
								<td>truongnhat.nguyen.37@gmail.com</td>
							</tr>
							<tr>
								<th scope="row">Phone</th>
								<td>0335181946</td>
							</tr>
							<tr>
								<th scope="row">Github</th>
								<td><a href="https://github.com/BlazikenSGU">https://github.com/BlazikenSGU</a> </td>
							</tr>


						</tbody>
					</table>
				</div>
			</div>


			<div class="skill" id="skill">
				<h2>SKILL</h2>
				<div>
					<ul>
						<li>HTML5, CSS(SCSS)</li>
						<li>Javascript (ReactJS, VueJS)</li>
						<li>PHP (Wordpress, Codeigniter, Laravel)</li>
						<li>MySQL, MS SQL, MongoDB</li>
						<li>Bootstrap</li>
						<li>Figma</li>
						<li>Git, Gitbash, Github</li>
						<li>Toeic 570</li>
						<li>IT Helpdesk, IT support</li>
					</ul>
				</div>
			</div>

			<div class="education" id="education">
				<h2>EDUCATION</h2>

				<div style="width: 50%;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">Time</th>
								<th scope="col">University</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">9/2017-5/2019</th>
								<td>SAI GON UNIVERSITY <span class="badge badge-danger">(Business Administration)</span> </td>
							</tr>
							<tr>
								<th scope="row">9/2019-5/2023</th>
								<td>SAI GON UNIVERSITY <span class="badge badge-success">(Software Engineer - GPA: 2.55)</span> </td>
							</tr>


						</tbody>
					</table>
				</div>
			</div>

			<div class="work" id="work">
				<h2>WORK</h2>

				<div style="width: 50%;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">Time</th>
								<th scope="col">Company</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">4/2022-6/2022</th>
								<td>DGECKO DESIGN - WEBSITE <span class="badge badge-danger">(Intern PHP)</span></td>
							</tr>
							<tr>
								<th scope="row">6/2022-8/2022</th>
								<td>SAPO TECHNOLOGY JSC <span class="badge badge-danger">(Intern PHP)</span></td>
							</tr>
							<tr>
								<th scope="row">10/2022-12/2022</th>
								<td>THANH SGEAR <span class="badge badge-success">(IT Helpdesk)</span></td>
							</tr>
							<tr>
								<th scope="row">5/2023-Present</th>
								<td>ĐÔNG BẮC CORP <span class="badge badge-primary">(Fresher PHP)</span></td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>

			<div class="project" id="project">
				<h2>PROJECT</h2>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Time</th>
							<th scope="col">Link</th>
							<th scope="col">Company</th>
							<th scope="col">Level</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">6/2022-8/2022</th>
							<td><a href="https://japanorderstore.com/">Japanorder Store</a></td>
							<td>Sapo Technology JSC</td>
							<td>Intern PHP</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>The website sells mainly shoes and accessories.
										<br>Use wordpress cms php for programming
									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE & BE: Wordpress CMS PHP.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>3 member.
										<br>Role: Use the plugin available in WordPress to edit
										<br> the interface.
									</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Product Details, Category, Blog, Account,
										<br> Login, Register,... Admin Dashboard use plugin
										<br>Woocommerce for manage.

									</p>
								</div>
							</td>
						</tr>

						<tr>
							<th scope="row">7/2023-10/2023</th>
							<td><a href="https://hiokivietnam.vn/">Hiokivietnam</a></td>
							<td>Đông Bắc Corp</td>
							<td>Fresher PHP</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>Sales website with full functionality such as e-commerce.
										<br> Mainly sells industrial electrical equipment from Japanese
										<br>brands
									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE: HTML,CSS,JS, JQuery.
										<br>BE: PHP MVC OOP.
										<br>Database: Mysqli.
										<br>#: TinyMCE, Image Cloudinary.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>4 member.
										<br>Role: Program the interface of pages assigned by Leader,
										<br>design database and write api. Create unit test function
										<br>upload source to server hosting, manage domain.
									</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Product Details, Category, Blog, Account,
										<br> Login, Register,...
										<br>Admin: Use template old, full function CRUD product/
										<br>category/ user/ blog/ SEO/...
									</p>
								</div>
							</td>
						</tr>



						<tr>
							<th scope="row">11/2023-12/2023</th>
							<td><a href="https://keopur.vn/">Keopur</a></td>
							<td>Đông Bắc Corp</td>
							<td>Fresher PHP</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>The website mainly introduces products and articles.
									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE: HTML, SCSS, ReactJS, JQuery.
										<br>BE: PHP MVC OOP.
										<br>Database: Mysqli.
										<br>#: TinyMCE.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>2 member.
										<br>Role: Program the interface of pages assigned by Leader,
										<br>design database and write api. Create unit test function
										<br>upload source to server hosting, manage domain.
									</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Blog, Blog Details.
										<br>Admin: Dashboard, CRUD product / blog.
									</p>
								</div>
							</td>
						</tr>


						<tr>
							<th scope="row">2/2024-6/2024</th>
							<td><a href="https://giacongclc.com/">Gia Công CLC</a></td>
							<td>Đông Bắc Corp</td>
							<td>Fresher PHP</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>website introducing mechanical machines for processing wooden
										<br> furniture, and processing wooden products for wood companies
										<br>or furniture companies

									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE: HTML, SCSS, JS, JQuery.
										<br>BE: PHP MVC OOP.
										<br>Database: Mysqli.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>2 member.
										<br>Role: Currently in the process of maintaining the website,
										<br> converting from WordPress to PHP OOP
									</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Blog, Blog Details, Cart, Login, Register.
										<br>Admin: Dashboard, CRUD product / blog, Manage Slide
									</p>
								</div>
							</td>
						</tr>

						<tr>
							<th scope="row">2/2024-3/2024</th>
							<td><a href="https://tandaiphusy.com.vn/">Tandaiphusy</a></td>
							<td>Tân Đại Phú Sỹ</td>
							<td>Personal</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>The website mainly introduces products and articles. Describe
										<br> heavy industrial equipment, giving basic information that
										<br> customers need to grasp.
									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE & BE: Wordpress CMS PHP.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>.</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Product Details, Category, Blog, Account,
										<br> Login, Register,... Admin Dashboard use plugin
										<br>Woocommerce for manage.

									</p>
								</div>
							</td>
						</tr>

						<tr>
							<th scope="row">5/2024-7/2024</th>
							<td><a href="https://blazikensgu.id.vn/">Blaziken Store</a></td>
							<td>Blaziken Store</td>
							<td>Personal</td>
							<td>
								<div>
									<h5>Introduce</h5>
									<p>Website selling shoes and sportswear with full features
										<br> like an e-commerce website. Fully functional admin
										<br> management.
									</p>
								</div>
								<div>
									<h5>Technical</h5>
									<p>FE: HTML, CSS, JS, Jquery.
										<br>BE: CodeIgniter Framework PHP.
										<br>Database: Mysqli.
										<br>#: TinyMCE, Image Cloudinary.
									</p>
								</div>

								<div>
									<h5>Teamsize</h5>
									<p>.</p>
								</div>

								<div>
									<h5>Page:</h5>
									<p>Home, Product, Product Details, Category, Blog, Account,
										<br> Login, Register,...
										<br>Admin: Dashboard, full function CRUD product/
										<br>category/ user/ blog/ SEO/ statistical data/
										<br>bill/ order/...
									</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

			</div>
		</section>
	</div>
</body>

</html>

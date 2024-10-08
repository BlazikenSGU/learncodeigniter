<script src="/frontend/admin/js/jquery.min.js"></script>
<script src="/frontend/admin/js/bootstrap.min.js"></script>
<script src="/frontend/admin/js/bootstrap-select.min.js"></script>
<script src="/frontend/admin/js/sweetalert.min.js"></script>
<script src="/frontend/admin/js/apexcharts/apexcharts.js"></script>
<script src="/frontend/admin/js/main.js"></script>

<script src="/tinymce/tinymce.min.js"></script>

<script>
	const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
		const xhr = new XMLHttpRequest();
		xhr.withCredentials = false;
		xhr.open('POST', '/application/views/upload.php');

		xhr.upload.onprogress = (e) => {
			progress(e.loaded / e.total * 100);
		}

		xhr.onload = () => {
			if (xhr.status === 403) {
				reject({
					message: 'HTTP  Error: ' + xhr.status,
					remove: true
				});
				return;
			}

			if (xhr.status < 200 || xhr.status >= 300) {
				reject('HTTP Error: ' + xhr.status);
				return;
			}

			const json = JSON.parse(xhr.responseText);

			if (!json || typeof json.location != 'string') {
				reject('invalid JSON: ' + xhr.responseText);
				return;
			}

			resolve(json.location);
		};
		xhr.onerror = () => {
			reject('Image upload failded due to a XHR transport error. code: ' + xhr.status);
		}

		const formData = new FormData();
		formData.append('file', blobInfo.blob(), blobInfo.filename());

		xhr.send(formData);

	});


	tinymce.init({
		selector: 'textarea#default',

		height: 700,
		plugins: [
			'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', ' anchor', 'pagebreak',
			'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
			'table', 'emoticons', 'template', 'codesample'
		],
		toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify ' +
			'bullist numlist outdent indent | link image | print preview media fullscreen ' +
			'forecolor backcolor emoticons',
		images_upload_url: '/application/views/upload.php',
		images_upload_handler: image_upload_handler_callback,
		menu: {
			favs: {
				title: 'menu',
				items: 'code visualaid | searchreplace | emoticons'
			}
		},
		menubar: 'favs file edit view insert format tools table',
		content_style: 'body{font-family: Helvetica, Arial, san-serif; font-size: 16px}'
	});
</script>


<script>
	(function($) {

		var tfLineChart = (function() {

			var chartBar = function() {

				var options = {
					series: [{
							name: 'Total',
							data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
						}, {
							name: 'Pending',
							data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
						},
						{
							name: 'Delivered',
							data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
						}, {
							name: 'Canceled',
							data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
						}
					],
					chart: {
						type: 'bar',
						height: 325,
						toolbar: {
							show: false,
						},
					},
					plotOptions: {
						bar: {
							horizontal: false,
							columnWidth: '10px',
							endingShape: 'rounded'
						},
					},
					dataLabels: {
						enabled: false
					},
					legend: {
						show: false,
					},
					colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
					stroke: {
						show: false,
					},
					xaxis: {
						labels: {
							style: {
								colors: '#212529',
							},
						},
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					},
					yaxis: {
						show: false,
					},
					fill: {
						opacity: 1
					},
					tooltip: {
						y: {
							formatter: function(val) {
								return "$ " + val + ""
							}
						}
					}
				};

				chart = new ApexCharts(
					document.querySelector("#line-chart-8"),
					options
				);
				if ($("#line-chart-8").length > 0) {
					chart.render();
				}
			};

			/* Function ============ */
			return {
				init: function() {},

				load: function() {
					chartBar();
				},
				resize: function() {},
			};
		})();

		jQuery(document).ready(function() {});

		jQuery(window).on("load", function() {
			tfLineChart.load();
		});

		jQuery(window).on("resize", function() {});
	})(jQuery);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<script>
	$('.xulidonhang').change(function() {
		const value = $(this).val();
		const order_code = $(this).find(':selected').attr('id');
		if (value == 0) {
			alert('Không chọn dòng này, vui lòng chọn 1 trong các trạng thái bên dưới.');
		} else {
			$.ajax({
				method: 'POST',
				url: '/order/process',
				data: {
					value: value,
					order_code: order_code
				},
				success: function() {
					alert('Thay doi thuoc tinh thanh cong!');
					window.location.href = '/order/list';
				}
			})
		}
	})
</script>

<script type="text/javascript">
	function ChangeToSlug() {
		var slug;

		//Lấy text từ thẻ input title 
		slug = document.getElementById("slug").value;
		slug = slug.toLowerCase();
		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		//In slug ra textbox có id “slug”
		document.getElementById('convert_slug').value = slug;
	}
</script>

if (typeof jQuery.validator !== "undefined") {
	jQuery.validator.setDefaults({
		errorPlacement: function(error, element) {
			if (
				element.hasClass("select2") &&
				element.next(".select2-container").length
			) {
				error.insertAfter(element.next(".select2-container"));
			} else if (element.parent(".input-group").length) {
				error.insertAfter(element.parent());
			} else if (
				element.prop("type") === "radio" &&
				element.parent(".radio-inline").length
			) {
				error.insertAfter(element.parent().parent());
			} else if (
				element.prop("type") === "checkbox" ||
				element.prop("type") === "radio"
			) {
				error.appendTo(element.parent().parent());
			} else if (element.prop("type") === "file") {
				error.appendTo(
					element
						.parent()
						.parent()
						.parent()
				);
			} else {
				error.insertAfter(element);
			}
		}
	});

	$.validator.addMethod("email_regex",function(value, element, regexp) {
		var re = new RegExp(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,6}\b$/i);
		return this.optional(element) || re.test($.trim(value));
	},function(params, element) {
		var getMessage = ( ( $(element).attr("placeholder") != "" && $(element).attr("placeholder") != null ) ? $(element).attr("placeholder").replace("*", "") : ( ( $(element).attr("field-name") != "" && $(element).attr("field-name") != null ) ? $(element).attr("field-name").replace("*", "") : "Email" ) ) + "."
		var message = getMessage.replace('enter', '').replace('your', '').replace('Enter', '').replace('Your', '') ;
		return "Please Enter Valid " + ( message );
	});

	$.validator.addMethod(
		"noSpace",
		function(value, element) {
			return this.optional(element) || $.trim(value) != "";
		},
		function(params, element) {
			return "Please Enter " + $(element).attr("placeholder");
		}
	);

	$.validator.addMethod(
		"mobile_regex",
		function(value, element, regexp) {
			var re = new RegExp(regexp);
			return this.optional(element) || re.test(value);
		},
		function(params, element) {

			var getMessage = ( ( $(element).attr("placeholder") != "" && $(element).attr("placeholder") != null ) ? $(element).attr("placeholder").replace("*", "") : "Mobile No" ) + "."
			var message = getMessage.toLowerCase().replace('enter', '').replace('your', '');

			return "Please Enter valid " + ucword( message );
		}
	);

	$.validator.addMethod(
			"facebook_url",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Facebook Url."
		);

		$.validator.addMethod(
			"instagram_url",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Instagram Url."
		);

		$.validator.addMethod(
			"youtube_url",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Youtube Url."
		);

		$.validator.addMethod(
			"linkedin_url",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Linkedin Url."
		);

		$.validator.addMethod(
			"twitter_url",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Twitter Url."
		);
		$.validator.addMethod(
				"alpha_numeric",
				function(value, element) {
					var re = new RegExp(/^[a-zA-Z0-9 './&@*-]+$/);
					return this.optional(element) || re.test(value);
				},
				"Please enter only alpha numeric value with allowed special characters (' , & , / , @ , *  or -)."
			);

		$.validator.addMethod(
			"website_regex",
			function(value, element, regexp) {
				var re = new RegExp(regexp);
				return this.optional(element) || re.test(value);
			},
			"Please Enter Valid Website Url."
		);
$.validator.addMethod ("checkUniqueProductName" , function(value,element) {

			var product_name = $.trim($("[name='product_name']").val());
			var product_id = $.trim($("[name='product_id']").val());

			var result = true;
			$.ajax({
				type : 'POST',
				url  : site_url + 'product/checkUniqueProductSlug',
				data : { 'product_name' : product_name , 'product_id' : product_id },
				async : false,
				dataType : 'json',
				success : function(response){
					if(response.status_code == 101){
						result = false;
						return result;
					} else {
						result = true;
						return result;
					}
				}
			});
			return result ;
			},
			"Product name is alredy taken !! Please enter valid Product Name."
		);
}

function onlyDecimal(thisitem) {
	var val = $(thisitem)
		.val()
		.trim();

	if (parseInt(val) == 0) {
		var newValue = val.replace(/^0+/, "");
		return $(thisitem).val(newValue);
	}

	if (isNaN(val)) {
		val = val.replace(/[^1-9\.]/g, "");
		if (val.split(".").length > 2) val = val.replace(/\.+$/, "");
	}
	return $(thisitem).val(val);
}

function onlyNumber(thisitem) {
	var $val = $(thisitem)
		.val()
		.trim()
		.replace(/[^\d]/g, "");
	$(thisitem).val($val);
}

function onlyNumberWithSpaceAndPlusSign(thisitem) {
	var $val = $(thisitem)
		.val()
		.replace(/[^ +\d]/g, "");
	$(thisitem).val($val);
}

function naturalNumber(thisitem) {
	var $val = $(thisitem)
		.val()
		.trim()
		.replace(/[^\d]/g, "")
		.replace(/^0+/g, "");
	$(thisitem).val($val);
}


function menuDrop() {
	if ($(window).innerWidth() > 991) {
		$(
			".twt-navbar .nav-item.dropdown, .twt-navbar .dropdown-submenu"
		).hover(
			function() {
				$(this)
					.find(".dropdown-menu")
					.first()
					.stop(true, true)
					.delay(250)
					.slideDown(150);
			},
			function() {
				$(this)
					.find(".dropdown-menu")
					.first()
					.stop(true, true)
					.delay(100)
					.slideUp(100);
			}
		);
		$(".twt-navbar .dropdown > a").click(function() {
			location.href = this.href;
		});
	}
}

$(document).ready(function() {
	menuDrop();
	$("#slide-toggle").on("click", function() {
		$("body").toggleClass("nav-slide-open");
	});

	$(function() {
		var current = window.location.href;
		if (current != "") {
			$(".menu-item .menu-link").each(function() {
				var href = $(this).attr("href");
				if (href == current) {
					$(this).addClass("active");
				}
			});
		}
	});

	$(function() {
		// var current = window.location.href.substring(window.location.href.lastIndexOf("/") + 1);
		var current = window.location.href;

		if (current != "") {
			$(".nav-link-items").each(function() {
				var href = $(this).attr("href");
				if (href == current) {
					$(this).parent().addClass("active");

					if( $(this).parent().parent().parent().hasClass('collapse') != false ){
						$(this).parent().parent().parent().addClass('show');
						setTimeout(function(){$('.sb-scrollbar').css('height','468.936px'); $('.sidebar-nav.scrollContainer.sb-container').removeClass('sb-container-noscroll'),3000});
					} else {
						$(this).parent().parent().parent().removeClass('show');
					}
				}
			});
		}
	});

	$(document).on("click", function(e) {
		// console.log(!$(e.target).is('#slide-toggle, #slide-toggle .fas'), $(window).innerWidth() < 992);
		if (
			$(window).innerWidth() < 992 &&
			!$(e.target).is("#slide-toggle, #slide-toggle .fas")
		) {
			$("body").removeClass("nav-slide-open");
		}
	});

	$("body").on("click", function(event) {
		if (
			$(window).innerWidth() < 992 && $(".wrapper").hasClass("toggled")
		) {
			$(".wrapper").removeClass("toggled")
		}
	});

	// sidebar - admin side
	$(document).on("click", ".navbar-toggler", function() {
		$("#wrapper").toggleClass("toggled");
	});

    $(".sidebar").on("click", function(event) {
        event.stopPropagation(); // Prevent the click event from reaching the body click handler
    });

	// sidebar sub menu
	$('.sidebar [data-toggle="collapse"]').on("click", function() {
		var current = $(this);
		current
			.parent()
			.siblings()
			.find(".collapse.show")
			.collapse("hide");
	});

	if (window.location.hash) {
		console.log(window.location.hash);

		setTimeout(function() {
			window.scrollTo(0, 0);
		}, 1);
		setTimeout(function() {
			$("html, body").animate(
				{
					scrollTop: $(window.location.hash).offset().top - 96
				},
				1000
			);
		}, 300);
	}

	$('a[href*="#"]').on("click", function(event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;

			if (!$(this).attr("data-toggle")) {
				$("html, body").animate(
					{
						scrollTop:
							$(hash).offset().top -
							$(".navbar").outerHeight() -
							70
					},
					800
				);
			}
		}
	});

	// setTimeout(function()  {
	// 	$("#elastic_parent").elasticMenu();
	// }, 300);

	if ($(document).find(".select2").length > 0) {
		$(".select2").select2();
	}


	$('input[type="file"]').each(function() {
		var finput = $(this);
		finput.on("change", function(e) {
			let filenames = [];

			let files = e.target.files;

			if (files.length > 1) {
				// filenames.push(files.length + " images added");
				filenames.push("Multiple images added");
			} else {
				for (let i in files) {
					if (files.hasOwnProperty(i)) {
						filenames.push(files[i].name);
					}
				}
			}
			$(this)
				.siblings(".custom-file-label")
				.html(filenames.join(","));
		});
	});

	$(".dropdown-submenu > a").on("click", function(e) {
		console.log("submenu clicked");
		if ($(window).innerWidth() < 992) {
			e.preventDefault();
		}

		var submenu = $(this);
		$(this)
			.parent()
			.siblings()
			.find(".dropdown-menu")
			.removeClass("show");
		submenu.next(".dropdown-menu").addClass("show");
		e.stopPropagation();
	});

	// hide any open menus when parent closes
	$(".dropdown").on("hidden.bs.dropdown", function() {
		$(".dropdown-menu.show").removeClass("show");
	});
});
$(window).resize(function() {
	setTimeout(function() {
		// console.log("resized to =>", $(window).innerWidth());
		menuDrop();
	}, 500);
});
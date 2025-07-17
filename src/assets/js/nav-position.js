document.addEventListener("DOMContentLoaded", function () {
	var dropdownMenu = document.querySelectorAll(".dropdown-menu")
	dropdownMenu.forEach(function (menu) {
		var dropdown = menu.closest(".dropdown")
		if (!dropdown) return

		dropdown.addEventListener("mouseenter", function () {
			// 1. Temporarily show the menu off-screen for measurement
			menu.classList.add("pre-hover")
			menu.style.visibility = "hidden"
			menu.style.display = "block"
			menu.style.left = ""
			menu.style.right = ""

			// 2. Measure and set alignment BEFORE showing to user
			var rect = menu.getBoundingClientRect()
			var vw = window.innerWidth || document.documentElement.clientWidth

			if (rect.right > vw) {
				menu.style.left = "auto"
				menu.style.right = "0"
			} else {
				menu.style.left = ""
				menu.style.right = ""
			}

			// 3. Now allow CSS hover to show the menu
			menu.style.visibility = ""
			menu.style.display = ""
			menu.classList.remove("pre-hover")
		})

		dropdown.addEventListener("mouseleave", function () {
			menu.style.left = ""
			menu.style.right = ""
		})
	})
})

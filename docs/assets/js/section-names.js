document.addEventListener("DOMContentLoaded", function () {
	const devToggle = document.getElementById("dev-mode-toggle")
	if (!devToggle) return
	devToggle.addEventListener("change", function () {
		const badges = document.querySelectorAll(".badge")
		badges.forEach(function (badge) {
			badge.style.display = devToggle.checked ? "none" : ""
		})
	})
})

document.addEventListener("DOMContentLoaded", function () {
	// Handle FAQ accordion height animations
	var detailsElements = document.querySelectorAll("details")
	console.log("Found", detailsElements.length, "details elements")

	detailsElements.forEach(function (details) {
		var summary = details.querySelector("summary")

		// Find all content elements (everything except summary)
		var contentElements = Array.from(details.children).filter(function (child) {
			return child.tagName !== "SUMMARY"
		})

		if (!summary || contentElements.length === 0) return

		// Create a wrapper div for the content if it doesn't exist
		var contentWrapper = details.querySelector(".content-wrapper")
		if (!contentWrapper) {
			contentWrapper = document.createElement("div")
			contentWrapper.className = "content-wrapper"
			contentWrapper.style.overflow = "hidden"
			contentWrapper.style.transition = "height 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)"

			// Move all content elements into the wrapper
			contentElements.forEach(function (element) {
				contentWrapper.appendChild(element)
			})
			details.appendChild(contentWrapper)
		}

		// Set initial state
		if (details.hasAttribute("open")) {
			contentWrapper.style.height = contentWrapper.scrollHeight + "px"
		} else {
			contentWrapper.style.height = "0px"
		}

		// Handle click events
		summary.addEventListener("click", function (e) {
			e.preventDefault()

			var isOpen = details.hasAttribute("open")

			if (isOpen) {
				// Closing - animate from current height to 0
				// Don't remove open attribute yet - let animation complete first
				animateHeight(contentWrapper, contentWrapper.scrollHeight, 0, function () {
					// Remove open attribute after animation completes
					details.removeAttribute("open")
				})
			} else {
				// Opening - animate from 0 to natural height
				details.setAttribute("open", "")
				// Temporarily set height to 0 to start animation
				contentWrapper.style.height = "0px"
				// Force reflow
				contentWrapper.offsetHeight
				// Animate to natural height
				animateHeight(contentWrapper, 0, contentWrapper.scrollHeight)
			}
		})

		// Handle window resize
		window.addEventListener("resize", function () {
			if (details.hasAttribute("open")) {
				contentWrapper.style.height = contentWrapper.scrollHeight + "px"
			}
		})
	})

	function animateHeight(element, fromHeight, toHeight, callback) {
		// Set initial height
		element.style.height = fromHeight + "px"

		// Force reflow to ensure the initial height is applied
		element.offsetHeight

		// Animate to target height
		element.style.height = toHeight + "px"

		// Clean up after animation completes
		setTimeout(function () {
			if (toHeight === 0) {
				element.style.height = "0px"
			} else {
				element.style.height = "auto"
			}

			// Execute callback if provided
			if (callback && typeof callback === "function") {
				callback()
			}
		}, 600)
	}
})

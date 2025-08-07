import "https://esm.sh/number-flow"

document.addEventListener("DOMContentLoaded", () => {
	// Get all number-flow elements in order
	const flows = Array.from(document.querySelectorAll(".number-flow"))

	// Configure number-flow elements to disable commas
	flows.forEach((nf) => {
		nf.format = { useGrouping: false }
	})

	// Store the target number for each element, parsed from its text content
	const targets = flows.map((nf) => {
		// Parse as float or int as needed
		const value = parseFloat(nf.textContent.replace(/,/g, ""))
		// Optionally, set initial value to 0 for animation
		nf.update?.(0)
		return isNaN(value) ? 0 : value
	})

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				console.log(entry.target)
				const nf = entry.target
				const index = flows.indexOf(nf) // Get order
				if (entry.isIntersecting) {
					nf.classList.add("visible")
					// Delay based on order: 0.1s * index
					setTimeout(() => {
						nf.update?.(targets[index])
					}, index * 100)
				} else {
					nf.classList.remove("visible")
					nf.update?.(0)
				}
			})
		},
		{ threshold: 0.6 }
	)

	flows.forEach((nf) => observer.observe(nf))
})

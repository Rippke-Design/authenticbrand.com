const timeline = document.getElementById("timeline")
const baseLine = document.getElementById("timelineLine")
const fillLine = document.getElementById("timelineFill")
const items = document.querySelectorAll(".timeline-item")

function updateTimeline() {
	const centerY = window.innerHeight / 2

	// first and last dot
	const firstDot = items[0].querySelector(".timeline-dot")
	const lastDot = items[items.length - 1].querySelector(".timeline-dot")

	const timelineRect = timeline.getBoundingClientRect()
	const firstDotRect = firstDot.getBoundingClientRect()
	const lastDotRect = lastDot.getBoundingClientRect()

	const lineTop = firstDotRect.top + firstDotRect.height / 2 - timelineRect.top
	const lineHeight = lastDotRect.top + lastDotRect.height / 2 - (firstDotRect.top + firstDotRect.height / 2)

	// Position base gray line
	baseLine.style.top = lineTop + "px"
	baseLine.style.height = lineHeight + "px"

	// Scroll progress from first to last dot
	const viewportCenterPos = centerY - timelineRect.top
	const rawProgress = (viewportCenterPos - lineTop) / lineHeight
	const progress = Math.max(0, Math.min(rawProgress, 1))

	// Fill red line proportional to scroll
	fillLine.style.top = lineTop + "px"
	fillLine.style.height = progress * lineHeight + "px"

	// Completed dots & active highlight
	let closestIndex = 0
	let closestDistance = Infinity

	items.forEach((item, i) => {
		const rect = item.getBoundingClientRect()
		const itemCenter = rect.top + rect.height / 2

		// Completed = passed viewport center
		if (itemCenter < centerY) {
			item.classList.add("completed")
		} else {
			item.classList.remove("completed")
		}

		// Find closest to center for active
		const dist = Math.abs(itemCenter - centerY)
		if (dist < closestDistance) {
			closestDistance = dist
			closestIndex = i
		}
	})

	// Apply .active to the one closest to center
	items.forEach((item, i) => {
		item.classList.toggle("active", i === closestIndex)
	})
}

window.addEventListener("scroll", updateTimeline)
window.addEventListener("resize", updateTimeline)
updateTimeline()

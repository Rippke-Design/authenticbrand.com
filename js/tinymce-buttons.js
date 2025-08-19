;(function () {
	tinymce.create("tinymce.plugins.AuthenticButtons", {
		init: function (editor, url) {
			// Add button to toolbar
			editor.addButton("authentic_buttons", {
				type: "menubutton",
				text: "Authentic Buttons",
				icon: false,
				menu: [
					{
						text: "Button Yellow",
						onclick: function () {
							editor.insertContent('<a href="#" class="btn btn-yellow">Button Text</a>')
						},
					},
					{
						text: "Button Outline",
						onclick: function () {
							editor.insertContent('<a href="#" class="btn btn-outline">Button Text</a>')
						},
					},
					{
						text: "Button White",
						onclick: function () {
							editor.insertContent('<a href="#" class="btn btn-white">Button Text</a>')
						},
					},
					{
						text: "Button Blue",
						onclick: function () {
							editor.insertContent('<a href="#" class="btn btn-blue">Button Text</a>')
						},
					},
				],
			})
		},

		createControl: function (n, cm) {
			return null
		},

		getInfo: function () {
			return {
				longname: "Authentic Brand Buttons",
				author: "Authentic Brand",
				authorurl: "https://authenticbrand.com",
				infourl: "",
				version: "1.0",
			}
		},
	})

	// Register plugin
	tinymce.PluginManager.add("authentic_buttons", tinymce.plugins.AuthenticButtons)
})()

var editor_config = {
	path_absolute: "/",
	selector: "textarea.tinymce",
	/* theme of the editor */
	theme: "modern",
	skin: "lightgray",

	/* width and height of the editor */
	width: "100%",
	height: 200,

	/* display statusbar */
	statubar: true,
	plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor colorpicker textpattern"
	],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
	/* style */
	style_formats: [
		{
			title: "Headers", items: [
				{ title: "Header 1", format: "h1" },
				{ title: "Header 2", format: "h2" },
				{ title: "Header 3", format: "h3" },
				{ title: "Header 4", format: "h4" },
				{ title: "Header 5", format: "h5" },
				{ title: "Header 6", format: "h6" }
			]
		},
		{
			title: "Inline", items: [
				{ title: "Bold", icon: "bold", format: "bold" },
				{ title: "Italic", icon: "italic", format: "italic" },
				{ title: "Underline", icon: "underline", format: "underline" },
				{ title: "Strikethrough", icon: "strikethrough", format: "strikethrough" },
				{ title: "Superscript", icon: "superscript", format: "superscript" },
				{ title: "Subscript", icon: "subscript", format: "subscript" },
				{ title: "Code", icon: "code", format: "code" }
			]
		},
		{
			title: "Blocks", items: [
				{ title: "Paragraph", format: "p" },
				{ title: "Blockquote", format: "blockquote" },
				{ title: "Div", format: "div" },
				{ title: "Pre", format: "pre" }
			]
		},
		{
			title: "Alignment", items: [
				{ title: "Left", icon: "alignleft", format: "alignleft" },
				{ title: "Center", icon: "aligncenter", format: "aligncenter" },
				{ title: "Right", icon: "alignright", format: "alignright" },
				{ title: "Justify", icon: "alignjustify", format: "alignjustify" }
			]
		}
	],
	relative_urls: false,
	file_browser_callback: function (field_name, url, type, win) {
		var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

		var cmsURL = editor_config.path_absolute + 'file-manager?field_name=' + field_name;
		if (type == 'image') {
			cmsURL = cmsURL + "&type=Images";
		} else {
			cmsURL = cmsURL + "&type=Files";
		}

		tinyMCE.activeEditor.windowManager.open({
			file: cmsURL,
			title: 'Filemanager',
			width: x * 0.8,
			height: y * 0.8,
			resizable: "yes",
			close_previous: "no"
		});
	}
};

tinymce.init(editor_config);

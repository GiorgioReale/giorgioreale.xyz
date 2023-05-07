document.addEventListener("DOMContentLoaded", () => {
	const buttonThemeSwitch = document.querySelector("#theme-switch");
	const iconButtonThemeSwitch = buttonThemeSwitch.querySelector("use");
	const audioThemeSwitch = new Audio("/assets/audios/light-switch.mp3");
	switch (sessionStorage.getItem("theme")) {
		case "dark":
			document.documentElement.setAttribute("data-theme", "dark");
			iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#moon");
			break;
		case "light":
			document.documentElement.setAttribute("data-theme", "light");
			iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#sun");
			break;
		default:
			const detect_theme_a = window.matchMedia("(prefers-color-scheme: dark)");
			if (detect_theme_a.matches) {
				document.documentElement.setAttribute("data-theme", "dark");
			} else {
				document.documentElement.setAttribute("data-theme", "light");
			}
			iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#moon-auto");
	}
	if (buttonThemeSwitch) {
		buttonThemeSwitch.addEventListener("click", (event) => {
			event.preventDefault();
			switch (iconButtonThemeSwitch.getAttribute("xlink:href")) {
				case "/assets/icons/website/sprites.svg#moon-auto":
					sessionStorage.setItem("theme", "light");
					document.documentElement.setAttribute("data-theme", "light");
					iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#sun");
					break;
				case "/assets/icons/website/sprites.svg#sun":
					sessionStorage.setItem("theme", "dark");
					document.documentElement.setAttribute("data-theme", "dark");
					iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#moon");
					break;
				case "/assets/icons/website/sprites.svg#moon":
					sessionStorage.setItem("theme", "auto");
					const detect_theme_c = window.matchMedia("(prefers-color-scheme: dark)");
					if (detect_theme_c.matches) {
						document.documentElement.setAttribute("data-theme", "dark");
					} else {
						document.documentElement.setAttribute("data-theme", "light");
					}
					iconButtonThemeSwitch.setAttribute("xlink:href", "/assets/icons/website/sprites.svg#moon-auto");
					break;
			}
			audioThemeSwitch.play();
		});
	}
});
const defaultTheme = require("tailwindcss/defaultTheme");
// define colors variable after putting colors in extend
const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            screens: {
                xs: "480px",
            },
            colors: {
                // colors taken from DefaultConfig.stub.js node_modules/tailwindcss/stubs
                transparent: "transparent",
                current: "currentColor",
                black: colors.black,
                white: colors.white,
                gray: colors.trueGray,
                // custom color
                // if using '-' e.g. gray-background, must use ''
                // so 'gray-background'
                "gray-background": "#f7f8fc",
                orange: "#fcf2e5",
                blue: "#328af1",
                "blue-hover": "#2879bd",
                yellow: "#ffc73c",
                red: "#ec454f",
                green: "#1aab8b",
                purple: "#8b60ed",
            },
            spacing: {
                22: "5.5rem",
                70: "280px",
                76: "19rem",
                104: "26rem",
                175: "700px",
            },
            maxWidth: {
                custom: "1000px",
            },
            fontFamily: {
                // change font family here after changing import in app.blade.php
                sans: ["Open Sans", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        // npm install @tailwindcss/line-clamp
        require("@tailwindcss/line-clamp"),
    ],
};
